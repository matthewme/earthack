<?php
// a simple test controller for your lab work
// we're not going to bother with a view
require_once( "models/db.php" );
// Table Name testing
 //////require your Recipe class and print out the table name.
	require_once( "models/Steps.php" );
	echo "<p>".Steps::$tableName."</p>";
	

// Data Members testing
	$recStep = new Steps();
	$recStep->id = "123";
	$recStep->recipe_id = "Soup";
	$recStep->stepno = "Hot";
	$recStep->text = "blahh, got nothing";
		
// copyFromRow testing
	$data = array
	(
		"id" => "13",
		"recipe_id" => "5",
		"stepno" => "2",
		"text" => "boo blah yay vete vete",
	);
	$step = new Steps();
	$step->copyFromRow($data);
	echo $step;

// findAll testing
$stepTest = Steps::findAll( $dbh, true );
for($i=0; $i<count($stepTest);$i++)
{
	echo $stepTest[$i]->recipe_id;
}
$stepTest2 = Steps::findAllForRecipe( 2, $dbh );
for($i=0; $i<count($stepTest2);$i++)
{
	echo "<br>".$stepTest2[$i]->text;
}

?>