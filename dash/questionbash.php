<center>
<img src="../image/iqp.png" style="margin-top:20px;width:120px;" class="img-responsive imgc"/>
</center>
<h3 style="text-align:center;border:1px dashed green;padding:15px;margin-bottom:10pt;font-weight:bold;"><i class="fa fa-book"></i> IQ TEST <font class="colorg">QUESTIONS</font></h3>

<div class="timeclass" id="timeclasse"></div>

<?php
//include_once("../finishit.php");
//xstart("0");
if(!isset($_SESSION['timeer'])){
//detect demo games started
if(isset($_SESSION['GAME_DEMO_KEY'])){
		unset($_SESSION['GAME_DEMO_KEY']);
	}
//detect demo games ended
	finish("manpag","Time expired");
	exit();
}
if(isset($_SESSION["EXAM_STARTED_ALREADY"])){
	unset($_SESSION["EXAM_STARTED_ALREADY"]);
	//detect demo games started
	if(isset($_SESSION['GAME_DEMO_KEY'])){
			unset($_SESSION['GAME_DEMO_KEY']);
		}
	//detect demo games ended
	finish("manpag","You have reloaded this page! Timed out.");
	exit();
}

//detect demo games started
if(isset($_SESSION['GAME_DEMO_KEY'])){
	$countq = x_count("questionbank_demo","status='1'");
	}else{
$countq = x_count("questionbank","status='1'");
	}



if($countq > 0){
	function hashans($value){
		$salt = "AdvsagssnahaamywuwtyGtHuKiOLk415262540983?@#$%";
		return md5(sha1($value).$salt).md5($value);
	}
	?>
	<form method="POST" id="checkans" action="finalize">
	<?php
	//detect demo games started
	if(isset($_SESSION['GAME_DEMO_KEY'])){
		$rcount = x_count("questionbank_demo","status='1'");
		}else{
	$rcount = x_count("questionbank","status='1'");
		}

	$rand = mt_rand(0,$rcount - 15);
	$counter = 0;

	//detect demo games started
	if(isset($_SESSION['GAME_DEMO_KEY'])){
		$qselect = x_select("correct_option,id,question,option_a,option_b,option_c,option_d,option_e","questionbank_demo","status='1'","$rand,15","id desc");
		}else{
	$qselect = x_select("correct_option,id,question,option_a,option_b,option_c,option_d,option_e","questionbank","status='1'","$rand,15","id desc");
		}

	foreach($qselect as $key){
		$counter++;
		$id = $key["id"];
		$que = $key["question"];$a = $key["option_a"];$b = $key["option_b"];
		$c = $key["option_c"];$d = $key["option_d"];$e = $key["option_e"];
		$ans = $key["correct_option"];
	?>
	<input type="hidden" name="sayhi[]" value="<?php echo $id;?>"/>
	<table class="table table-bordered table-hover">
	<tr valign="top"><th width="40px"><?php echo $counter.". &nbsp;&nbsp;";?></th>
	<td><?php echo htmlspecialchars_decode(str_replace("","",$que));?></td></tr>
	<tr valign="top"><th></th>
	<td>
	<table class="table table-striped">
	<!---<tr>
<td width="60px"> </td>
<td ><?php
$arr = array("a","b","c","d","e");
for($i=0;$i<5;$i++){

	if(hashans($arr[$i]) == $ans){

	//echo "<button class='btn btn-success' style='float:left;'><i class='fa fa-check'></i> ANS = ".strtoupper($arr[$i])."</button>";

	}else{

	}
}
;?></td>
</tr>--->
	<tr>
<td width="60px"><input type="radio" name="<?php echo $counter;?>-ans[]" value="a"/> A. </td>
<td ><?php echo htmlspecialchars_decode($a);?></td>
</tr>

<tr>
<td width="60px"><input type="radio" name="<?php echo $counter;?>-ans[]" value="b"/> B.</td>
<td ><?php echo htmlspecialchars_decode($b);?></td>
</tr>

<tr>
<td width="60px"><input type="radio" name="<?php echo $counter;?>-ans[]" value="c"/> C.</td>
<td><?php echo htmlspecialchars_decode($c);?></td>
</tr>

<tr>
<td width="60px"><input type="radio" name="<?php echo $counter;?>-ans[]" value="d"/> D.</td>
<td ><?php echo htmlspecialchars_decode($d);?></td>
</tr>

<tr>
<td width="60px"><input type="radio" name="<?php echo $counter;?>-ans[]" value="e"/>  E.</td>
<td><?php echo htmlspecialchars_decode($e);?></td>
</tr>
	</table>
	</td></tr>
	</table>

	<style type="text/css">
	p{
		color:black;
	}
	</style>

	<?php

	}
	?>
	<input type="hidden" name="game_id" value="<?php echo $_SESSION["GAMES_ID"];?>"/>
	<input type="hidden" name="gameplayed_id" value="<?php echo $_SESSION["GAMES_TYPE_ID"];?>"/>
	<button class="btn btn-success btn-lg"><i class='fa fa-check-circle'></i> Submit</button>
	</form>

	<?php
	$_SESSION["EXAM_STARTED_ALREADY"] = "ok";
}else{
	echo "<p class='hubmsg'>No question found</p>";
}
?>
