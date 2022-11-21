<?php
  include_once("../finishit.php");

  xstart("0");
  xreq("validation.php");
  xreq("headtop.php");
  xtitle("IQ Games - Exam Result");
  xreq("headbt.php");
  ?>
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase" style="">

<?php
if(isset($_POST["sayhi"]) && !empty($_POST["sayhi"]) && isset($_POST["game_id"]) && !empty($_POST["game_id"]) && isset($_SESSION["EXAM_STARTED_ALREADY"])){

if(!isset($_SESSION['timeer'])){

if(isset($_SESSION['GAME_DEMO_KEY'])){
  unset($_SESSION['GAME_DEMO_KEY']);
}

finish("manpag","Time expired");
exit();
	}



	function hashans($value){
		$salt = "AdvsagssnahaamywuwtyGtHuKiOLk415262540983?@#$%";
		return md5(sha1($value).$salt).md5($value);
	}
	$gameid = xp("game_id");$gamepid = xp("gameplayed_id");
	$planr = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
	$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);


  if(isset($_SESSION['GAME_DEMO_KEY'])){
    //for demo games

  }else{
    //for paid games

	if(x_count("iqplans","type='$planr' AND status='1' LIMIT 1") > 0){
			foreach(x_select("amount,reward","iqplans","type='$planr' AND status='1'","1","id") as $kel){
				$planamt = $kel["amount"];	$reamt = $kel["reward"];
				$reward = "NGN ".number_format($kel["reward"],2);
				}


			}else{
				 echo "Invalid plan";
				 exit();
			}
}

$counted = count($_POST["sayhi"]);
$question_id = $_POST["sayhi"];

for($i=0;$i < $counted;$i++){

	$qid = $question_id[$i];
	$ii = $i + 1;

	if(isset($_POST["$ii-ans"]) && !empty($_POST["$ii-ans"])){
	foreach($_POST["$ii-ans"] as $key){
		//$option = $key; // user posted option started looping
		}
		$option = $key;
	}else{
		$option = "f";
	}

  if(isset($_SESSION['GAME_DEMO_KEY'])){
  $qbase = "questionbank_demo";
  }else{
  $qbase = "questionbank";
  }
	if(x_count("$qbase","id='$qid' AND status='1' LIMIT 1") > 0){
		foreach(x_select("correct_option","$qbase","id='$qid' AND status='1'","1","id") as $leg){
			$cop = $leg["correct_option"];
		}

		//started checking for correct answer

		$cmark[] = 0;
		$fmark[] = 0;
		if(hashans($option) == $cop){
		$correct = "correct = $key";
		$cmark[] = 1;
		}else{
		$correct = "wrong answer ";
		$fmark[] = 1;
		}

		//echo $qid."------$key--------$cop--------$correct<br/>";

	}else{
		// echo "Invalid question detected!";
	}
}

if(isset($_SESSION['GAME_DEMO_KEY'])){
  $pass = array_sum($cmark);$fail = array_sum($fmark);
  $total = $counted;

}else{
  $pass = array_sum($cmark);$fail = array_sum($fmark);
  $total = $counted;
  include_once("cheattest.php");
}

?>
<center>
<img src="../image/iqp.png" style="margin-top:20px;width:120px;" class="img-responsive imgc"/>
</center>
<h3 style="text-align:center;border:1px dashed green;padding:15px;margin-bottom:10pt;font-weight:bold;"><i class="fa fa-book"></i> IQ-GAMES <font class="colorg">RESULT SYSTEM</font></h3>

<button onclick="parent.location='./manpag'" class="btn btn-primary"><i class="fa fa-home"></i> Home</button>
		<table class="table table-hover table-bordered">
		<caption class="capp"><i class="fa fa-user"></i> PLAYER <font class="colorg">PROFILE</font></caption>
		<tr>
		<th><img id="imgbase" class="img-responsive imcl" src="<?php
	if(isset($_SESSION["IQGAMES_PHOTO_2018_VISION"])){
		if(!file_exists($_SESSION["IQGAMES_PHOTO_2018_VISION"])){
			echo "../image/avatar.png";
		}else{
			echo $_SESSION["IQGAMES_PHOTO_2018_VISION"];
		}

	}else{
		echo "../image/avatar.png";
	}
	?>"/></th>
	<td>
	<p class="trp"><?php echo $_SESSION["IQGAMES_NAME_2018_VISION"];?><p>
	<p class="trp"><?php echo $_SESSION["IQGAMES_EMAIL_2018_VISION"];?><p>
	<p class="trp"><?php echo $_SESSION["IQGAMES_MOBILE_2018_VISION"];?><p>
	<p class="trp"><?php echo $_SESSION["IQGAMES_COUNTRY_2018_VISION"]." (".$_SESSION["IQGAMES_STATE_2018_VISION"].")";?><p>
<?php
if(isset($_SESSION['GAME_DEMO_KEY'])){
  ?><p class="colorg trp">Demo Game</p><?php
}else{
  ?><p class="colorp trp">Paid Game</p><?php
}

?>

	</td>
		</tr>
		</table>

		<table class="table table-hover table-bordered">
		<caption class="capp"><font class="colorg"><i class="fa fa-check-circle"></i> FINAL</font> RESULT </caption>
		<tr>
		<th>Total Passed</th><td><?php echo $pass;?></td>
		</tr>
		<tr>
		<th>Total Failed</th><td><?php echo $fail;?></td>
		</tr>
		<tr>
		<th>Total Question</th><td><?php echo ($fail + $pass);?></td>
		</tr>
		<tr>
		<th>Rewarded Amount</th><td><?php

if(isset($_SESSION['GAME_DEMO_KEY'])){
//for demo games played

if($pass == $counted){
  //echo "Congratulations! You are a Genius";
  $planr = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
  if(x_count("iqplans","type='$planr' AND status='1' LIMIT 1") > 0){
  foreach(x_select("reward","iqplans","type='$planr' AND status='1'","1","id") as $kel){
    $rewd = $kel["reward"];
      $reward = "NGN ".number_format($rewd,2);
    }

    echo "<b>".$reward."</b> (Demo reward)";
  }else{
     echo "Invalid plan";
  }
}else{
  echo "<b>NGN 0.00 </b>"." (Demo reward)";
}


}else{

  if($pass == $counted){
    //echo "Congratulations! You are a Genius";
    $planr = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
    if(x_count("iqplans","type='$planr' AND status='1' LIMIT 1") > 0){
    foreach(x_select("reward","iqplans","type='$planr' AND status='1'","1","id") as $kel){
      $rewd = $kel["reward"];
        $reward = "NGN ".number_format($rewd,2);
      }

      echo $reward;
    }else{
       echo "Invalid plan";
    }
  }else{
    echo "<b>NGN 0.00</b>";
  }

}


		?></td>
		</tr>
		<tr>
		<th>Final Remarks</th><td><?php
		if($pass == $counted){
			echo "Congratulations! You are a Genius";
		}else{
			echo "Sorry! Try and play again";
		}
		?></td>
		</tr>

		</table>

		<?php
    //for demo games only
    if(isset($_SESSION['GAME_DEMO_KEY'])){
      //unset($_SESSION['GAME_DEMO_KEY']);
      //final script goes here for demo games
    }else{
      //$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
  		$endtime = x_curtime(0,1);
  		$total = $fail + $pass;
  		if($pass == $counted){
  //echo "Congratulations! You are a Genius";
  	if(x_count("userdb_bank","id='$userid' LIMIT 1") > 0){
  foreach(x_select("wallet_balance","userdb_bank","id='$userid'","1","id") as $key){
  			$wb = $key["wallet_balance"];
  		}
  		$naddup = $wb + $rewd;
  		x_update("userdb_bank","id='$userid'","wallet_balance='$naddup'","","<p class='hubmsg'>Failed to update balance!</p>");

  		x_update("games_played","user_id='$userid' AND game_id='$gameid'","status='won',enddate='$endtime',reward_amount='$rewd',iq_test_passed='$pass',iq_test_failed='$fail',iq_test_total='$total'","","<p class='hubmsg'>Failed to update game played</p>");

  	}else{
  		x_print("<p class='hubmsg'>Invalid user account detected!</p>");
  	}

  		}else{
  			//echo "Sorry! Try and play again";
  x_update("games_played","user_id='$userid' AND game_id='$gameid'","status='lost',enddate='$endtime',reward_amount='0',iq_test_passed='$pass',iq_test_failed='$fail',iq_test_total='$total'","","<p class='hubmsg'>Failed to update game played</p>");
  		}

    }

		//remove timer
	unset($_SESSION['timeer']);
		unset($_SESSION["EXAM_STARTED_ALREADY"]);
    //for demo games only
    if(isset($_SESSION['GAME_DEMO_KEY'])){
      unset($_SESSION['GAME_DEMO_KEY']);
    }
		?>
		<div class="capp text-center">Powered by <font class="colorg">IQ-GAMES&trade;
		</font></b></div>
		<?php
}else{
	finish("manpag","Parameter Missing!");
		unset($_SESSION['timeer']);
			unset($_SESSION["EXAM_STARTED_ALREADY"]);
      //for demo games only
      if(isset($_SESSION['GAME_DEMO_KEY'])){
        unset($_SESSION['GAME_DEMO_KEY']);
      }
}

?>
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>

        </div>
<?php xreq("foot.php")?>
