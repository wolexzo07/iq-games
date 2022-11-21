<?php include_once("validate.php");?>
<?php include_once("head.php");?>
<?php include_once("logo.php");?>

	<h4 class="tutor"><i class="fa fa-bank"></i> IQ <font class="spart">GAMES CPANEL</font></h4>


<div class="row">
<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 boxbase text-center">
<h3 class="pull-left"><?php echo "Balance : <font style='color:green;font-weight:bold'>".$_SESSION["IQGAMES_WTYPE_2018_VISION"]." ".number_format($_SESSION["IQGAMES_WALLET_2018_VISION"],2);?></font></h3>
<table class="table">
<tr>
<td><img src="<?php
if($_SESSION["IQGAMES_PHOTO_2018_VISION"] == ""){
	echo "img/logo.png";
}else{
	echo $_SESSION["IQGAMES_PHOTO_2018_VISION"];
}
?>" class="img-responsive loh"/>
<button class="btn btn-success" style="float:left;margin-left:20pt;margin-top:10pt;"><i class="fa fa-signal"></i> <?php echo $_SESSION["IQGAMES_DEPT_2018_VISION"]." User";?></button>

</td>
<!--<td>
</td>-->

</tr>

<tr>
<td>
<table class="table table-hover table-bordered table-striped">
<tr align="left">
<th>Name</th><td><?php echo $_SESSION["IQGAMES_NAME_2018_VISION"];?></td>
</tr>
<tr align="left">
<th>Mobile</th><td><?php echo $_SESSION["IQGAMES_MOBILE_2018_VISION"];?></td>
</tr>
<tr align="left">
<th>UserID</th><td style="color:red;"><b><?php echo $_SESSION["IQGAMES_MATRIC_2018_VISION"];?></b></td>
</tr>
</table>

</td>
</tr>
</table>

</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<button class="text-center btn btn-primary btn-lg" style="width:100%;text-transform:uppercase;"><i class="fa fa-cog"></i> cPanel MaNaGeR</button>
</div>

<div onclick="parent.location='post_questions'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="glyphicon glyphicon-edit"></i></p>
<p class="fontmenu btn btn-success "> NEW POST</p>
</div>

<div onclick="parent.location='post_csv'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="glyphicon glyphicon-cloud-upload"></i></p>
<p class="fontmenu btn btn-primary ">CSV POSTING</p>
</div>

<div onclick="parent.location='approve'" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 boxbase text-center">
<p class="iconmenu"><i class="glyphicon glyphicon-tasks"></i></p>
<p class="fontmenu btn btn-info ">PENDING <i class="badge"><?php echo x_count("questionbank","status='0'");?></i></p>
</div>

<div onclick="parent.location='approvedbase'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="glyphicon glyphicon-check"></i></p>
<p class="fontmenu btn btn-danger ">APPROVED  <i class="badge"><?php echo x_count("questionbank","status='1'");?></i></p>
</div>







<div onclick="parent.location='student'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-user"></i></p>
<p class="fontmenu btn btn-warning "> ADD USERS </p>
</div>



<div onclick="parent.location='credit'" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 boxbase text-center">
<p class="iconmenu"><i class="fa fa-credit-card"></i></p>
<p class="fontmenu btn btn-primary "> CREDIT WALLET </p>
</div>

<div onclick="parent.location='regist'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-users"></i></p>
<p class="fontmenu btn btn-warning "> REGISTERED  <i class="badge"><?php echo x_count("userdb_bank","status='0' OR status='1'");?></i></p>
</div>

<div onclick="parent.location='feedme'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-inbox"></i></p>
<p class="fontmenu btn btn-info "> FEEDBACK <i class="badge"><?php echo x_count("feedback","status='pending'");?></i></p>
</div>



<div onclick="parent.location='plose'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-minus-circle"></i></p>
<p class="fontmenu btn btn-warning "> LOSERS <i class="badge"><?php echo x_count("games_played","status='lost' OR status=''");?></i></p>
</div>



<div onclick="parent.location='payments_made'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-signal"></i></p>
<p class="fontmenu btn btn-primary "> PAYMENTS <i class="badge"><?php echo x_count("transaction","status='approved'");?></i></p>
</div>

<div onclick="parent.location='played'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-gamepad"></i></p>
<p class="fontmenu btn btn-warning "> GAMES PLAYED  <i class="badge"><?php echo x_count("games_played","status='lost' or status='won' or status=''");?></i></p>
</div>

<div onclick="parent.location='pwon'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-plus-circle"></i></p>
<p class="fontmenu btn btn-info "> WINNERS <i class="badge"><?php echo x_count("games_played","status='won'");?></i></p>
</div>

<div onclick="parent.location='with'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-credit-card"></i></p>
<p class="fontmenu btn btn-info "> WITHDRAWALS <i class="badge"><?php echo x_count("withdrawalbase","status='pending'");?></i></p>
</div>

<div onclick="parent.location='payout'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-money"></i></p>
<p class="fontmenu btn btn-success "> PAYOUTS <i class="badge"><?php echo x_count("withdrawalbase","status='approved'");?></i></p>
</div>

<div onclick="parent.location='settings'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-cog"></i></p>
<p class="fontmenu btn btn-info "> SETTINGS <i class="badge"><?php echo x_count("withdrawalbase","status='pending'");?></i></p>
</div>

<div onclick="parent.location='trickbase'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-trash"></i></p>
<p class="fontmenu btn btn-primary "> TRICKBASE <i class="badge"><?php echo x_count("withdrawalbase","status='approved'");?></i></p>
</div>

<div onclick="parent.location='offlinealert'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-bell"></i></p>
<p class="fontmenu btn btn-info"> OFFLINE ALERT <i class="badge"><?php echo x_count("alertus","status='0'");?></i></p>
</div>

<div onclick="parent.location='treated'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-check-circle"></i></p>
<p class="fontmenu btn btn-success"> TREATED ALERT <i class="badge"><?php echo x_count("alertus","status='1'");?></i></p>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<button class="text-center btn btn-success btn-lg" style="width:100%;text-transform:uppercase;"><i class="fa fa-signal"></i> Server Statistics</button>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<?php include_once("../share.php");?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<?php include_once("../shareall.php");?>
</div>

</div>

<?php include_once("footbase.php");?>
