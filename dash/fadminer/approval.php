<?php
include_once("../../finishit.php");
xstart("0");
if(isset($_POST['pid']) && !empty($_POST['pid']) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
$id = xp("pid");
$amt = xp("amount");
$user = xpmail("email");
$namex = xp("name");

if(x_count("withdrawalbase","id='$id' AND status='pending' LIMIT 1") > 0){

//insert notification data started

$rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");$refamt = number_format($amt,2);

x_insert("type,title,email,message,status,rtime,stime","notifyme","'p','YOUR WITHDRAWAL OF <b>NGN $refamt</b> HAS BEEN SENT.','$user','<p>Hi <b>$namex</b>,</p>Your withdrawal request of <b>NGN $refamt</b> has been granted and the money has been sent to your bank account. Thank you.<br/><br/><b>IQ-GAMES TEAM</b> ','0','$rtimen','$stimen'","","Failed to send notification");

//notification ended

x_update("withdrawalbase","id='$id' AND status='pending'","status='approved'","","Failed");
x_print("Approved <i class='fa fa-check'></i>");

}else{
x_print("invalid data");
}

}else{
  x_print("invalid parameter");
}
?>
