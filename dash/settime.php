	<?php
	//checking if demo game is still active
	if(isset($_SESSION['GAME_DEMO_KEY'])){
		unset($_SESSION['GAME_DEMO_KEY']);
	}

	if(isset($gametype_id) && !isset($payment_status)){
		$ghash = md5(sha1($gametype_id)).md5(sha1($gametype_id));
		unset($_SESSION["EXAM_STARTED_ALREADY"]);
		$game_id = $_SESSION["IQGAMES_ID_2018_VISION"].uniqid();

		$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);

		$_SESSION["GAMES_ID"] = $game_id;
		$_SESSION["GAMES_TYPE_ID"] = $gametype_id;

		 $os = xos();$br = xbr();$ip = xip();$rtime = x_curtime("0","1");
		$planr = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);

	if(x_count("iqplans","type='$planr' AND status='1' LIMIT 1") > 0){
			foreach(x_select("amount,reward","iqplans","type='$planr' AND status='1'","1","id") as $kel){
				$planamt = $kel["amount"];	$reamt = $kel["reward"];
				$reward = "NGN ".number_format($kel["reward"],2);
				}


			}else{
				 //echo "Invalid plan";
				 //exit();
			}

		if(x_count("games_played","user_id='$userid' AND game_id='$gametype_id' LIMIT 1") > 0){

			x_print("<p class='hubmsg'>Game ID already exist</p>");

		}else{
			x_insert("user_id,gametype,plan,plan_amount,game_id,startdate,os,br,ip,status","games_played","'$userid','$gametype_id','$planr','$planamt','$game_id','$rtime','$os','$br','$ip',''","","<p class='hubmsg'>Failed to insert data</p>");
		}


		if(x_count("iqgames_type","id='$gametype_id' AND status='1' LIMIT 1") > 0){
				foreach(x_select("timing,type","iqgames_type","id='$gametype_id' AND status='1'","1","id") as $leg){
					$time = $leg["timing"];$examtype = $leg["type"];
					}

			$seconds = $time * 60;
			$timet = time() + $seconds;
			$_SESSION['timeer'] = $timet;
			$exam_token = sha1($_SESSION["IQGAMES_ID_2018_VISION"]).sha1(uniqid());
			setcookie("$exam_token" ,"$exam_token" , $timet);

			finish("iqbase?gid=$ghash","0");

			}else{
				x_print("Invalid timing system");
			}
	}elseif(isset($payment_status) && isset($gametype_id )){

// processing for demo games play
$ghash = md5(sha1($gametype_id)).md5(sha1($gametype_id));
unset($_SESSION["EXAM_STARTED_ALREADY"]);
$game_id = $_SESSION["IQGAMES_ID_2018_VISION"].uniqid();

$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);

$_SESSION["GAMES_ID"] = $game_id;
$_SESSION["GAMES_TYPE_ID"] = $gametype_id;

 $os = xos();$br = xbr();$ip = xip();$rtime = x_curtime("0","1");
$planr = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);


if(x_count("iqgames_type","id='$gametype_id' AND status='1' LIMIT 1") > 0){
		foreach(x_select("timing,type","iqgames_type","id='$gametype_id' AND status='1'","1","id") as $leg){
			$time = $leg["timing"];$examtype = $leg["type"];
			}

	$seconds = $time * 60;
	$timet = time() + $seconds;
	$_SESSION['timeer'] = $timet;
	$exam_token = sha1($_SESSION["IQGAMES_ID_2018_VISION"]).sha1(uniqid());
	setcookie("$exam_token" ,"$exam_token" , $timet);

	$demokey = "ok";
	$_SESSION['GAME_DEMO_KEY'] = $demokey; // session created to differentiate paid & demo
	finish("iqbase?gid=$ghash","0");

	}else{
		x_print("Invalid timing system");
	}

//processing for demo games ended now
	}else{
		x_print("Invalid Game id.");
	}
?>
