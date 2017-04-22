<?php
// Route 1: user comes here to add a new recipe, show them a blank form

// Route 2: user comes here to edit a specific recipe
//   (you'll need to grab that id from the query string)

// Route 3a: user entered a new recipe details and is trying to save it
//   create an object, set values, validate and save, just like in the lab
//   if all is well, send to ShowRecipe to see the added recipe
//   otherwise, back to the edit view with errors!

// Route 3b: user updated an existing recipe details and is trying to save it
//   create an object, inflate to the proper id, update values, validate and save
//   if all is well, send to ShowRecipe to see the added recipe
//   otherwise, back to the edit view with errors!

require_once("views/edit_recipe.php");
?>
