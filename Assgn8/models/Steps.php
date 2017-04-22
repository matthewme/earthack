<?php
class Steps
{
	public static $tableName = "steps";
	
	public $id;
	public $recipe_id;
	public $stepno;
	public $text;
	
	// display columns
	public $recipe_name;

	function copyFromRow( $row ) 
	{
		$this->id = $row['id'];
		$this->recipe_id = $row['recipe_id'];
		$this->stepno = $row['stepno'];
		$this->text = $row['text'];

		// display stuff
		if (isset($row['Rname'])) {
			$this->recipe_name = $row['Rname'];
		}
	}
	
	static function findAll( $dbh ) {
		$stmt = $dbh->prepare( "select * from ".Steps::$tableName );
		$stmt->execute();
		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new Steps();
			$p->copyFromRow( $row );
			$result[] = $p;
		}
		return $result;
	}
//Im stopping here...trying to figure out how to select table with every step info for each recipe id
	static function findAllForRecipe( $recipe_id, $dbh ) 
	{
		$sql = "SELECT * FROM steps WHERE recipe_id = :recipe_id;";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam( ":recipe_id", $recipe_id );
		$stmt->execute();

		$result = array();
		while( $row = $stmt->fetch() ) {
			$iu = new Steps();
			$iu->copyFromRow( $row );
			$result[] = $iu;
		}
		return $result;
	}

	public function __toString()
	{
		return $this->id." ".$this->recipe_id." ".$this->stepno." ".$this->text."<br>";
	}
}
?>