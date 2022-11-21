<?php
require_once("../finishit.php");
xstart("0");
if(isset($_SESSION["IQGAMES_ID_2018_VISION"]) && isset($_POST['cashout']) || !empty($_POST['cashout'])){

$mainamt = xp("amount");

$mamt = number_format($mainamt,2);

if(!is_numeric($mainamt)){
	echo "<p class='hubmsg'>Enter valid amount!</p>";
	exit();
	}

$name = xp("name");
$email = strtolower(xp("email"));

  $time = x_curtime("0","0");$rtime = x_curtime("0","1");

  $os = xos();$br = xbr();$ip = xip();

  $token = sha1(xrands(30).DATE("His"));

  $refid = time().rand(50,500900222).xrands(5);

  $create = x_create("withdrawalbase","
email TEXT NOT NULL,
amount DOUBLE NOT NULL,
paystackid TEXT NOT NULL,
charge DOUBLE NOT NULL,
profit DOUBLE NOT NULL,
refid TEXT NOT NULL,
date_time DATETIME NOT NULL,
timereal VARCHAR(50) NOT NULL,
type ENUM('withdrawal','topup') NOT NULL,
status ENUM('pending','approved') NOT NULL,
token TEXT NOT NULL,
os VARCHAR(100) NOT NULL,
br VARCHAR(220) NOT NULL,
ip VARCHAR(30) NOT NULL
			");

		if($create){
if(x_count("userdb_bank","email='$email' AND status='1' LIMIT 1") > 0){
//Getting withdrawable balance
foreach(x_select("wallet_balance,wallet_type,account_name,account_number,bank_name","userdb_bank","email='$email' AND status='1'","1","id") as $key){
	$bn = $key["bank_name"]; $acctnum = $key["account_number"];$acctnam = $key["account_name"];
					$wb = $key["wallet_balance"];

					$wbb = number_format($wb,2);

					$wc = $key["wallet_type"];
				}

if(($bn == "") || ($acctnum == "") || ($acctnam == "")){
	x_print("<p class='hubmsg'><i class='fa fa-minus-circle'></i> Add your bank details before sending request.</p>");
	exit();
}

				if($wb < $mainamt){
					x_print("<p class='hubmsg'>Insufficient Amount</p>");
				}else{
					$nbal = $wb - $mainamt;
					x_update("userdb_bank","email='$email'","wallet_balance='$nbal'","","<p class='hubmsg'>Failed to update balance</p>");

					x_insert("email,amount,refid,date_time,timereal,type,status,os,br,ip","withdrawalbase","'$email','$mainamt','$refid','$time','$rtime','withdrawal','pending','$os','$br','$ip'","<p class='hubmsg'>Withdrawal amount of <b>($wc $mamt)</b> Requested successfully!</p>","<p class='hubmsg'>Failed to insert withdrawal record</p>");

					//x_print("Withdrawal amount of <b>($wc $wbb)</b> Requested successfully!");
				}
//Getting withdrawable balance ended
}else{
			echo "<p class='hubmsg'>Invalid user detected</p>";
}
		}else{
		echo "<p class='hubmsg'>Failed to create table</p>";
		}
}else{
	echo "<p class='hubmsg'>Parameter Missing!</p>";
	}
?>
