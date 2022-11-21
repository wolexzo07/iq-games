<?php 
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase">
<h3 class="yii"><font style="color:green"><i class="glyphicon glyphicon-bell"></i> Top-ups / Withdrawals</font></h3>

<?php
 $userme = x_clean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
if(x_count("transaction","owner='$userme' LIMIT 1") > 0){
	$counter = 0;
	?>
	<table class="table table-hover table-bordered">
	<caption class="capp"><i class="fa fa-credit-card"></i> Top-up <font class="colorg">Details</font><span class="badge pull-right"><?php x_print(x_count("transaction","owner='$userme'"));?></span></caption>
	<tr><th>No.</th><th>Amount</th><th>Wallet credited</th><th>Balance</th><th>Status</th><th>Date</th></tr>
	<?php
	foreach(x_select("0","transaction","owner='$userme'","25","id desc") as $key){
		$counter++;
		$id = $key["id"];$amt = $key["amount"];$wc = $key["wallet_credited"];
		$ba = $key["balance_after"]; $status = $key["status"];$date = $key["paydate"];
		?><tr>
		<td><?php x_print($counter);?></td>
		<td><?php x_print("NGN ". number_format($amt,2));?></td>
		<td><?php x_print($wc);?></td>
		<td><?php x_print("NGN ". number_format($ba,2));?></td>
		<td><?php x_print($status);?></td>
		<td><?php x_print($date);?></td>
		</tr><?php
	}
	?></table><?php
}else{
	x_print("<p style='border:1px dashed green;' class='hubmsg text-center'><i class='fa fa-money hipe'></i><br/></br>No Top up Transaction found</p>");
}

?>


<?php
if(x_count("withdrawalbase","email='$userme' AND type='withdrawal' LIMIT 1") > 0){
	$counter = 0;
	?>
	<table class="table table-hover table-bordered">
	<caption class="capp"><i class="fa fa-credit-card"></i> Withdrawal <font class="colorg">Details</font><span class="badge pull-right"><?php x_print(x_count("withdrawalbase","email='$userme' AND type='withdrawal'"));?></span></caption>
	<tr><th>No.</th><th>Amount</th><th>Status</th><th>Date</th></tr>
	<?php
	foreach(x_select("0","withdrawalbase","email='$userme' AND type='withdrawal'","25","id desc") as $key){
		$counter++;
		$id = $key["id"];$amt = $key["amount"]; $status = $key["status"];$date = $key["timereal"];
		?><tr>
		<td><?php x_print($counter);?></td>
		<td><?php x_print("NGN ". number_format($amt,2));?></td>
		<!--<td><?php x_print($wc);?></td>
		<td><?php x_print("NGN ". number_format($ba,2));?></td>--->
		<td><?php x_print($status);?></td>
		<td><?php x_print($date);?></td>
		</tr><?php
	}
	?></table><?php
}else{
	x_print("<p style='border:1px dashed green;' class='hubmsg text-center'><i class='fa fa-cc-mastercard hipe'></i><br/></br>No Withdrawal Transaction found</p>");
}

?>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>
