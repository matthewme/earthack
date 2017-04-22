<html>

<head>
<title>My Recipes</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="main.css">

</head>

<body>

<div class="container">

<div class="page-header">
	<h1>The Bestest Recipes</h1>
</div>

<form method="POST" action="">

<div class="input-group">
	<input type="text" name="terms" id="search" class="form-control">
	<span class="input-group-btn"><button class="btn btn-primary">Search</button></span>
</div>

<table class="table">

<tr>
	<th></th>
	<th><a href="RecipeList.php?sortby=name">Name</a></th>
	<th><a href="RecipeList.php?sortby=prep">Prep Time</a></th>
	<th><a href="RecipeList.php?sortby=total">Total Time</a></th>
	<th><a href="RecipeList.php?sortby=rating">Rating</a></th>
</tr>

<?php for($i=0; $i<count($recipeArray);$i++){ ?>

<tr>
	<td rowspan="2">
		<img class="thumb" src="<?=$recipeArray[$i]->ImageURL?>">
	</td>
	<td><a href="ShowRecipe.php?boo=<?php echo $recipeArray[$i]->ID ?>" ><?=$recipeArray[$i]->Name?></a></td>
	<td><?=$recipeArray[$i]->PrepTime?></td>
	<td><?=$recipeArray[$i]->TotalTime?></td>
	<td><?=$recipeArray[$i]->Rating?></td>
</tr>
<tr><td colspan="4"><?=$recipeArray[$i]->Description?>
</td></tr>

<?php } ?>

</table>

<a href="EditRecipe.php" class="btn btn-primary" >Add New Recipe</a>

</div>

</body>

</html>
