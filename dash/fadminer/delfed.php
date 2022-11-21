<?php
include_once("../../finishit.php");
xstart("0");
if(isset($_POST['pid']) && !empty($_POST['pid']) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
$id = xp("pid");

      if(x_count("feedback","id='$id' LIMIT 1") > 0){
        x_del("feedback","id='$id'","<p class='hubmsg'>Feedback trashed!</p>","<p class='hubmsg'>Failed to delete!</p>");
      }else{
        x_print("<p class='hubmsg'>Invalid message!</p>");
      }
    }else{
      x_print("<p class='hubmsg'>Parameter Missing!</p>");
    }
?>
