<?php 
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase">
<h3 class="yii"><i class="fa fa-gamepad"></i> Games<font style="color:green"> Played </font></h3>

<?php
 $userme = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
if(x_count("games_played","user_id='$userme' LIMIT 1") > 0){
	$counter = 0;
	?>
	<table class="table table-hover table-bordered">
	<caption class="capp"><i class="fa fa-credit-card"></i> Games played <font class="colorg">Details</font><span class="badge pull-right"><?php x_print(x_count("games_played","user_id='$userme'"));?></span></caption>
	<tr><th>No.</th><th>Game ID</th><th>Game </th><th>Plan</th><th>Plan Amt</th><th>Status</th><th>Reward</th><th>Date</th></tr>
	<?php
	foreach(x_select("0","games_played","user_id='$userme'","25","id desc") as $key){
$counter++;
$id = $key["id"];$gid = $key["game_id"];$pamt = $key["plan_amount"];
$plan = $key["plan"];$gtype = $key["gametype"]; $status = $key["status"];
$date = $key["startdate"];$rm = $key["reward_amount"];$uid = $key["user_id"];
		?><tr>
		<td><?php x_print($counter);?></td>
		<td><?php x_print($gid);?></td>
		<td><?php 
		if(x_count("iqgames_type","id='$gtype'") > 0){
			foreach(x_select("type","iqgames_type","id='$gtype'","1","id") as $key){
				$type = x_vert($key["type"],"");
			}
			echo $type;
		}else{
			x_print("<p class='hubmsg'>Invalid Game</p>");
		}
		?></td>
		<td><?php x_print($plan);?></td>
		<td><?php x_print("NGN ". number_format($pamt,2));?></td>
		<td><?php x_print($status);?></td>
		<td><?php x_print("NGN ". number_format($rm,2));?></td>
		<td><?php x_print($date);?></td>
		</tr><?php
	}
	?></table><?php
}else{
	x_print("<p style='border:1px dashed green;' class='hubmsg text-center'><i class='fa fa-gamepad hipe'></i><br/></br>No Games record found<br/><br/></p>");
}

?>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>
