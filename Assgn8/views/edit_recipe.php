<html>

<head>
<title>My Recipes</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="main.css">

</head>

<body>

<div class="container">

<div class="page-header">
	<h1>Add/Edit Recipe</h1>
</div>

<form method="POST" action="">

	<div class="form-group">
	    <label>Name:</label>
		<input type="text" name="name" class="form-control">
	</div>

	<div class="form-group">
	    <label>Description:</label>
		<input type="text" name="description" class="form-control">
	</div>

	<div class="form-group">
	    <label>Image URL:</label>
		<input type="text" name="img_url" class="form-control" value="http://">
	</div>

	<div class="form-group">
	    <label>Prep Time:</label>
		<input type="text" name="prep_time" class="form-control" maxlength="4">
	</div>

	<div class="form-group">
	    <label>Total Time:</label>
		<input type="text" name="total_time" class="form-control" maxlength="4">
	</div>

	<h2>Ingredients</h2>

	<div class="form-group">
		<input type="text" name="amount[]" class="form-control" maxlength="4">
		<select name="unitid[]" class="form-control">
			<option value="1">cup</option>
			<option value="2">tsp</option>
			<option value="3">gal</option>
			<option value="4">barrel</option>
		</select>
		<select name="ingredientid[]" class="form-control">
			<option value="1">Chicken</option>
			<option value="2">Water</option>
			<option value="3">Flour</option>
			<option value="4">Gravel</option>
		</select>
	</div>

	<div class="form-group">
		<input type="text" name="amount[]" class="form-control" maxlength="4">
		<select name="unitid[]" class="form-control">
			<option value="1">cup</option>
			<option value="2">tsp</option>
			<option value="3">gal</option>
			<option value="4">barrel</option>
		</select>
		<select name="ingredientid[]" class="form-control">
			<option value="1">Chicken</option>
			<option value="2">Water</option>
			<option value="3">Flour</option>
			<option value="4">Gravel</option>
		</select>
	</div>

	<div class="form-group">
		<input type="text" name="amount[]" class="form-control" maxlength="4">
		<select name="unitid[]" class="form-control">
			<option value="1">cup</option>
			<option value="2">tsp</option>
			<option value="3">gal</option>
			<option value="4">barrel</option>
		</select>
		<select name="ingredientid[]" class="form-control">
			<option value="1">Chicken</option>
			<option value="2">Water</option>
			<option value="3">Flour</option>
			<option value="4">Gravel</option>
		</select>
	</div>

	<button type="submit" class="btn">+</button>

	<h2>Steps</h2>

	<div class="form-group">
		<input type="text" name="step[]" class="form-control">
		<input type="text" name="step[]" class="form-control">
		<input type="text" name="step[]" class="form-control">
		<button type="submit" class="btn">+</button>
	</div>

	<button type="submit" class="btn btn-primary">Add/Save</button>

</form>

</div>

</body>

</html>
