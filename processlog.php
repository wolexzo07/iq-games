<?php
include_once("finishit.php");
xstart("0");
if(isset($_POST["blessme"]) || !empty($_POST["blessme"])){
/**
	$secret = "6LcDo1sUAAAAAOF0Nwyg-jvChfPqH_w7s7YVNnn0";
	$gpost = xp("g-recaptcha-response");
	$params = array(
			   "secret" => $secret,
			   "response" => $gpost
				);

	$result = x_google("https://www.google.com/recaptcha/api/siteverify",$params);

 if($result['success']){
***/
$email = xp("email");
$salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@";
 $pass = xp("pass");
 $hash = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);
 $time = x_curtime("0","0");$rtime = x_curtime("0","1");

 $tok = sha1(uniqid().xrands(10).Date("His"));

 $os = xos();$br = xbr();$ip = xip();
	//	if($create){
if(x_count("userdb_bank","email='$email' AND pass='$hash' AND status='0' OR mobile='$email' AND pass='$hash' AND status='0' LIMIT 1") > 0){
	echo "<p class='hubmsg'>Account Inactive.Please confirm your email!</p>";
	exit();
	}
if(x_count("userdb_bank","email='$email' AND pass='$hash' AND status='1' OR mobile='$email' AND pass='$hash' AND status='1' LIMIT 1") > 0){

x_update("userdb_bank","email='$email' AND pass='$hash' AND status='1' OR mobile='$email' AND pass='$hash' AND status='1'","last_login='$time',last_login_r='$rtime'","0","0");

foreach(x_select("0","userdb_bank","email='$email' AND pass='$hash' AND status='1' OR mobile='$email' AND pass='$hash' AND status='1'","1","name") as $key){
	$id = $key["id"];
	$photo = $key["user_photo"];
	$name = $key["name"];
	$email = $key["email"];
	$mobile = $key["mobile"];
	$country = $key["country"];
	$state = $key["state"];
	$ll = $key["last_login_r"];
	$rt = $key["realtime"];
	$gen = $key["gender"];
	$pos = $key["plan"];
	$ref = $key["ref"];
	$token = $key["token"];
	$bn = $key["bank_name"];
	$acn = $key["account_name"];
	$acnumb = $key["account_number"];
	$cur = $key["wallet_type"];

	$os = $key["os"];
	$br = $key["br"];
	$ip = $key["ip"];

if($state == ""){
$state = "update profile";
}
	}

	$_SESSION["IQGAMES_OS_2018_VISION"] = $os;
	$_SESSION["IQGAMES_BR_2018_VISION"] = $br;
	$_SESSION["IQGAMES_IP_2018_VISION"] = $ip;
	$_SESSION["IQGAMES_ID_2018_VISION"] = $id;
	$_SESSION["IQGAMES_PHOTO_2018_VISION"] = $photo;
	$_SESSION["IQGAMES_NAME_2018_VISION"] = $name;
	$_SESSION["IQGAMES_EMAIL_2018_VISION"] = $email;
	$_SESSION["IQGAMES_MOBILE_2018_VISION"] = $mobile;
	$_SESSION["IQGAMES_COUNTRY_2018_VISION"] = $country;
	$_SESSION["IQGAMES_STATE_2018_VISION"] = $state;
	$_SESSION["IQGAMES_GENDER_2018_VISION"] = $gen;
	$_SESSION["IQGAMES_PLAN_2018_VISION"] = $pos;
	$_SESSION["IQGAMES_TOKEN_2018_VISION"] = $token;
	$_SESSION["IQGAMES_REF_2018_VISION"] = $ref;
	$_SESSION["IQGAMES_LL_2018_VISION"] = $ll;
	$_SESSION["IQGAMES_RT_2018_VISION"] = $rt;
	$_SESSION["IQGAMES_BN_2018_VISION"] = $bn;
	$_SESSION["IQGAMES_ACN_2018_VISION"] = $acn;
	$_SESSION["IQGAMES_ACNUMB_2018_VISION"] = $acnumb;
	$_SESSION["IQGAMES_CUR_2018_VISION"] = $cur;
	xstart("1");
	#echo "session written";
	finish("dash/manpag","0");


}else{
//echo "<p class='hubmsg'>Failed to login! Try again.</p>";
}
	finish("iqlogin","Failed to login! Try again");

/**}else{
		//echo "<p class='hubmsg'>Invalid captcha!</p>";
    finish("iqlogin","Invalid captcha!");
	}**/

}else{
	echo "<p class='hubmsg'>Parameter missing!</p>";
}
?>
