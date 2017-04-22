<html>

<head>
<title>My Recipes</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="main.css">

</head>

<body>

<div class="container">

<div class="page-header">
	<h1 name = "name"><?=$rec->Name?></h1>
</div>

<div class="row">
<div class="col-md-12">
	<button class="btn btn-primary" id="toggle_edit">Edit</button>
</div>
</div>
<div class="ID" id="value" style="display: none;"><?php echo $rec->ID ?></div>

<div class="row">
	<div class="col-md-10" name = "description"><?=$rec->Description?></div>

	<div class="col-md-2">
	<img class="thumb" src="<?=$rec->ImageURL?>">
	</div>
</div>

<p><label name = "prep_time">Prep Time: </label><?=$rec->PrepTime?></p>
<p><label name = "total_time">Total Time: </label><?=$rec->TotalTime?></p>

<h3>Ingredients</h3>

<?php for($i=0; $i<count($ing);$i++){ ?>
<ul>
	<li><?=$ing[$i]->ingredient_name?></li>
</ul>
<?php } ?> 
<h3>Steps</h3>

<?php for($i=0; $i<count($steps);$i++){ ?>
<ul>
	<li><?=$steps[$i]->text?></li>
</ul>
<?php } ?> 

</div>

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="views/recipes.js"></script>

</body>

</html>
