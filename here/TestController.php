<?php
// a simple test controller for your lab work
// we're not going to bother with a view
require_once( "db.php" );
// Table Name testing
 //////require your Recipe class and print out the table name.
	require_once( "Images.php" );
	echo "<p>".Images::$tableName."</p>";
	

// Data Members testing
	$imgTest = new Images();
	$imgTest->id = "123";
	$imgTest->path = "Soup";
	$imgTest->description = "Hot";
	echo $imgTest;
	
// copyFromRow testing
	$data = array
	(
		"imgID" => "13",
		"imgPath" => "5",
		"imgDesc" => "2",
	);
	$imgTest2 = new Images();
	$imgTest2->copyFromRow($data);
	echo $imgTest2;

// findAll testing
$imgTest3 = Images::findAll( $dbh, true );
for($i=0; $i<count($imgTest3 );$i++)
{
	echo $imgTest3 [$i]->description."</br>";
}
$imgTest4 = Images::findByKeyword( "matthew", $dbh );
for($i=0; $i<count($imgTest4);$i++)
{
	echo "<br>".$imgTest4[$i]->description;
}

?>