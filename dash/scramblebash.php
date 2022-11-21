<center>
<img src="../image/iqp.png" class="img-responsive imgc"/>
</center>
<h3 style="text-align:center;border:1px dashed green;padding:15px;margin-bottom:10pt;">WORDS <font class="colorg">SCRAMBLER</font></h3>
<div class="timeclass" id="timeclasse"></div>

<?php
if(isset($_SESSION["GAMER_PLAY"])){
	?><p> Game completed successfully!</p><?php
}else{
	?><form method="POST" action="proscramble">
<p class="let">Enter the word to scramble (8 letter)</p>
<input maxlength="8" required type="text" class="form-control ttx" placeholder="Enter the word to scramble (8 letter)" name="scramble"/>
<p class="let">Predict the first scrambled word (8 letter)</p>
<input maxlength="8" required type="text" placeholder="Predict the first scrambled word (8 letter)" class="form-control ttx" name="first"/>
<p class="let">Predict the second scrambled word (8 letter)</p>
<input maxlength="8" required type="text" class="form-control ttx" placeholder="Predict the first scrambled word (8 letter)" name="second"/><br/>
<input type="hidden" value="<?php echo sha1(uniqid());?>" name="fullop"/>
<input type="submit" class="subm" name="upload" value="Play game now"/>
</form><?php
}
?>
<?php
//include_once("../../finishit.php");
/***
if(isset($_SESSION["GAMER_PLAY"])){
	x_print("Game was completed before");
	exit();
}***/
if(isset($_POST["scramble"]) && !empty($_POST["scramble"])){
	include_once("functionscramble.php");
	$word = xp("scramble");$first = xp("first");$second = xp("second");
	
	if((strlen($word) < 8) || (strlen($first) < 8) || (strlen($second) < 8)){
		x_print("Word must not be less than 8-letters");
	}else{
		$array = array("$first","$second");
		$final = scramble($word);
		if(in_array($final,$array)){
			//echo "<p class='dec'><p>";
			?>
			<table class="table table-hover table-striped">
			<caption class="capp">Congratulations! You prediction was correct.</caption>
			<tr>
			<td>Word scrambled</td>
			<th><?php echo $word;?></th>
			</tr>
			<tr>
			<td>First scrambled Prediction</td>
			<th><?php echo $first;?></th>
			</tr>
			<tr>
			<td>Second scrambled Prediction</td>
			<th><?php echo $second;?></th>
			</tr>
			<tr>
			<td>System scrambled result</td>
			<th><?php echo $final;?></th>
			</tr>
			</table>
			<?php
			//$_SESSION["GAMER_PLAY"] = "ok";
		}else{
			//echo "<p class='dec'>Failed! Try again</p>";
			?><table class="table table-hover table-striped">
			<caption class="capp">Failed! Try again</caption>
			<tr>
			<td>Word scrambled</td>
			<th><?php echo $word;?></th>
			</tr>
			<tr>
			<td>First scrambled Prediction</td>
			<th><?php echo $first;?></th>
			</tr>
			<tr>
			<td>Second scrambled Prediction</td>
			<th><?php echo $second;?></th>
			</tr>
			<tr>
			<td>System scrambled result</td>
			<th><?php echo $final;?></th>
			</tr>
			</table><?php
			
			//$_SESSION["GAMER_PLAY"] = "ok";
		}
	}
}

?>

<style type="text/css">
.imgc{
	width:120px;
	margin-top:20px;
}
.let{
	color:purple;
	text-transform:uppercase;
	font-weight:bold;
	text-align:;
}
.subm{
	padding:10px;
	margin-top:10pt;
}
.colorg{
	color:green;
}
.we{
	padding:20px;
	width:600px;
	height:50px;
}
.dec{
	padding:20px;
	border:1px dashed black;
}
</style>
