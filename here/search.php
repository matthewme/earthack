<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trash-to-Treasure</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="search.js"></script>
  <link href='//fonts.googleapis.com/css?family=Fontdiner Swanky' rel='stylesheet'>
  <link rel="stylesheet" href="search.css"/>
</head>
<body>
  <header>
  <img src="trash.png" alt="Trash" align="left" style="width: 8%; height: 8%;">
    <img src="treasure.png" alt="Trash" align="right" style="width: 10%; height: 10%;">
	<br> </br>
	<h1 id ="title">Trash-to-Treasure</h1>
  </header>
  <main>
    <form id="search-form" class="form input-group col-xs-6 col-md-offset-3" method="POST" action="">
      <input type="text" class="form-control" name="idea" id="ideabox" placeholder="Search Box"/>
      <span class="input-group-btn">
        <button type="submit" name="btn_search" class="btn btn-success ">Search</button>
      </span>
      <span class="input-group-btn">
        <button id="add-idea-btn" type="button" class="btn btn-success ">Add Idea</button>
      </span>
    </form>
    <div id="add-idea-form" class="col-xs-6 col-md-offset-3 input-group">
      <form class="input-group" action="" method="post" enctype="multipart/form-data"/>
	  
	  <span class="input-group-btn">
          <button type="button" class="btn btn-success btn-file">Choose Image<input type="file" name="file_img"/>
         </button>
	  </span>
		<input type="text" class="form-control " name="desc" id="descbox"  placeholder="Input Description"/> 
	  <span class="input-group-btn">
         <input type="submit" id = "btn-upload" name="btn_upload" value="Upload" class="btn btn-success "/>
	  </span>
      </form>
	</div>
  <h2 id="errorMSG"><?=$errors?></h2>
    <div id="idea-list">
      <?php for($i=0; $i<count($imagesArray);$i++){ ?>
	  <div class = "col-lg-4" </div>
      <div id="template">
        <div class="panel-heading">
          <h3 class="panel-title"><?=$imagesArray[$i]->id?></h3>
        </div>
        <figure class="panel-body">
          <img class="img-rounded img-fluid" alt="pic" width="254" height="186" src="<?=$imagesArray[$i]->path?>"/>
		  <?php $desc = $imagesArray[$i]->description ?>
          <figcaption>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#descModal<?=$i?>">
            Info
            </button>
          </figcaption>
          <div class="modal fade" id="descModal<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="descModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="descModalLabel">Description:</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
					<p><?=$desc ?></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </figure>
      </div>
    </div>
    <?php } ?>
  </main>
</body>
</html>
