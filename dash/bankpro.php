<?php
require_once("../finishit.php");
xstart("0");
if(isset($_SESSION["IQGAMES_EMAIL_2018_VISION"])&& isset($_POST['bank_update']) || !empty($_POST['bank_update'])){
$bankname = xp("bankname");
$acctname = xp("acctname");
$acctnum = xp("acctnum");
$email = xp("email");

if(empty($_POST["bankname"]) || empty($_POST["acctname"]) || empty($_POST["acctnum"])){
$msg="Please all fields must be filled!";
echo $msg;
}else{
if(x_count("userdb_bank","email='$email' AND status='1' LIMIT 1") > 0){
	x_update("userdb_bank","email='$email'","bank_name='$bankname',account_name='$acctname',account_number='$acctnum'","0","0");
	echo "<p class='hubmsg'>Account Updated successfully</p>";
}else{
	echo "<p class='hubmsg'>Invalid user account</p>";
}
}

}
?>