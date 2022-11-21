<?php
include_once("../../finishit.php");

if(isset($_POST["tellme"]) && !empty($_POST["tellme"])){
	
	$matric = xp("matric");	$pass = xp("pass"); $dated = x_curtime(0,1);
	$passkey = sha1(xp("pass"));
	
	if(x_count("userdata","matric_no='$matric' AND password='$passkey' LIMIT 1") > 0){

if(x_count("userdata","matric_no='$matric' AND password='$passkey' AND status='0' LIMIT 1") > 0){
	finish("logon_checker","Your account is inactive!");
}else{
		foreach(x_select("0","userdata","matric_no='$matric' AND password='$passkey'","1","fullname") as $key){
	$id = $key["id"];
	$dept = $key["role"];
	$name = $key["fullname"];
	$matric = $key["matric_no"];
	
	$mobile = $key["mobile"];
	$date = $key["dated_on"];
	$wallet = $key["wallet_amount"];
	$wtype = $key["wallet_type"];
	$ph = $key["photo_path"];
	xstart("0");
	//session_write_close();
	$_SESSION["IQGAMES_ID_2018_VISION"] = $id;
	$_SESSION["IQGAMES_DEPT_2018_VISION"] = $dept;
	$_SESSION["IQGAMES_NAME_2018_VISION"] = $name;
	$_SESSION["IQGAMES_MATRIC_2018_VISION"] = $matric;
	
	$_SESSION["IQGAMES_DATE_2018_VISION"] = $date;
	$_SESSION["IQGAMES_MOBILE_2018_VISION"] = $mobile;
	$_SESSION["IQGAMES_WALLET_2018_VISION"] = $wallet;
	$_SESSION["IQGAMES_WTYPE_2018_VISION"] = $wtype;
	$_SESSION["IQGAMES_PHOTO_2018_VISION"] = $ph;
	xstart("1");
	finish("./","0");
	}
	
}	
	
}else{
		finish("logon_checker","Invalid matric or password");
	}
	
}else{
	finish("logon_checker","Parameter Missing!");
}
?>