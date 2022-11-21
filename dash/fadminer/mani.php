<?php
include_once("validate.php");
include_once("head.php");
?>

	<?php include_once("logo.php");?>


<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<h4 class="tutor"><i class="fa fa-cog"></i> MANIPULATE <font class="spart">DUMMY DATA</font></h4>

<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-cloud-upload"></i> Update statistics</div>
<div class="panel panel-body">
<script type="text/javascript" src="log.js"></script>

<?php
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
//checking permission to upload csv questions
if(x_count("userdata","is_dummy='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
?>
<div style="margin-top:10pt;margin-bottom:10pt;display:none;color:green;font-weight:bold" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>


<?php
if(x_count("iqplans","status='1'") > 0){
	?>
	<form method="POST" action="process_stat" id="updatestat" autocomplete="off" >
			<button style="margin-bottom:10pt;" type="submit" class="btn btn-primary input-lg"><i class="fa fa-signal"></i> UPDATE STATS</button>
			<input type="hidden" name="playnow" value="<?php echo sha1(uniqid());?>"/>
	<table class="table table-striped table-bordered">
		<tr><th>No.</th><th>Plan</th><th>Total Players</th><th>Today Players</th><th>Total Winners</th><th>Today Winners</th></tr>
	<?php
	$counter = 0;
	foreach(x_select("0","iqplans","status='1'","10","id") as $key){
		$counter++;
		$id = $key["id"];
		$type = $key["type"];
		$total_played = $key["total_played"];
		$today_played = $key["today_played"];
		$total_win = $key["total_win"];
		$today_win = $key["today_win"];
		?>
		<tr>
			<td><?php echo $counter;?></td>
			<td><?php echo $type;?></td>
			<td><?php echo $total_played;?></td>
			<td>
				<?php echo $today_played;?>
				<input type="hidden" name="planid[]"  value="<?php echo $id;?>"/>
					<input type="hidden" name="plantype[]"  value="<?php echo $type;?>"/>
				 == <input type="number" min="1" max="" placeholder="Today player" name="tplay[]"  style="width:130px;height:40px;"/>

			</td>
			<td><?php echo $total_win;?></td>
			<td><?php echo $today_win;?>
 == <input type="number" min="1" max="" placeholder="Today win" name="twin[]" style="width:130px;height:40px;"/>
			</td>
		</tr>
		<?php
	}
	?></table></form><?php
}else{

}
?>


<?php
}else{
	x_print("<p style='border:0px;color:gray;' class='hubmsg text-center'><i style='font-size:60pt;' class='fa fa-minus-circle'></i><br/><br/> You are not permitted to perform this duty.</p>");
}?>



</div>
</div>



<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-cloud-upload"></i> Manipulate Testimonies</div>
<div class="panel panel-body">

	<?php
	$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
	//checking permission to upload csv questions
	if(x_count("userdata","is_dummy='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>

	<div style="margin-top:10pt;margin-bottom:10pt;display:none;color:green;font-weight:bold" id="gallo"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>
<form method="POST" action="processtestimo" id="updatetestimony" autocomplete="off" >
	<button type="submit" class="btn btn-success input-lg"><i class="fa fa-upload"></i> UPDATE TESTIMONIAL</button>
	<?php
	if(x_count("dummy_testimonies","01") > 0){
		$counter = 0;
		foreach(x_select("0","dummy_testimonies","0","3","id") as $key){
			$counter++;
			$id = $key["id"];
			$user = $key["username"];
			$msg = $key["msg"];
			?>

<p class="banp" style="margin-top:10pt;margin-bottom:10pt;">Testify name <?php echo $counter;?>:</p>
<input type="text" class="form-control input-lg" value="<?php echo $user;?>" name="user[]"/>
<p class="banp" style="margin-top:10pt;margin-bottom:10pt;">Write testimony <?php echo $counter;?>:</p>
<textarea class="form-control input-lg" style="resize:none" name="msg[]"><?php echo $msg;?></textarea>
<input type="hidden" value="<?php echo $id;?>" name="testid[]"/>
<hr/>
			<?php
		}
		?></form><?php
	}else{

	}
	?>

	<?php
	}else{
		x_print("<p style='border:0px;color:gray;' class='hubmsg text-center'><i style='font-size:60pt;' class='fa fa-minus-circle'></i><br/><br/> You are not permitted to perform this duty.</p>");
	}?>

</div>
</div>


</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>


<?php include_once("footbase.php");?>
