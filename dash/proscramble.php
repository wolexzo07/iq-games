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
if(isset($_POST["gameplayed_id"]) && !empty($_POST["gameplayed_id"]) && isset($_POST["game_id"]) && !empty($_POST["game_id"]) && isset($_SESSION["EXAM_STARTED_ALREADY"])){

	if(!isset($_SESSION['timeer'])){
    //detect demo games started
    if(isset($_SESSION['GAME_DEMO_KEY'])){
    		unset($_SESSION['GAME_DEMO_KEY']);
    	}
    //detect demo games ended
	finish("manpag","Time expired");
	exit();
	}

	$gameid = xp("game_id");$gamepid = xp("gameplayed_id");
	$planr = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
	$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);

  //detect demo games started
  if(isset($_SESSION['GAME_DEMO_KEY'])){

  	}else{

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


    $word = xpo("scramble");$first = xpo("first");$second = xpo("second");
    if(empty($word) || empty($first) || empty($second)){
    x_print("<p class='hubmsg'>Incomplete prediction was posted.</p>");
    exit();
    }

	$word = strtoupper(xp("scramble"));$first = strtoupper(xp("first"));$second = strtoupper(xp("second"));


  if(isset($_SESSION['GAME_DEMO_KEY'])){
  $qbase = x_count("demo_scramble","questions='$word' AND status='1' LIMIT 1");
  }else{
  $qbase = x_count("question_scramble","questions='$word' AND status='1' LIMIT 1");
  }


	if($qbase > 0){

		$len = strlen($word);

	if((strlen($word) < $len) || (strlen($first) < $len) || (strlen($second) < $len)){
		x_print("<p class='hubmsg'>Word must not be less than $len-letters</p>");
	}else{

    if(isset($_SESSION['GAME_DEMO_KEY'])){
      $array = array("$first","$second");
      $final = x_shuffle($word);

    }else{
      $array = array("$first","$second");
      $final = x_shuffle($word);
      $exfinal = x_shuffle($word);
      include_once("cheatscram.php");
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
<td>Word scrambled</td>
<th><?php echo $word;?></th>
</tr>
<tr>
<td>Your First Prediction</td>
<th><?php echo $first;?></th>
</tr>
<tr>
<td>Your Second Prediction</td>
<th><?php echo $second;?></th>
</tr>
<tr>
<td>System scrambled result</td>
<th><?php echo $final;?></th>
</tr>

<tr>
<th>Rewarded Amount</th>
<th>
<?php
if(in_array($final,$array)){
		$planr = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
			if(x_count("iqplans","type='$planr' AND status='1' LIMIT 1") > 0){
			foreach(x_select("reward","iqplans","type='$planr' AND status='1'","1","id") as $kel){
				$rewd = $kel["reward"];
					$reward = "NGN ".number_format($rewd,2);
				}

                if(isset($_SESSION['GAME_DEMO_KEY'])){
                    echo "<b>".$reward."</b> (Demo reward)";
                }else{
                    echo "<b>".$reward."</b>";
                }

			}else{
				 echo "Invalid plan";
			}
}else{

        if(isset($_SESSION['GAME_DEMO_KEY'])){
            	echo "<b>NGN 0.00</b> (Demo reward)";
        }else{
            	echo "<b>NGN 0.00</b>";
        }

}
?>
</th>
</tr>

<tr>
<th>Final Remarks</th>
<th>
<?php
if(in_array($final,$array)){
	echo "Congratulations! You are a Genius";
}else{
	echo "Sorry! Try and play again";
}
?>
</th>
</tr>
</table>
<?php
//detecting demo games
if(isset($_SESSION['GAME_DEMO_KEY'])){

}else{

  $endtime = x_curtime(0,1);
  if(in_array($final,$array)){

  	if(x_count("userdb_bank","id='$userid'") > 0){
  		foreach(x_select("wallet_balance","userdb_bank","id='$userid'","1","id") as $key){
  			$wb = $key["wallet_balance"];
  		}
  		$naddup = $wb + $rewd;
  		x_update("userdb_bank","id='$userid'","wallet_balance='$naddup'","","<p class='hubmsg'>Failed to update balance!</p>");

  		x_update("games_played","user_id='$userid' AND game_id='$gameid'","status='won',enddate='$endtime',reward_amount='$rewd',iq_test_passed='',iq_test_failed='',iq_test_total=''","","<p class='hubmsg'>Failed to update game played</p>");
  	}else{
  		x_print("<p class='hubmsg'>Invalid user account detected!</p>");
  	}


  }else{
  	x_update("games_played","user_id='$userid' AND game_id='$gameid'","status='lost',enddate='$endtime',reward_amount='0',iq_test_passed='',iq_test_failed='',iq_test_total=''","","<p class='hubmsg'>Failed to update game played</p>");
  }


}

unset($_SESSION['timeer']);
unset($_SESSION["EXAM_STARTED_ALREADY"]);
  if(isset($_SESSION['GAME_DEMO_KEY'])){
    unset($_SESSION['GAME_DEMO_KEY']);
  }
	}

	}else{
		finish("manpag","Invalid question detected!");
		unset($_SESSION['timeer']);
		unset($_SESSION["EXAM_STARTED_ALREADY"]);
      if(isset($_SESSION['GAME_DEMO_KEY'])){
        unset($_SESSION['GAME_DEMO_KEY']);
      }
	}

?><div class="capp text-center">Powered by <font class="colorg">IQ-GAMES&trade;
		</font></b></div><?php
}else{
	finish("manpag","Parameter Missing!");
		unset($_SESSION['timeer']);
		unset($_SESSION["EXAM_STARTED_ALREADY"]);
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
