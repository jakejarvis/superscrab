<?php

//echo $_GET['masterpiece_id'];

include_once("db.php");

// update masterpiece_public column for this masterpiece in db
mysql_query("UPDATE masterpieces SET masterpiece_public=TRUE WHERE masterpiece_id=".$_GET['masterpiece_id']);

// redirect back to gallery on homepage
header("Location:/");

?>