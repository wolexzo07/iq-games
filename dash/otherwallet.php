		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
				<div class="boxme13">
			<span class="fa fa-gamepad gl"></span>
			<h1 class="tp"><?php
			$idd = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
			echo x_count("games_played","user_id='$idd'");
			?></h1>
			<p class="tti" style="color:purple;">GAMES PLAYED</p>
			</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
			<div class="boxme1">
			<span class="fa fa-bank gl"></span>
			<h1 class="tp"><?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 echo number_format(x_sum("amount","transaction","owner='$user' AND status='approved'"),2);
								 ?></h1>
			<p class="ttip">TOTAL DEPOSIT</p>
			</div>
			</div>

	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
				<div class="boxme13">
			<span class="fa fa-cc-mastercard gl"></span>
			<h1 class="tp"><?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 echo number_format(x_sum("amount","withdrawalbase","email='$user' AND status='approved' AND type='withdrawal'"),2);
								 ?></h1>
			<p class="tti" style="color:purple;">TOTAL WITHDRAWAL</p>
			</div>
			</div>

			<?php include_once("fundwalletbase.php");?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 upo">

<div style="overflow-x:auto;" class="panel panel-default">

<div class="panel panel-heading">
	<i class="fa fa-signal"></i> UPGRADE / DOWNGRADE PLAN
</div>

<div class="panel panel-body">
<?php
if(x_count("iqplans","status='1' LIMIT 1") > 0){
	?>

	<div style="display:none;" class="camp">Change Plans</div>
	<form method="POST">
	</form>

	<table class="table table-hover table-striped table-hover abil">
	<caption class="capp">Available Plans</caption>
	<tr>
		<th>Plan</th>
		<th>Amount</th>
		<th>Reward(winners)</th>
		<th>Status</th>
		</tr>
	<?php
	foreach(x_select("type,amount,reward,currency","iqplans","status='1'","10","id") as $key){
		$type = $key["type"]; $amt = $key["amount"]; $rew = $key["reward"];
		$cur = $key["currency"];
		?>
		<tr>
		<td><?php echo $type." Plan";?></td>
		<td><?php echo $cur." ".number_format($amt,2);?></td>
		<td><?php echo $cur." ".number_format($rew,2);?></td>
		<td><?php
		$pan = $_SESSION["IQGAMES_PLAN_2018_VISION"];
		if($type==$pan){
			?>
			<button class="btn btn-danger upbutton"><i class="fa fa-check-circle"></i> Active</button>
			<?php
		}else{
			?>
			<form action="chanbal" onsubmit="" method="POST">
			<input type="hidden" name="plan" value="<?php echo $type;?>"/>
			<input type="hidden" name="useme" value="<?php echo $user;?>"/>
			<button class="btn btn-primary upbutton"><i class="fa fa-minus-circle"></i> Activate</button>
			</form>


			<?php
		}

		?></td>
		</tr>
		<?php
	}?></table><?php
}else{
	x_print("<p class='hubmsg'>No plan found</p>");
}
?>

</div>

</div>
</div>
