<?php
class RecipeIngredientUnit
{
	public static $tableName = "recipe_ingredients_units";
	
	public $recipe_id;
	public $ingredient_id;
	public $unit_id;
	public $amount;
	
	// display columns
	public $ingredient_name;
	public $unit_name;

	function copyFromRow( $row ) 
	{
		$this->recipe_id = $row['recipe_id'];
		$this->ingredient_id = $row['ingredient_id'];
		$this->unit_id = $row['unit_id'];
		$this->amount = $row['amount'];

		// display stuff
		if (isset($row['iname'])) {
			$this->ingredient_name = $row['iname'];
		}
		if (isset($row['uname'])) {
			$this->unit_name = $row['uname'];
		}

	}
	
	static function findAll( $dbh ) {
		$stmt = $dbh->prepare( "select * from ".RecipeIngredientUnit::$tableName );
		$stmt->execute();
		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new RecipeIngredientUnit();
			$p->copyFromRow( $row );
			$result[] = $p;
		}
		return $result;
	}

	static function findAllForRecipe( $recipe_id, $dbh ) {
		$sql = "SELECT riu.*, i.name as iname, u.name as uname
				FROM recipe_ingredients_units riu,
					 ingredients i,
					 units_of_measure u
				WHERE riu.ingredient_id = i.id
				AND riu.unit_id = u.id
				AND recipe_id = :recipe_id;";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam( ":recipe_id", $recipe_id );
		$stmt->execute();

		$result = array();
		while( $row = $stmt->fetch() ) {
			$iu = new RecipeIngredientUnit();
			$iu->copyFromRow( $row );
			$result[] = $iu;
		}
		return $result;
	}

	public function __toString()
	{
		return $this->amount." ".$this->unit_name." ".$this->ingredient_name;
	}
}
?>