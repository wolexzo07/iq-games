<?php
include_once("../finishit.php");
xstart("0");
if(isset($_POST["gametype"]) && !empty($_POST["gametype"]) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
	$uid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
	$gametype = xp("gametype");
	$wallet = xp("wallet");



	if(x_count("userdb_bank","id='$uid' LIMIT 1") > 0){

		//creating table for game played

		$create=x_dbtab("games_played","
		user_id INT NOT NULL,
		gametype VARCHAR(100) NOT NULL,
		plan VARCHAR(100) NOT NULL,
		plan_amount DOUBLE NOT NULL,
		game_id TEXT NOT NULL,
		iq_test_passed INT NOT NULL,
		iq_test_failed INT NOT NULL,
		iq_test_total INT NOT NULL,
		reward_amount DOUBLE NOT NULL,
		status ENUM('won','lost') NOT NULL,
		startdate VARCHAR(100) NOT NULL,
		enddate VARCHAR(100) NOT NULL,
		os VARCHAR(100) NOT NULL,
		br VARCHAR(100) NOT NULL,
		ip VARCHAR(100) NOT NULL
	","MYISAM");
	if(!$create){
		x_print("<p class='hubmsg'>Failed to create table!</p>");
		exit();
		}


		//getting wallet balance
		$playcash = x_sum("play_cash","userdb_bank","id='$uid'");
		$wb = x_sum("wallet_balance","userdb_bank","id='$uid'");
		$afb = x_sum("wallet_bonus","userdb_bank","id='$uid'");

		foreach(x_select("plan","userdb_bank","id='$uid'","1","id") as $key){
			$plan = $key["plan"];
		}

		if(x_count("iqplans","type='$plan' LIMIT 1") > 0){
		foreach(x_select("amount","iqplans","type='$plan'","1","id") as $key){
			$planamt = $key["amount"];
		}

		if($wallet == "playcash"){

			if($playcash >= $planamt){
				$nbal = $playcash - $planamt;
				x_update("userdb_bank","id='$uid'","play_cash='$nbal'","","<p class='hubmsg'>Failed to update playcash Balance</p>");

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
				$playcash_format = "NGN ".number_format($playcash,2);
				x_print("<p class='hubmsg'>Insufficient Balance ($playcash_format) in your <b>play cash wallet</b>!</p>");
			}

		}elseif($wallet == "affiliatebonus"){

			if($afb >= $planamt){
				$nbal = $afb - $planamt;
				x_update("userdb_bank","id='$uid'","wallet_bonus='$nbal'","","<p class='hubmsg'>Failed to update playcash Balance</p>");

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
				$afb_format = "NGN ".number_format($afb,2);
				x_print("<p class='hubmsg'>Insufficient Balance ($afb_format) in your <b>Affiliate Bonus wallet</b>!</p>");
			}

		}elseif($wallet == "walletbalance"){

			if($wb >= $planamt){
				$nbal = $wb - $planamt;
				x_update("userdb_bank","id='$uid'","wallet_balance='$nbal'","","<p class='hubmsg'>Failed to update playcash Balance</p>");

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
				$wb_format = "NGN ".number_format($wb,2);
				x_print("<p class='hubmsg'>Insufficient Balance ($wb_format) in your <b>Wallet Balance</b>!</p>");
			}

		}else{
			x_print("<p class='hubmsg'>Invalid wallet selected!</p>");
		}

		}else{
		x_print("<p class='hubmsg'>Invalid plan detected!</p>");
		exit();
		}

	}else{
		x_print("<p class='hubmsg'>Invalid user detected!</p>");
	}

}else{
	x_print("<p class='hubmsg'>Parameter missing!</p>");
}
?>
