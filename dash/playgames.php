<?php
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<h3 class="yi"><i class="fa fa-gamepad"></i> PLAY <font class="colorg">GAME</font></h3>

<i class="fa fa-gamepad hipe"></i>

</div>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#playdemobase").click(function(){
		$(".playcenter").hide("slow");
		$(".playdemo").show("slow");
	});

	$("#playpaidbase").click(function(){
	$(".playcenter").show("slow");
	$(".playdemo").hide("slow");
	});
});
</script>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 spd">
<button style="width:100%;padding:20px;margin-top:10pt;" id="playdemobase" class="btn btn-primary"><i class="fa fa-gamepad"></i> PLAY DEMO GAME</button>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 spd">
<button class="btn btn-success" id="playpaidbase" style="width:100%;padding:20px;margin-top:10pt;"><i class="fa fa-cc-mastercard"></i> PLAY PAID GAME</button>
</div>
<script type="text/javascript" src="../log.js"></script>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center playcenter">

<form method="POST" id="gameplay">
<p class="banp"><font class="colorg"><i class="fa fa-bicycle"></i> CHOOSE GAME</font> TO PLAY</p>
<select name="gametype" required="required" class="form-control slec">
<option value="">SELECT A GAME ...</option>
<?php
if(x_count("iqgames_type","status='1' LIMIT 1") > 0){
	foreach(x_select("0","iqgames_type","status='1'","5","id") as $key){
		$type = $key["type"];
		$id = $key["id"];
		$timer = $key["timing"];
		?>
		<option value="<?php echo $id;?>"><?php echo strtoupper($type)." GAME";?> ======(<?php echo $timer." Mins.";?>)</option>
		<?php

		}
	}else{

		?>
		<option value="">No Game found!</option>
		<?php

		}

?>
</select>
<p class="banp"><i class="fa fa-credit-card"></i> WALLET TO <font class="colorg">PAY FROM</font></p>
<select name="wallet" required="required" class="form-control slec">
<?php
$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
$playcash = x_sum("play_cash","userdb_bank","id='$userid'");
$wb = x_sum("wallet_balance","userdb_bank","id='$userid'");
$afb = x_sum("wallet_bonus","userdb_bank","id='$userid'");
?>
<option value="">SELECT WALLET  ...</option>
<option value="playcash">PLAY CASH ======= <?php x_print("NGN ".number_format($playcash,2));?></option>
<option value="affiliatebonus">AFFILIATE BONUS === <?php x_print("NGN ".number_format($afb,2));?></option>
<option value="walletbalance">WALLET BALANCE === <?php x_print("NGN ".number_format($wb,2));?></option>

</select>
<input type="hidden" value="<?php echo sha1(uniqid());?>" name="gamebase"/>
<button id="bup" style="margin-top:20pt;" class="btn btn-success"><i class="fa fa-gamepad"></i> PROCEED TO GAME</button>
</form>

<div id="gallery" style="margin-top:10px;"></div>

<p style="font-weight:bold;color:green;margin-top:10pt;">***NOTE : WE ADVICE THAT YOU HAVE GOOD INTERNET.***</p>
</div>

<?php include_once("playdemo.php");?>

</div>

</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>
