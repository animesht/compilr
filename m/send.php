
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Compilr Mobile</title>
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
            
            
            <?php

$uploaddir = dirname(__FILE__) . '/img/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$rename = "img/".basename($_FILES['file']['name']);
$imgname = basename($_FILES['file']['name']);
$username = "hackmit";

if (isset($_POST['i1'])) {
$today = date("Ymd");
$today2 = date("h-i-s");
$project_name = "Project_".$today."-".$today2; //new project
$command = "mkdir ../workspace/".$project_name;
shell_exec($command);

//add to JSON array

$filename = "../data/projects.php";
$handle = fopen($filename, "c+");
$contents = fread($handle, filesize($filename));
fclose($handle);
$parse = explode(']', $contents);
$parse = $parse[0].',{"name":"'.$project_name.'","path":"'.$project_name.'"}]|*/?>';
file_put_contents($filename, $parse);

}

else {
//check JSON array
$filename = "../data/projects.php";
$handle = fopen($filename, "c+");
$contents = fread($handle, filesize($filename));
fclose($handle);
$search = $_POST['i22'];
$parse = strpos($contents, $search);
if ($parse!=FALSE) {
$project_name = $search;
}
else {
	echo "<h4><strong>Error:</strong> Please enter a valid Project ID or add to a new project.</h4>";
}
}

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
	echo "<h2>Upload Complete</h2><br>";
	echo "<img class='preview' src='http://104.131.73.200/m/".$rename."'/><br><br>";
} else {
    echo "<h2>Upload Error.</h3><h5>Please retry with a different image, preferably one with a smaller file size.</h5><br>";
}


$s = explode('.', $imgname);
$source_file_name = $s[0]."_extract";
$command1 = "cp"." ".$rename." ../workspace/".$project_name."/";
shell_exec($command1);
$command = "java -jar /var/www/html/compilr-backend-all-1.0.jar"." ".$username." ".$project_name." ".$source_file_name." ".$imgname." "."--path=/var/www/html/workspace/";
$output = shell_exec($command);
echo "<h4><strong>Project Name: </strong>".$project_name."</h4>";
echo "<h5>Project, image and output saved to <a target='_blank' href='http://104.131.73.200/'>Compilr IDE</a></h5><br>";

echo  "<a target='_blank' href='http://104.131.73.200/#".$project_name."/".$source_file_name.".cpp'"."style='width:22em' class='btn btn-info btn-file'>Launch Compilr IDE</a></span><br>";
echo  "<hr style='width: 22em'>";

$n_err = substr_count($output, '^');
echo $n_err." error(s) detected.<br>";
echo "<h4>Terminal Output:</h4>";
echo "<textarea class='out'>".$output."</textarea><br>";



$filename = "../workspace/".$project_name."/".$source_file_name.".cpp";
$handle = fopen($filename, "c+");
$contents = fread($handle, filesize($filename));
fclose($handle);

?>
<div id="getcode" style="display:none;"><?php  echo $contents ?></div>
<div id="getname" style="display:none;"><?php  echo $project_name ?> </div>



 
            <?php echo "<a id='link' target='_blank' href='http://104.131.73.200/#".$project_name."/".$source_file_name.".out' style='width:22em' class='btn btn-primary'>View Output File</a><br><br>"; ?>
            <a href="#!" onclick="createGist()" style="width:22em" class="btn btn-success">Export Gist</a> <br> <br>
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
$(function() {
});

function createGist() {
	var projectName = $('#getname').text().trim();
	var sourceFileName = projectName + '.cpp';
	var outputFileName = projectName + '.out';
	var sourceCode = $('#getcode').text();
	var output = $('textarea.out').text();

	var files = {};
	files[sourceFileName] = {"content" : sourceCode};
	files[outputFileName] = {"content" : output};

	$.ajax({
	     url:'https://api.github.com/gists',
	     type: 'POST',
	     contentType: 'application/json',
	     data: JSON.stringify(
	        {
			  "description": "Test gist",
			  "public": true,
			  "files": files
			}),
	     success:function(json){
	         // do stuff with json (in this case an array)
	         //console.log(json);
	         document.getElementById("link").href= json.html_url;
/* 	         $('#link').attr('href', json.html_url); */
			 window.open(json.html_url, '_blank');
	     },
	     error:function(){
	         console.log('Error while tyring to post Gist.');
	     }      
	});	
}
</script>
    
    <script>
      !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
    </script>
  

</body></html>