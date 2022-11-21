<?php 
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase">
<h3 class="yi"><i class="fa fa-bank"></i> Add <font class="colorg">Bank Details</font></h3>
<script src="../js/scriptloaded.js"></script>
<form id="bankForm" autocomplete="off" method="POST">
<p class="banp">Select Your bank*</p>
<select name="bankname" required="required" class="form-control slec">
<option> Select Bank name .......</option>
<?php require_once("fetch_banks.php");?>
            </select>
			<p class="banp">Enter account name*</p>
<input type="text" id="acname" required="required" placeholder="Enter account name" name="acctname" value="<?php echo $_SESSION["IQGAMES_ACN_2018_VISION"];?>" class="form-control ttx">
	<p class="banp">Enter account number*</p>
<input type="text" id="acnumb" maxlength="10" required="required" placeholder="Enter account number" name="acctnum" value="<?php echo $_SESSION["IQGAMES_ACNUMB_2018_VISION"];?>" class="form-control ttx">

<input type="hidden" name="email" value="<?php echo $_SESSION["IQGAMES_EMAIL_2018_VISION"];?>"/>
						       
<input type="hidden" name="bank_update" value="<?php echo sha1(rand());?>"/>
						       
<input type="submit" value="UPDATE" class="btn btn-primary" id="bup"/>
</form>

<div id="gallery"><img src="../image/load.gif"/></div>


<?php
$user = xclean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
if(x_count("userdb_bank","email='$user' AND account_number !='' LIMIT 1") > 0){
	?>
	<h3 class="yi"><i class="fa fa-credit-card"></i> Added <font class="colorg">Bank Details</font></h3>
	<table class="table table-bordered table-hover">
	
	<?php
	foreach(x_select("account_name,account_number,bank_name","userdb_bank","email='$user'","1","id") as $key){
		$bn = $key["bank_name"];$acct = $key["account_name"];
		$acn = $key["account_number"];
		?>
		<tr>
		<th>Bank Name</th>
		<td><?php echo $bn;?></td>
		</tr>
		<tr>
		<th>Account Name</th>
		<td><?php echo $acct;?></td>
		</tr>
		<tr>
		<th>Account Number</th>
		<td><?php echo $acn;?></td>
		</tr>
		<?php
	}
	?></table><?php
}else{
	
}
?>
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>

