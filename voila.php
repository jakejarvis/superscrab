<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

if(!$_POST) {
//  header("Location:/");
//  die();
}

// RESET TEMP FILE
//file_put_contents("temp_image", "");




// get the base-64 string from data
$filtered_data = substr($_POST['img_val'], strpos($_POST['img_val'], ",") + 1);
 
// decode the string
$unencoded_data = base64_decode($filtered_data);

// come up with a random name for the image
$file_name = md5(rand((-1 * time()), time()) + time() + "supes") . ".png";      // wooooo fun random

// save the image
$handle = fopen($_SERVER['DOCUMENT_ROOT']."/masterpieces/".$file_name, 'x+');
fwrite($handle, $unencoded_data);
fclose($handle);



// record masterpiece to the database
include_once("db.php");

mysql_query("INSERT INTO masterpieces (masterpiece_file, masterpiece_ip) VALUES (\"" . $file_name . "\", \"". $_SERVER['REMOTE_ADDR'] ."\")")
   or die(mysql_error());

// id of newly recorded masterpiece
$this_id = mysql_insert_id();


?>


<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <title>superscrab!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Le font -->
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <!-- Le CSS -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  
  <!-- Custom Favicon -->
  <link rel="shortcut icon" href="/favicon.ico">
  
</head>

<body>



  





<div class="container">


  <div class="row">
    <div class="col-md-12">
      <img src="/masterpieces/<?= $file_name ?>" style="width:100%; border: 6px solid #ff0000" alt="#funwithsuperscrab">
    </div>
  </div>

  <!-- begin header -->
  <div class="row">
    <div class="col-md-4">
      
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="/img/superscrab-logo-large.png" style="width: 200px; height: 200px; margin-top: 20px;" alt="#funwithsuperscrab" title="#funwithsuperscrab">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <h1><a href="/" style="color:#ff0000">#funwithsuperscrab</a></h1>
        </div>
      </div>
    </div>
    
    
    
    <div class="col-md-7 col-md-offset-1">
      
      <div class="row">
        <div class="col-md-12" style="margin:24px 0px 12px 0px;">
          <a href="/masterpieces/<?= $file_name ?>" class="btn btn-primary btn-lg btn-block" download><span class="glyphicon glyphicon-download-alt"></span> Save to Desktop</a>
        </div>
        <div class="col-md-12" style="margin:12px 0px;">
          <a href="/fame/<?php echo $this_id ?>/" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-th"></span> Add to Public Gallery</a>
        </div>
        <div class="col-md-12" style="margin:12px 0px;">
          <a href="javascript:history.back();" class="btn btn-warning btn-lg btn-block"><span class="glyphicon glyphicon-pencil"></span> Try Again</a>
        </div>
        <div class="col-md-12" style="margin:12px 0px;">
          <a href="/" class="btn btn-danger btn-lg btn-block"><span class="glyphicon glyphicon-trash"></span> Start Over</a>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end header -->


  <hr>
  
  <div class="text-center">
    Made with <span style="color:#ff0000">&hearts;</span> for <a href="http://supes.io">Supes</a> by <a href="http://scrabble.io">Scrabble</a>.
    <br><br>
    <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fsuperscrab.com%2Fvoila" target="_blank"><img src="/img/valid-html5-button.png" alt="W3C HTML5 Verified"></a>
    <img src="/img/90s/notepad.gif" alt="GET NOTEPAD">
    <img src="/img/90s/ns_logo.gif" alt="Netscape Now! 3.0">
    <img src="/img/90s/ie_logo.gif" alt="Free MS Internet Explorer">
    <img src="/img/90s/noframes.gif" alt="Campaign Against FRAMES!">
    <br>
    <img src="/img/90s/counter.gif" alt="This many awesomes!">
  </div>

</div>




<script type="text/javascript">
  var _gauges = _gauges || [];
  (function() {
    var t   = document.createElement('script');
    t.type  = 'text/javascript';
    t.async = true;
    t.id    = 'gauges-tracker';
    t.setAttribute('data-site-id', '53ddc4018bfdf73b8f007687');
    t.src = '//secure.gaug.es/track.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(t, s);
  })();
</script>

</body>
</html>