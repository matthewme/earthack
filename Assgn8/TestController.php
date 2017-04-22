<?php
// a simple test controller for your lab work
// we're not going to bother with a view

// Table Name testing
 //////require your Recipe class and print out the table name.
	require_once( "models/Recipe.php" );
	echo "<p>".Recipe::$tableName."</p>";
	require_once("models/db.php");


//child steps
$testStep = Recipe::childSteps(2, $dbh);
for($i=0; $i<count($testStep);$i++)
{
	echo "<br>".$i."-".$testStep[$i]->text;
}
//child Ingredients
$testStep2 = Recipe::childIngredients(2, $dbh);
for($i=0; $i<count($testStep2);$i++)
{
	echo "<br>".$testStep2[$i]->ingredient_name;
}
?>