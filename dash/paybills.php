<?php
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase">
<?php
if(x_count("paymentkeys","status='Yes' LIMIT 1") > 0){

$user = x_clean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
$namex = x_clean($_SESSION["IQGAMES_NAME_2018_VISION"]);
$pid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
$ptoken = x_clean($_SESSION["IQGAMES_TOKEN_2018_VISION"]);

foreach(x_select("secretkey,publickey","paymentkeys","status='Yes'","1","id") as $key){

		$sk = $key["secretkey"];
		$pk = $key["publickey"];

		$samt = xg("memy");


			//paystack charge
		if($samt < 2500){
		$charge = (1.6/100)*$samt;
		}else{
			$charge = ((1.6/100)*$samt) + 100;
			}
			//paystack charge ended

			$ramt = ($samt + $charge) * 100 ;

		?>
<h3 style="text-align:center;padding:15px;"><i style="font-size:40pt;" class="fa fa-credit-card"></i><br/><br/>IQ-GAMES <font style="color:green;">PAYMENT </font></h3>

<h4>Hi, <font style="color:green;"><?php echo ucwords(strtolower($_SESSION["IQGAMES_NAME_2018_VISION"]));?></font></h4>

<form>
 <button type="button" class="btn btn-success" style="margin-top:15px;margin-bottom:15px;" onclick="payWithPaystack()"><i class="fa fa-cc-mastercard"></i> &nbsp;Click To Make Payment </button>
</form>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: '<?php echo $pk;?>',
      email: '<?php echo $user;?>',
      amount: <?php echo $ramt;?>,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "<?php echo $namex;?>",
                variable_name: "<?php echo 'iqgames-'.$user;?>",
                value: "<?php echo "Payment by : ".$pid;?>"
            }
         ]
      },
      callback: function(response){
      var rip = response.reference;
	   var un = "verifybill?pid=<?php echo $pid;?>&ptoken=<?php echo $ptoken;?>&uid=<?php echo $user;?>&pamt=<?php echo $samt;?>&ch=<?php echo $charge;?>&reference=" + rip ;
		load(un);
      },
      onClose: function(){

      }
    });
    handler.openIframe();
  }
</script>

<table class="table table-striped table-hover">
	<caption class="clapp"><i class="fa fa-credit-card"></i> PAYMENT BREAKDOWN</caption>
<tr>
<th>Fees Breakdown</th><th>Amount</th>
</tr>

<tr>
<td>Top-up Amount</td><td><?php echo "NGN ".number_format($samt,2);?></td>
</tr>

<tr>
<td>Payment Gateway</td><td><?php echo "NGN ".number_format($charge,2);?></td>
</tr>

<tr>
<th>Total Amount</th><th><?php echo "NGN ".number_format(($ramt/100),2);?></th>
</tr>
</table>
<p class="hubmsg text-center">PLEASE NOTE THAT TOP-UP AMOUNT IS NOT REFUNDABLE. THANK YOU.</p>
<button type="button" class="btn btn-primary" style="margin-top:5px;margin-bottom:5px;" onclick="load('walletfunder')"><i class="fa fa-arrow-left"></i> &nbsp;Previous </button>
		<?php

	}




		}
else{

echo "Payment key deactivated!";

}
?>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>
