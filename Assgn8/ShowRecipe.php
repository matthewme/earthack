<?php
// Route 1: user comes here to see a specific recipe
//   get the id of the recipe they want from the query string,
//   inflate a recipe model, and show them the detail view
require_once( "models/Recipe.php" );
require_once( "models/db.php" );

$rec = new Recipe();
$steps = [];
$ing = [];
if(isset($_GET['boo']))
{
	$idNum = $_GET['boo'];
	$rec->find($idNum, $dbh);
	$steps = Recipe::childSteps($idNum, $dbh);
	$ing = Recipe::childIngredients($idNum, $dbh);
}

require_once("views/view_recipe.php");
?>
