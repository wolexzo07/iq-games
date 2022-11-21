<?php 
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase">
<h3 id="hiderf" class="yi"><i class="fa fa-credit-card"></i> <font style="color:green;">WALLET</font> MANAGER</h3>

<script type="text/javascript" src="../log.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#wfbtn").click(function(){
	$(".cashout").show("slow");	
	$(".topup").hide("slow");	
		});
		
	$("#tubtn").click(function(){
	$(".topup").show("slow");	
	$(".cashout").hide("slow");	
		});
		
		$("#hiderf").click(function(){
	$(".topup").hide("slow");	
	$(".cashout").hide("slow");	
		});
	});
</script>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cashout">
		
		<div class="panel panel-default">
		<div class="panel-heading "><i class="fa fa-credit-card"></i> Make withdrawal <span class="badge pull-right">
		<?php 
		$usero = x_clean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
		echo x_count("withdrawalbase","type='withdrawal' AND email='$usero'");?></span></div>
		<div class="panel-body">
<form id="withdraw" method="POST">
<p class="banp">Enter Amount*</p>
<input type="number" id="amount" maxlength="6" min="2000" max="" required="required" placeholder="Enter amount to withdraw" name="amount" class="form-control ttx"/>
<input type="hidden" name="name" value="<?php echo 	$_SESSION["IQGAMES_NAME_2018_VISION"];?>"/>
<input type="hidden" name="email" value="<?php echo $_SESSION["IQGAMES_EMAIL_2018_VISION"];?>"/>
 <input type="hidden" name="cashout" value="<?php echo sha1(rand());?>"/>
<button class="btn btn-success" id="bup"><i class="fa fa-credit-card"></i> Withdraw Now</button>
</form>
<div id="gallery"><img src="../image/load.gif"/></div>
		
		</div>
		</div>
		
		</div>
		
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 topup">
		
		<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-credit-card"></i> Top-up Wallet Balance <span class="badge pull-right">
		<?php 
		echo x_count("withdrawalbase","type='topup' AND email='$usero'");?></span></div>
		<div class="panel-body">
		<div id="galleryy"><img src="../image/load.gif"/></div>

<!---<form id="topitup" method="POST">
<p class="banp"> Enter Amount* </p>
<input type="number" id="amount" maxlength="6" min="" max="" required="required" placeholder="Enter amount to top-up" name="amount" class="form-control ttx"/>
<input type="hidden" name="name" value="<?php echo 	$_SESSION["IQGAMES_NAME_2018_VISION"];?>"/>
<input type="hidden" name="email" value="<?php echo $_SESSION["IQGAMES_EMAIL_2018_VISION"];?>"/>
      
<input type="hidden" name="topup" value="<?php echo sha1(rand());?>"/>
						      
<button class="btn btn-primary" id="bup"><i class="fa fa-credit-card"></i> Top-up Now</button>
</form>--->

		
		
		</div>
		</div>
		
		</div>
		
		

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<button id="wfbtn" class="btn btn-success tumi"><i class="fa fa-credit-card"></i> Withdraw Funds</button>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<button id="tubtn" onclick="load('walletfunder')" class="btn btn-primary tumi"><i class="fa fa-credit-card"></i> Top up Wallet</button>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
		<div class="boxme13">
			<span class="fa fa-credit-card gl"></span>
			<h1 class="tp">
				<?php 
				echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
				echo number_format(x_sum("wallet_balance","userdb_bank","email='$usero'"),2);
				?>
			</h1>
			<p class="tti">Withdrawable Amount</p>
			</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
				<div class="boxme1">
			<span class="fa fa-money gl"></span>
			<h1 class="tp">
			<?php
			echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
			echo number_format(x_sum("play_cash","userdb_bank","email='$usero'"),2);
			?>
			</h1>
			<p class="ttip">Play Cash Amount</p>
			</div>
			</div>
			
				
		
		<?php include("ads.php");?>
		<!----Transaction FEE PANEL---->
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 trnm">
		<div class="panel panel-default">
		<div class="panel-heading fath"><i class="fa fa-bell"></i> Transactions Fees <span class="badge pull-right">
		<?php 
		echo x_count("topup_withdraw","status='approved'");?></span></div>
		<div class="panel-body fathh">
		<?php
		if(x_count("topup_withdraw","status='approved'") > 0){	
		$counter=0;
		echo "<table class='table table-hover table-striped'>";
		?><tr>
			<th>No</th><th>Transaction Type</th><th>Transaction Fee</th>
			</tr><?php
	foreach(x_select("currency,type,amount,status","topup_withdraw","status='approved'","2","id desc") as $key){
	$counter++;
	$em = $key["currency"];
	$amt = $key["amount"];
	$type = $key["type"];
	$status = $key["status"];

	?>
	<tr>
			<td><?php echo $counter;?></td><td><?php echo $type;?></td><td><?php echo "$em ".number_format($amt,2);?></td>
			</tr>
	<?php
	
	}
	echo "</table>";
	}else{
		echo "<center><i class='fa fa-trash' style='color:lightgray;font-size:60pt;'></i><br/>No transaction fee record found!<br/></center>";
		}
		
		?>
		</div>
		</div>
		
		</div>



</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>
