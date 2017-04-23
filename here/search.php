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
    <h1 id ="title">Trash-to-Treasure</h1>
	<br> </br>
  </header>
  <main>
    <form id="search" class="form input-group col-xs-6" method="POST" action="">
      <input type="text" class="form-control" name="idea" id="ideabox"/>
      <span class="input-group-btn">
        <button type="submit" name="btn_search" class="btn btn-success ">Search</button>
      </span>
      <span class="input-group-btn">
        <button id="add-idea-btn" type="button" class="btn btn-success ">Add Idea</button>
      </span>
    </form>
    <div id="add-idea-form" class="well-sm col-xs-8">
      <form action="" method="post" enctype="multipart/form-data"/>
          <button type="button" class="btn btn-success btn-file">
           Share Project Image<input type="file" name="file_img"/>
         </button>
            <input type="submit" name="btn_upload" value="Upload" class="btn btn-success"/>
      </form>
  </div>
  <h2 id="errorMSG"><?=$errors?></h2>
    <div id="idea-list">
	<br></br>
      <?php for($i=0; $i<count($imagesArray);$i++){ ?>
	  <div class = "col-lg-4" </div>
      <div id="template">
        <div class="panel-heading">
          <h3 class="panel-title"><?=$imagesArray[$i]->id?></h3>
        </div>
        <figure class="panel-body">
          <img class="img-rounded img-fluid " alt="Cinque Terre" width="404" height="336" src="<?=$imagesArray[$i]->path?>"/>
		  <?php $desc = $imagesArray[$i]->description ?>
          <figcaption>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#descModal<?=$i?>">
            See steps
            </button>
          </figcaption>
          <div class="modal fade" id="descModal<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="descModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="descModalLabel">Modal title</h5>
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
        <!--<div class="panel-footer">
          <div class="label label-success" id="template-tag">sample</div>
        </div>!-->
      </div>
    </div>
    <?php } ?>
  </main>
</body>
</html>
