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
		$this->id = $row['imgID'];
		$this->path = $row['imgPath'];
		$this->description = $row['imgDesc'];
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