<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Compilr Mobile: Upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.css" media="screen">
    <link rel="stylesheet" href="http://bootswatch.com/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://bootswatch.com/assets/css/bootswatch.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="./bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="./bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
     </head>
  <body style="background-color: #141d27;">
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="./compilr_files/compilr.html" class="navbar-brand">Compilr</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
            </li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://wrapbootstrap.com/?ref=bsw" target="_blank">Desktop IDE</a></li>
          </ul>

        </div>
      </div>
    </div>

    <div class="splash">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <div><img class="logo1" src="img/l.png"></div>
            
            <form action="send.php" method="post" enctype="multipart/form-data">
            <h2>Add Source</h2><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            <span style="width:22em"class="btn btn-info btn-file">
				Browse <input name="file" id="file" type="file"/>
			</span><br><br>
            <input type="submit" href="#" name="i1" style="width:22em" class="btn btn-primary" value="Add To New Project"/> <br> 
            <hr style="width: 22em">
            <input type="text" href="#" class="form-control" name="i22" placeholder="Existing Project Name" style="margin: 0 auto; width:22em"/><br>
            <input type="submit" href="#" name="i2" style="width:22em" class="btn btn-success" value="Add To Existing Project"/> <br> <br>

            </form>
            
                        <div class="row">
              
            </div>
          </div>
        </div>

      </div>
    </div>

    <script src="./compilr_files/jquery-1.10.2.min.js"></script>
    <script src="./compilr_files/bootstrap.min.js"></script>
    <script src="./compilr_files/bootswatch.js"></script>
    <script>
      !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
    </script>
  

</body></html>