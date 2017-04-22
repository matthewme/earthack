var id = $( "div.ID" ).text()
	$("#toggle_edit").click(function() {
		var url = "EditRecipe.php?id=" + id;
		window.location.href = url;
	})
	