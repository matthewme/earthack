<?php
class Ingredient
{
	public static $tableName = "ingredients";
	
	public $id;
	public $name;

	public $errors = [];
	
	function copyFromRow( $row ) 
	{
		if (isset($row['id'])) {
			$this->recipe_id = $row['id'];
		}
		$this->name = $row['name'];
	}
	
	static function findAll( $dbh ) {
		$stmt = $dbh->prepare( "select * from ".Ingredient::$tableName );
		$stmt->execute();
		$result = array();
		while( $row = $stmt->fetch() ) {
			$p = new Ingredient();
			$p->copyFromRow( $row );
			$result[] = $p;
		}
		return $result;
	}

	function validate($dbh) {
		$this->errors = [];

		// check for blank name
		if ($this->name == "") {
			$this->errors[] = "Ingredient name cannot be blank";
		}

		// check for unique name (hint: use find method)

		return (count($this->errors) == 0);
	}

	function getErrors() {
		if (count($this->errors) > 0 ) {
			return implode($this->errors, "<br/>");
		}
		return "";
	}

	function save($dbh) {
		if ($this->id != "") {
			$stmt = $dbh->prepare("UPDATE ".Ingredient::$tableName." SET name = :name WHERE id = :id");
			$stmt->bindParam(':name', $this->name);
			$stmt->bindParam(':id', $this->id);
			$stmt->execute();
		} else {
			$stmt = $dbh->prepare("INSERT INTO ".Ingredient::$tableName." (name) VALUES(:name)");
			$stmt->bindParam(':name', $this->name);
			$stmt->execute();
			$this->id = $dbh->lastInsertId();
		}
	}

}
?>