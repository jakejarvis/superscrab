<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <title>#funwithsuperscrab</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Custom Favicon -->
  <link rel="shortcut icon" href="/favicon.ico">
  
  <!-- Le font -->
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <!-- Le CSS -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/lightbox.css">
  <link rel="stylesheet" href="/css/custom.css">

  <!-- Le Javascript -->
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/lightbox.min.js"></script>

  <script>
    $(function() {
      $('input#file').change(function() {
        $('#submit').click();
      });
    });
  </script>

</head>

<body>


<div class="container">
  
  <div class="row">
    
      <div class="col-md-6 text-center">
        <img src="/img/superscrab-logo-large.png" style="width: 200px; height: 200px; margin-top: 20px;" alt="#funwithsuperscrab" title="#funwithsuperscrab">
      </div>
       <div class="col-md-6 text-center">
          <h2><span style="color:#06d532">Happy</span> <span style="color:#ff0000">Secret</span> <span style="color:#06d532">Santa</span>, <span style="color:#ff0000">S</span><span style="color:#ecdd08">u</span><span style="color:#ff0000">p</span><span style="color:#ecdd08">e</span><span style="color:#ff0000">s</span>!</h2>
          <p>First off, I sincerely apologize for taking advantage of the few days you were off slaving away at <span style="color:#002664;">Nova</span> for me to take my sweet time on your gift. </p>
          <p>On a more serious note, I couldn't have picked a better person to sit next to for eight weeks while we made immature jokes under our breath and secretly judged the two campers directly in front of us.</p>
          <p>To commemorate all the fun we've had together, I could think of no better way than to manually insert ourselves into <em>other, more</em> fun situations! <small>(Examples below.)</small> 
        </div>
  </div>
  <div class="row">
    <div class="col-md-6 text-center">
      <h1><span style="color:#ff0000">#funwithsuperscrab</span></h1>
    </div>
    <div class="col-md-6">
      
      <form id="target" action="/picasso" method="post" enctype="multipart/form-data">
        <input id="submit" type="submit" name="submit" value="Submit" style="display:none;">

        <div class="fileUpload btn btn-danger btn-lg btn-block">
            <span class="glyphicon glyphicon-picture"></span> Click here to make your own <strong>#funwithsuperscrab</strong>!
            <input id="file" type="file" name="image" accept="image/*" class="upload" />
        </div>
      </form>
      
    </div>
  </div>
  

  
  
  <hr>
  
  <div class="row">
    
    <?php
      include_once("db.php");

      $result = mysql_query("SELECT * FROM masterpieces WHERE masterpiece_public = TRUE ORDER BY masterpiece_id DESC") or die(mysql_error());

      while($masterpiece = mysql_fetch_array($result)) {
        echo '<div class="col-md-4 thumb">';
        echo '  <a class="thumbnail" href="/masterpieces/' . $masterpiece['masterpiece_file'] . '" data-lightbox="image-1"><img src="/masterpieces/' . $masterpiece['masterpiece_file'] . '" class="img-responsive" style="width:350px; height: 200px;" alt="#funwithsuperscrab"></a>';
        echo '</div>';
      }
    ?>
    
  </div>
  
  
  <hr>
  
  <div class="text-center">
    Made with <span style="color:#ff0000">&hearts;</span> for <a href="http://supes.io">Supes</a> by <a href="http://scrabble.io">Scrabble</a>.
    <br><br>
    <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fsuperscrab.com%2F" target="_blank"><img src="/img/valid-html5-button.png" alt="W3C HTML5 Verified"></a>
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