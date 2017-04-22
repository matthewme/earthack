<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Earthy Projects</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='//fonts.googleapis.com/css?family=Fontdiner Swanky' rel='stylesheet'>
  <link rel="stylesheet" href="views/search.css"/>
</head>
<body>
  <header>
    <h1>Earthy Projects</h1>
  </header>
  <main>
    <form class="form input-group" method="POST" action="">
      <input type="text" class="form-control" name="idea" id="ideabox"/>
      <span class="input-group-btn">
        <button type="button" class="btn btn-success">Search</button>
      </span>
    </form>
    <button type="button" class="btn btn-success" id="add-button">Add</button>
    <form action="" method="post" enctype="multipart/form-data"/>
        <input type="file" name="file_img"/>
          <input type="submit" name="btn_upload" value="Upload" class="btn btn-success"/>
    </form>
    <div id="idea-list">
      <div class"panel panel-default" id="template">
        <div class="panel-heading">
          <h3 class="panel-title">SAMPLE IDEA</h3>
        </div>
        <figure class="panel-body">
          <img src="images/sample.jpg"/>
          <figcaption>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#descModal">
            See steps
            </button>
          </figcaption>
          <div class="modal fade" id="descModal" tabindex="-1" role="dialog" aria-labelledby="descModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="descModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>This is the sample image description</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </figure>
        <div class="panel-footer">
          <div class="label label-success" id="template-tag">sample</div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
