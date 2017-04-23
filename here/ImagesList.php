<?php
require_once( "Images.php" );
require_once( "db.php" );

$errors = "";

if(isset($_POST['btn_upload']))
{
	if ($_FILES['file_img']['size'] != 0)
	{
		$filetmp = $_FILES["file_img"]["tmp_name"];
		$filename = $_FILES["file_img"]["name"];
		$filetype = $_FILES["file_img"]["type"];
		$filepath = "recyclingImgs/".$filename;
		
		move_uploaded_file($filetmp,$filepath);
		
		Images::upload( $filepath, $dbh  );
		echo "ERROR!";
		header('Location: reuse.php');
		exit;
	}
	else
	{
		$errors = "Sorry...No File Attached.";
	}
}

$imagesArray = Images::findAll( $dbh, true );

if(isset($_POST['btn_search']))
{
	if (!empty($_POST['idea']))
	{
		$term = explode(" ", $_POST['idea']);
		$result = Images::findByKeyword($term, $dbh);
		if(sizeof($result) == 0)
		{
			$errors = "SORRY...NO RESULTS FOUND.";
			$imagesArray = array();
		}
		else
		{
			$imagesArray = $result;
			$errors = "Showing Results For....".$_POST['idea'];
		}
	}
	else
	{
		$imagesArray = Images::findAll( $dbh, true );
	}
}

// require the view
require_once( "search.php" );
//header('Location: ImagesList.php');
//exit;


?>
