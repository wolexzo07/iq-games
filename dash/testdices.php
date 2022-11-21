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
?>
<div class="row">
<form method="POST" action="dicesprof">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<center><img src="../image/dt.jpg" class="img-responsive" style="width:150px;margin-top:30pt;"/>
<h2 >DICE OUTCOME  <font class="colorg"><b>PREDICTION</b></font></h2>
<hr style="margin-bottom:20pt;"/>

<div class="timeclass" id="timeclasse"></div>

</div>

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<center><img src="../image/dicer.jpg" class="img-responsive" style="width:80px;"/></center>
<h4 class="colorg">DICE <b>A</b></h4>
<p class="colorp">Predict dice A outcome</p>
<input type="number" name="dice_a" placeholder="Predict dice A outcome" maxlength="1" min="1" max="6" class="form-control ttx" />

</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<center><img src="../image/dicer.jpg" class="img-responsive" style="width:80px;"/></center>
<h4 class="colorp">DICE <b>B</b></h4>
<p class="colorg">Predict dice B outcome</p>
<input type="number" name="dice_b" placeholder="Predict dice B outcome" maxlength="1" min="1" max="6" class="form-control ttx" />

</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<center><img src="../image/dicer.jpg" class="img-responsive" style="width:80px;"/></center>
<h4 class="colorg">DICE <b>C</b></h4>

<p class="colorg">Predict dice C outcome</p>
<input type="number" name="dice_c" placeholder="Predict dice C outcome" maxlength="1" min="1" max="6" class="form-control ttx" />


</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<center><img src="../image/dicer.jpg" class="img-responsive" style="width:80px;"/></center>

<h4 class="colorp">DICE <b>D</b></h4>

<p class="colorp">Predict dice D outcome</p>
<input type="number" name="dice_d" placeholder="Predict dice D outcome" maxlength="1" min="1" max="6" class="form-control ttx " />

</div>
<style type="text/css">
p{
	color:;
	font-weight:;
}
</style>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<input type="hidden" name="game_id" value="<?php echo $_SESSION["GAMES_ID"];?>"/>
<input type="hidden" name="gameplayed_id" value="<?php echo $_SESSION["GAMES_TYPE_ID"];?>"/>
<center><button class="btn btn-success btn-lg" style="margin-top:20pt;"><i class="fa fa-gamepad"></i> ROLL DICE NOW</button></center>
</div>

</form>

</div>
<?php
	$_SESSION["EXAM_STARTED_ALREADY"] = "ok";
	?>
