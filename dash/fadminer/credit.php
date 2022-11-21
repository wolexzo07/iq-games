<?php include_once("../../finishit.php");?>
<?php include_once("validate.php");?>
<?php include_once("head.php");?>

	<?php include_once("logo.php");?>

	<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

		<h4 class="tutor"><i class="fa fa-credit-card"></i> CREDIT <font class="spart">WALLET</font></h4>


	<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-credit-card"></i> Credit user's wallet </div>
	<div class="panel panel-body">
	<script type="text/javascript" src="log.js"></script>

	<?php
	$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
	//checking permission to credit wallet
	if(x_count("userdata","is_credit='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
	<div style="margin-top:10pt;margin-bottom:10pt;display:none;color:green;font-weight:bold" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>

	<form method="POST" id="creditme">
		<p class="txt">Transaction type: </p>
   <select required="required" id="txp" name="trans" class="form-control slect">
   <option value="credit">Credit user's account...</option>
   <option value="debit">Debit user's account</option>
   </select>

   <p class="txt">Choose wallet: </p>
  <select required="required" id="txp" name="credit" class="form-control slect">
  <option value="">Credit type...</option>
  <option value="wallet_balance">Wallet Balance</option>
 <option value="wallet_bonus">Wallet Bonus</option>
  <option selected value="play_cash">Play Cash</option>
  </select>

  <p class="txt">Email:</p>
  <input type="text" id="txp" placeholder="Enter valid email or mobile number" name="email" class="form-control txtt"/>

  <p class="txt">Amount:</p>
  <input type="number" min="1" max="" id="txp" placeholder="Enter Amount" name="amount" class="form-control txtt"/>
 <input type="hidden" name="tellme" value="<?php echo sha1(uniqid());?>"/>
  <button class="btn btn-success btn-lg fr"><i class="fa fa-credit-card"></i> Credit now</button>
  </form>
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
