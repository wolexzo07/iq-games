<?php
include_once("../../finishit.php");
xstart("0");
if(isset($_POST['pid']) && !empty($_POST['pid']) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
$id = xp("pid");
$title = "RE: ".strtoupper(xp("title"));
$user = xpmail("userid");
$msg = xp("msgrep");
$os = xos();$ip = xip();$br = xbr();
$token = sha1(uniqid());$time = x_curtime(0,1);

      if(x_count("feedback","id='$id' AND status='pending' LIMIT 1") > 0){
        x_update("feedback","id='$id' AND status='pending'","status='treated'","","Failed");

        //notify started
        $rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");
      x_insert("type,title,email,message,status,rtime,stime","notifyme","'p','$title','$user','<p>$msg</p><p><b>IQ-GAMES TEAM</b></p>','0','$rtimen','$stimen'","","Failed to send notification");
      include_once("replymail.php");
        //notify ended

        x_insert("email,subject,message,reply_id,replied_on,status","feedback","'$user','$title','$msg','$id','$time','treated'","<p class='hubmsg'>Message treated!</p>","<p class='hubmsg'>Failed to insert data!</p>");

      }else{
        x_print("<p class='hubmsg'>Invalid or treated message!</p>");
      }
    }else{
      x_print("<p class='hubmsg'>Parameter Missing!</p>");
    }
?>
