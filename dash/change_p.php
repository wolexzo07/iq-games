<?php
require_once("../finishit.php");
xstart("0");
if(isset($_SESSION["IQGAMES_ID_2018_VISION"])&& isset($_POST['changep']) || !empty($_POST['changep'])){
	
$old = xp("old");
$new = xp("new");
$neww = xp("neww");
$email = strtolower(xp("email"));

$salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@"; 
$pass = xp("new");
$hashnew = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);
 
$pass_me = xp("old");
$hashold = md5(sha1($pass_me).$salt).sha1(sha1($pass_me).$salt);

  $time = x_curtime("0","0");$rtime = x_curtime("0","1");
  
  $os = xos();$br = xbr();$ip = xip();
  
  $token = sha1(xrands(30).DATE("His"));
  
  $refid = time().rand(50,500900222).xrands(10);
  

if(x_count("userdb_bank","email='$email' AND status='1' LIMIT 1") > 0){
	
	if($new == $neww){
		if(x_count("userdb_bank","email='$email' AND pass='$hashold' AND status='1' LIMIT 1") > 0){
			x_update("userdb_bank","email='$email' AND pass='$hashold' AND status='1'","pass='$hashnew'","0","Failed to update pass");
			echo "<p class='hubmsg'>Password changed successfully!</p>";
			}else{
			
			echo "<p class='hubmsg'>Incorrect old password!</p>";	
			
			}
		}else{
			
			echo "<p class='hubmsg'>New password does not match!</p>";
			}

}else{
			echo "<p class='hubmsg'>Invalid user detected!</p>";
}
		
}
?>
