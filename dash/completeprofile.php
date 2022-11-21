<?php
require_once("../finishit.php");
xstart("0");
if(isset($_SESSION["IQGAMES_ID_2018_VISION"])&& isset($_POST['identity_update']) || !empty($_POST['identity_update'])){
$email = xp("email");
$gen = xp("gen");
 $country = xp("country");$state = xp("state");
  if($country != "Nigeria"){
  echo "<p class='hubmsg'>Nigerian is supported for now</p>";
	exit();
 }

  $how = xp("how");

//getting upload limit from db started

if(x_count("filelimit","status='1' LIMIT 1") > 0){
	foreach(x_select("user_reg","filelimit","status='1'","1","id") as $key){

		$sizep = $key["user_reg"];
		xcsize("userphoto",$sizep);

		}
	}else{
		echo "<p class='hubmsg'>No upload limit detected!</p>";
		exit();
		}

//getting upload limit fromdb ended

xcload("userphoto");

xtex("png,gif,jpg","userphoto");
 $token = sha1($email.uniqid().xrands(10).Date("His"))."_";
$path_one = xpath("userphoto","userphoto/$token");
$path_oner = xpath("userphoto","userphoto/$token");


 $time = x_curtime("0","0");$rtime = x_curtime("0","1");

if(x_count("userdb_bank","email='$email' AND status='1' LIMIT 1") > 0){

xmload("userphoto",$path_oner,"");

x_update("userdb_bank","email='$email'","medium='$how',user_photo='$path_one',country='$country',state='$state',gender='$gen'","","<p class='hubmsg'>Failed to update account</p>");

$_SESSION["IQGAMES_PHOTO_2018_VISION"] = $path_one;
$_SESSION["IQGAMES_COUNTRY_2018_VISION"] = $country;
$_SESSION["IQGAMES_STATE_2018_VISION"] = $state;
$_SESSION["IQGAMES_GENDER_2018_VISION"] = $gen;
//finish("./manpag","Data updated successfully! Re-Login to effect changes");
echo "<p class='hubmsg'>Data updated successfully.</p>";

}else{
echo "<p class='hubmsg'>Incorrect Pin! Please provide valid pin</p>";
}


}else{
		echo "<p class='hubmsg'>Parameter is missing!</p>";
		//exit();
}
?>
