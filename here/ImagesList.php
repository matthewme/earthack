<?php
// include models, including the database connection
require_once( "Images.php" );
require_once( "db.php" );

if(isset($_POST['btn_upload']))
{

	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "recyclingImgs/".$filename;
	
	move_uploaded_file($filetmp,$filepath);
	//echo "File Uploaded";
	Images::upload( $filepath, $dbh  );
}

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
//header('Location: ImagesList.php');
//exit;


?>
