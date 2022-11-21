<?php
include_once("../finishit.php");
xstart("0");
if(!isset($_SESSION['timeer'])){
	finish("manpag","Time expired");
	exit();
}
if(isset($_SESSION["EXAM_STARTED_ALREADY"])){
	unset($_SESSION["EXAM_STARTED_ALREADY"]);
	finish("manpag","You have reloaded this page! Timed out.");
	exit();
}

if(isset($_SESSION['GAME_DEMO_KEY'])){
	$scram = x_count("demo_scramble","status='1'");
}else{
	$scram = x_count("question_scramble","status='1'");
}

if($scram > 0){

	if(isset($_SESSION['GAME_DEMO_KEY'])){
	$rcount = x_count("demo_scramble","status='1'");
	}else{
			$rcount = x_count("question_scramble","status='1'");
	}

	$rand = mt_rand(0,$rcount - 1);
	$counter = 0;

	if(isset($_SESSION['GAME_DEMO_KEY'])){
		$scramer = x_select("length,id,questions","demo_scramble","status='1'","$rand,1","id desc");
	}else{
		$scramer = x_select("length,id,questions","question_scramble","status='1'","$rand,1","id desc");
	}

	foreach($scramer as $key){
		$counter++;
		$id = $key["id"];
		$que = $key["questions"];
		$len = $key["length"];

		?>
		<style type="text/css">
		p{
			color:black;
			text-transform:uppercase;
			text-align:left;
		}
		</style>
		<form method="POST" action="proscramble" autocomplete="off">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<center><img src="../image/rearrange.png" class="img-responsive" style="width:150px;margin-top:30pt;"/>
<h2 >WORD  <font class="colorg"><b>SCRAMBLER</b></font></h2></center>
<hr style="margin-bottom:20pt;"/>

<div class="timeclass" id="timeclasse"></div>

</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p class="let">Re-arrange the word below </p>
<input autocomplete="off" maxlength="<?php echo $len;?>" required type="text" class="form-control ttx" value="<?php echo strtoupper($que);?>" readonly="readonly" placeholder="Enter the word to scramble (<?php echo $len;?> letter)" name="scramble"/>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<p class="colorg let">Predict first scrambled word</p>
<input autocomplete="off" maxlength="<?php echo $len;?>" style="text-transform:uppercase;" required type="text" placeholder="Predict the first scrambled word (<?php echo $len;?> letter)" class="form-control ttx" name="first"/>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<p class="colorp let">Predict second scrambled word</p>
<input autocomplete="off" maxlength="<?php echo $len;?>" style="text-transform:uppercase;" required type="text" class="form-control ttx" placeholder="Predict the first scrambled word (<?php echo $len;?> letter)" name="second"/>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>

</div>

<input type="hidden" name="game_id" value="<?php echo $_SESSION["GAMES_ID"];?>"/>
<input type="hidden" name="gameplayed_id" value="<?php echo $_SESSION["GAMES_TYPE_ID"];?>"/>
<input type="hidden" value="<?php echo sha1(uniqid());?>" name="fullop"/>

<center><button class="btn btn-primary btn-lg" style="width:250px;margin-top:20px;"><i class="fa fa-gamepad"></i> PLAY GAME NOW</button></center>
</form>
		<?php
		}

	$_SESSION["EXAM_STARTED_ALREADY"] = "ok";
}else{
x_print("<p class='hubmsg'>Scramble system is inactive</p>");
}
?>
