<?php
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase">
<h3 class="yii"><font style="color:green"><i class="fa fa-money"></i> Earnings From referrals</font></h3>

<?php
 $userme = x_clean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
if(x_count("agent_referral_credit","paidto='$userme' LIMIT 1") > 0){
	$counter = 0;
	?>
	<table class="table table-hover table-bordered">
	<caption class="capp"><i class="fa fa-credit-card"></i> Earnings <font class="colorg">Details</font><span class="badge pull-right"><?php x_print(x_count("agent_referral_credit","paidto='$userme'"));?></span></caption>
	<tr><th>No.</th><th>Earned from</th><th>Amount</th><th>Date</th></tr>
	<?php
	foreach(x_select("0","agent_referral_credit","paidto='$userme'","50","id desc") as $key){
		$counter++;
		$id = $key["id"];$amt = $key["refamount"]; $from = $key["paidfrom"];$date = $key["rpaydate"];

    if(x_count("userdb_bank","email='$from' LIMIT 1") > 0){
foreach(x_select("name,email","userdb_bank","email='$from'","1","id desc") as $key){
$refemail = $key["email"];$refname = $key["name"];
}
    }else{
      $refname = "";
      $refemail = "";
    }

    ?><tr>
		<td><?php x_print($counter);?></td>
    <td><p style='color:purple;'><?php x_print($refname);?></p>
      <p style='color:green;'><?php x_print($refemail);?></p>
    </td>
    <td><?php x_print("NGN ". number_format($amt,2));?></td>
		<td><?php x_print($date);?></td>
		</tr><?php
	}
  $sum = x_sum("refamount","agent_referral_credit","paidto='$userme'");
	?>

  <tr style='color:purple;'>
  <th>TOTAL</th>
  <th></th>
  <th><?php x_print("NGN ". number_format($sum,2));?></th>
  <th></th>
  </tr>
</table><?php
}else{
	x_print("<p style='border:1px dashed green;' class='hubmsg text-center'><i class='fa fa-minus-circle hipe'></i><br/></br>No Earnings yet</p>");
}

?>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>
