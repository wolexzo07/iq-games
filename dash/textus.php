<?php
require_once("../finishit.php");
xstart("0");
if(isset($_SESSION["IQGAMES_ID_2018_VISION"])&& isset($_POST['testimoniesbase']) || !empty($_POST['testimoniesbase'])){
	
$message = ucfirst(strtolower(xp("message")));
$name = xp("name");
$email = strtolower(xp("email"));

  $time = x_curtime("0","0");$rtime = x_curtime("0","1");
  
  $os = xos();$br = xbr();$ip = xip();
  
  $token = sha1(xrands(30).DATE("His"));
  
  $refid = time().rand(50,500900222).xrands(10);
  
  $create = x_create("testifyus","
name TEXT NOT NULL,
email TEXT NOT NULL,
message TEXT NOT NULL,
ref_id TEXT NOT NULL,
date_time DATETIME NOT NULL,
timereal VARCHAR(50) NOT NULL,
status ENUM('pending','treated') NOT NULL,
token TEXT NOT NULL,
os VARCHAR(100) NOT NULL,
br VARCHAR(220) NOT NULL,
ip VARCHAR(30) NOT NULL
			");

		if($create){
if(x_count("userdb_bank","email='$email' AND status='1' LIMIT 1") > 0){
x_insert("name,email,message,ref_id,date_time,timereal,status,token,os,br,ip","testifyus","'$name','$email','$message','$refid','$time','$rtime','pending','$token','$os','$br','$ip'","<p class='hubmsg'>Testimony submitted successfully</p>","<p class='hubmsg'>Failed to send message</p>");
	
		}else{
			echo "<p class='hubmsg'>Invalid user detected</p>";
}
		}else{
		echo "<p class='hubmsg'>Failed to create table</p>";
		}



}
?>
