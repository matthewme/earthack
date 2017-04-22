<?php
require_once( "models/Steps.php" );
require_once( "models/RecipeIngredientUnit.php" );
class Recipe
{
	//TableName
	public static $tableName = "recipes";
	
	//DataMembers
	# database columns
	public $ID;
	public $Name;
	public $Description;
	public $ImageURL;
	public $PrepTime;
	public $TotalTime;
	public $Rating;
	
	function __toString()
	{
		return $this->ID."<br>".$this->Name."<br>".$this->Description."<br>".$this->ImageURL."<br>".$this->PrepTime."<br>".$this->TotalTime."<br>".$this->Rating."<p>";
	}
	
	function copyFromRow( $row )
	{
		$this->ID = $row['id'];
		$this->Name = $row['name'];
		$this->Description = $row['description'];
		$this->ImageURL = $row['img_url'];
		$this->PrepTime = $row['prep_time'];
		$this->TotalTime = $row['total_time'];
		$this->Rating = $row['rating'];
	}
	function find( $id, $dbh )
	{
		$stmt = $dbh->prepare( "select * from ".Recipe::$tableName." where id = :id ;" );
		$stmt->bindParam( ":id", $id );
		$stmt->execute();
		$row = $stmt->fetch();
		$this->copyFromRow( $row );
	}
	static function findAll( $dbh ) 
	{
		$stmt = $dbh->prepare( "select * from ".Recipe::$tableName );
		$stmt->execute();

		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new Recipe();
			$p->copyFromRow( $row );
			$result[] = $p;
		}
		return $result;
	}
	static function childSteps($id, $dbh)
	{
		$result = Steps::findAllForRecipe( $id, $dbh );
		return $result;
	}
	
	///I need to figure how to acquire this info
	static function childIngredients($id, $dbh)
	{
		$result = RecipeIngredientUnit::findAllForRecipe( $id, $dbh );
		return $result;
	}
	static function findByKeyword($word, $dbh)
	{
		$arr = array();
		$SQLstmt = "SELECT * FROM ".Recipe::$tableName." WHERE ";
		for ($i = 0; $i < count($word); $i++)
		{
			if($i < count($word)-1)
			{
				$SQLstmt .=" name LIKE '%".$word[$i]."%' OR description LIKE '%".$word[$i]."%' OR ";
			}
			else
			{
				$SQLstmt .=" name LIKE '%".$word[$i]."%' OR description LIKE '%".$word[$i]."%'" ;
			}
		}
		$SQLstmt .= ";";
		$stmt = $dbh->prepare($SQLstmt);
		$stmt->execute();
		while($word = $stmt->fetch())
		{
			$temp = new Recipe();
			$temp->copyFromRow($word);
			$arr[]=$temp;
		}
		return $arr;
	}
	
}
?>