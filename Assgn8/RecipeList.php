<?php
// include models, including the database connection
require_once( "models/Recipe.php" );
require_once( "models/db.php" );

$recipeArray = Recipe::findAll( $dbh, true );

if($_POST)
{
	if (!empty($_POST['terms']))
	{
		$term = explode(" ", $_POST['terms']);
		$result = Recipe::findByKeyword($term, $dbh);
		$recipeArray = $result;
	}
}
else
{

// using the Recipe model, retrieve an array of recipes
	$recipeArray = Recipe::findAll( $dbh, true );
}
// require the view
require_once( "views/view_recipes.php" );



?>
