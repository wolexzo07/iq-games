<?php
include_once("finishit.php");
xstart("0");
if(isset($_POST["prome"]) && !empty($_POST["prome"])){

	$secret = "6LcDo1sUAAAAAOF0Nwyg-jvChfPqH_w7s7YVNnn0";
	$gpost = xp("g-recaptcha-response");
	$params = array(
			   "secret" => $secret,
			   "response" => $gpost
				);

	$result = x_google("https://www.google.com/recaptcha/api/siteverify",$params);

 if($result['success']){

	$fullname = ucwords(strtolower(xp("full")));$mobile = xp("mobile");$email = xpmail("email");
$salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@";
 $pass = xp("pass");$plan = xp("plan");$hash = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);

 $ref = xpp("ref");$check = xp("checknow");
  $time = x_curtime("0","0");$rtime = x_curtime("0","1");

 $tok = "iqgames_".sha1(uniqid().xrands(10).$email.Date("His"));

 if(empty($check)){
			  //echo "<p class='hubmsg'>You must agree to our terms.</p>";
				finish("iqregistration","You must agree to our terms.");
			  exit();
			  }
			  //checking for valid mobile number
			   if(!is_numeric($mobile) || (strlen($mobile) != 11)){
			  //echo "<p class='hubmsg'>You must provide valid phone number.</p>";
					finish("iqregistration","You must provide valid phone number.");
			  exit();
			  }

$create = x_dbtab("userdb_bank","
	verify ENUM('0','1') NOT NULL,
	id_type ENUM('intl. passport','Drivers License','Voters Card','National ID Card') NOT NULL,
	plan VARCHAR(120) NOT NULL,
	wallet_balance DOUBLE NOT NULL,
	wallet_bonus DOUBLE NOT NULL,
	wallet_credit DOUBLE NOT NULL,
	sub_status ENUM('inactive','active') NOT NULL,
	sub_date DATETIME NOT NULL,
	user_photo TEXT NOT NULL,
	card_photo TEXT NOT NULL,
	status ENUM('0','1') NOT NULL,
	name VARCHAR(220) NOT NULL,
	gender ENUM('male','female') NOT NULL,
	email VARCHAR(200) NOT NULL,
	pass TEXT NOT NULL,
	ref VARCHAR(100) NOT NULL,
	medium VARCHAR(230) NOT NULL,
	mobile VARCHAR(150) NOT NULL,
	country VARCHAR(150) NOT NULL,
	state VARCHAR(150) NOT NULL,
	account_name VARCHAR(220) NOT NULL,
	account_number VARCHAR(220) NOT NULL,
	bank_name VARCHAR(220) NOT NULL,
	token TEXT NOT NULL,
	timest DATETIME NOT NULL,
	realtime VARCHAR(100) NOT NULL,
	total_earned DOUBLE  NOT NULL,
	total_spent DOUBLE  NOT NULL,
	os VARCHAR(100) NOT NULL,
	br VARCHAR(220) NOT NULL,
	ip VARCHAR(30) NOT NULL,
	last_login DATETIME NOT NULL,
	last_login_r VARCHAR(220) NOT NULL
			","MYISAM");
			$os = xos();$br = xbr();$ip = xip();
if($create){
	if(x_count("userdb_bank","email='$email' LIMIT 1") > 0){
//echo "<p class='hubmsg'>Email <b>$email</b> already used!</p>";
finish("iqregistration","Email already taken.");
}else{
if(x_count("userdb_bank","mobile='$mobile' LIMIT 1") > 0){
//echo "<p class='hubmsg'>Mobile <b>$mobile</b> already used!</p>";
finish("iqregistration","Mobile number already taken.");
}else{

	//importing sms module
	$msg = urlencode("Hi $fullname, welcome onboard to iqgames (https://iqgames.app).Login details: ID:$email; Pass: $pass");
	$api = "dc653ff9";
	$sender = "iqames";
	$route = 3;
	$result = "234".substr($mobile,1,10);
	$params = array(
			   "api_key" => $api,
			   "recipient" => $result,
			   "message" => $msg,
				 "route" => $route,
				 "sender" => $sender
				);


if(x_count("signup_activation","status='1' LIMIT 1") > 0){
include_once("usermail.php");
//echo "<font style='color:white;'>".xpost("http://pmcsms.com/api/v1/http.php",$params)."</font>";
x_insert("plan,status,name,email,pass,token,timest,realtime,os,br,ip,mobile,ref","userdb_bank","'$plan','0','$fullname','$email','$hash','$tok','$time','$rtime','$os','$br','$ip','$mobile','$ref'","<p class='hubmsg'>Account created. <a href='iqlogin'>Login here</a></p>","<p class='hubmsg'>Failed to insert data</p>");
}else{
//echo "<font style='color:white;'>".xpost("http://pmcsms.com/api/v1/http.php",$params)."</font>";
x_insert("plan,status,name,email,pass,token,timest,realtime,os,br,ip,mobile,ref","userdb_bank","'$plan','1','$fullname','$email','$hash','$tok','$time','$rtime','$os','$br','$ip','$mobile','$ref'","<p class='hubmsg'>Account created. <a href='iqlogin'>Login here</a></p>","<p class='hubmsg'>Failed to insert data</p>");

}

}
}
}else{
	x_print("<p class='hubmsg'>Failed to create db!.</p>");
}


 }
 else{
	//x_print("<p class='hubmsg'>Invalid Captcha!Try again.</p>");
finish("iqregistration","Invalid Captcha!Try again.");
 }

}else{
	x_print("Parameter Missing");
}
?>
