//Share here
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recycling</title>
</head>
<body>

<form action="myFirstWebsite.php" method="post" enctype="multipart/form-data">
<input type="file" name="file_img" />
<input type="submit" name="btn_upload" value="Upload">	
</form>

<?php
if(isset($_POST['btn_upload']))
{

	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "recyclingImgs/".$filename;
	
	move_uploaded_file($filetmp,$filepath);
	echo "File Uploaded";
	
	$sql = "INSERT INTO upload_img (img_path) VALUES ('$filepath')";
	$result = mysql_query($sql);
}
?>

</body>
</html>
