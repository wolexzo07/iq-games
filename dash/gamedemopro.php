<?php
include_once("../finishit.php");
xstart("0");
if(isset($_POST["gametype"]) && !empty($_POST["gametype"]) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
	$uid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);

	if(x_count("userdb_bank","id='$uid' LIMIT 1") > 0){
		$gametype = xp("gametype");$payment_status = "nothing";

		if($gametype == "1"){
			$gametype_id = 1;
			include_once("settime.php");
		}elseif($gametype == "2"){
			$gametype_id = 2;
			include_once("settime.php");
		}elseif($gametype == "3"){
			$gametype_id = 3;
			include_once("settime.php");
		}else{
			x_print("<p class='hubmsg'>Invalid Game selected!</p>");
		}

	}else{
		x_print("<p class='hubmsg'>Invalid user detected!</p>");
	}

}else{
	x_print("<p class='hubmsg'>Parameter missing!</p>");
}
?>
