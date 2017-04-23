<?php
class Images
{
	public static $tableName = "images";
	
	public $id;
	public $path;
	public $description;
	
	// display columns
	public $Images_name;

	function copyFromRow( $row ) 
	{
		//$this->id = $row['imgID'];
		$this->path = $row['imgPath'];
		$this->description = $row['imgDesc'];
	}
	function upload( $path, $desc, $dbh  ) 
	{
		$stmt = $dbh->prepare( "INSERT INTO ".Images::$tableName."(imgPath, imgDesc) VALUES ('".$path."', '".$desc."')" );
		$stmt->execute();
	}
	static function findAll( $dbh ) 
	{
		$stmt = $dbh->prepare( "select * from ".Images::$tableName );
		$stmt->execute();
		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new Images();
			$p->copyFromRow( $row );
			$result[] = $p;
		}
		return $result;
	}
	function prompt($prompt_msg){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }
	public function __toString()
	{
		return $this->id." ".$this->path." ".$this->description."<br>";
	}
	static function findByKeyword($word, $dbh)
	{
		$arr = array();
		$SQLstmt = "SELECT * FROM ".Images::$tableName." WHERE ";
		for ($i = 0; $i < count($word); $i++)
		{
			if($i < count($word)-1)
			{
				$SQLstmt .=" imgDesc LIKE '%".$word[$i]."%' OR ";
			}
			else
			{
				$SQLstmt .=" imgDesc LIKE '%".$word[$i]."%'" ;
			}
		}
		$SQLstmt .= ";";
		$stmt = $dbh->prepare($SQLstmt);
		$stmt->execute();
		while($word = $stmt->fetch())
		{
			$temp = new Images();
			$temp->copyFromRow($word);
			$arr[]=$temp;
		}
		return $arr;
	}
}
?>