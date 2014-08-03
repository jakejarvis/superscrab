<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if(!$_POST) {
//  header("Location:/");
//  die();
}


//var_dump($_FILES['image']['name']);


// user canceled file upload on previous page
if(!$_FILES) {
  header("Location:/");
  die();
}


copy($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/temp_image");

//move_uploaded_file($_FILES['image']['name'], $_SERVER['DOCUMENT_ROOT']."/temp_image");


//  $image_data = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
//  echo '<img src="data: '.mime_content_type($_FILES['image']['tmp_name']).';base64,'.$image_data.'">';

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <title>superscrab!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Custom Favicon -->
  <link rel="shortcut icon" href="/favicon.ico">

  <!-- Le font -->
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <!-- Le CSS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css"> <!-- overkill... just to get visual indicator of resize -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  
  <!-- Le Javascript - jQuery & jQuery UI -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  
  <!-- Le Javascript used to save canvas as an image -->
  <script src="/js/html2canvas.js"></script>
  <script src="/js/jquery.plugin.html2canvas.js"></script>
  
  <script>
    /* make superscrab draggable and resizable -- simple! */
    $(function() {
      $( "#superscrab_wrapper" ).draggable({ cursor: "move" });
      $( "#superscrab_wrapper" ).resizable({ aspectRatio: 248 / 481, ghost: true, handles: "se" } );
    });
    
    
    /* save canvas as image file */
    function capture() {
        $('#canvas').html2canvas({
            onrendered: function (canvas) {
                //Set hidden field's value to image data (base-64 string)
                $('#img_val').val(canvas.toDataURL("image/png"));
                //Submit the form manually
                document.getElementById("myForm").submit();
            }
        });
    }
    
  </script>
    
    
  <style type="text/css">
  
    html, body {
      height: 100%;
      width: 100%;
      margin: 0px;
      padding: 0px;
      overflow:hidden;
      font-family: 'Montserrat', sans-serif;
    }
  
  
    #button-top, #button-bottom {
      position: absolute;
      z-index: 20000;
      right: 20px;
    }
  
    #button-top {
      top: 20px;
    }
    
    #button-bottom {
      bottom: 20px;
    }
  
  
  
    #canvas {
      width: 100%;
      height: 100%;
      float: left;
    }

    #bgimage {
      width: 100%;
      height: 100%;
      float: left;
      z-index: -1000;
    }
    #bgimage img {
      width: 100%;
      height: 100%;
    }
  
    #superscrab_wrapper {
      width: 248px;
      height: 481px;
      float: left;
      position: absolute;
      top: 50px;
      left: 50px;
    }
      #superscrab_wrapper #superscrab {
        width: 100%;
        height: 100%;
      }
      
    
    
  </style>
</head>
<body>
  
  
  
  <div id="button-top">
    
    <button type="button" class="btn btn-success btn-lg" onclick="capture();"><span class="glyphicon glyphicon-camera"></span> Snap!</button>
    
    <form method="POST" enctype="multipart/form-data" action="/voila" id="myForm">
        <input type="hidden" name="img_val" id="img_val" value="" />
    </form>
    
  </div>
  
  
  <div id="button-bottom">
    <a href="/" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash"></span></a>
  </div>
  


  <div id="canvas">

    <div id="bgimage">
      <img src="/temp_image">
    </div>

    <div id="superscrab_wrapper">
      <img src="/img/superscrab.png" id="superscrab" class="resizable">
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
