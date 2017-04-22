<?php
// include models, including the database connection
require_once( "Images.php" );
require_once( "db.php" );

$imagesArray = Images::findAll( $dbh, true );

if($_POST)
{
	if (!empty($_POST['idea']))
	{
		$term = explode(" ", $_POST['idea']);
		$result = Images::findByKeyword($term, $dbh);
		$imagesArray = $result;
	}
}
else
{

// using the Recipe model, retrieve an array of recipes
	$imagesArray = Images::findAll( $dbh, true );
}
// require the view
require_once( "search.php" );



?>
