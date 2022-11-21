<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<h3 class="yi"><i class="fa fa-cc-mastercard"></i> FUND <font class="colorg">WALLET</font></h3>
<i class="fa fa-cc-mastercard hipe"></i>
</div>
<script type="text/javascript">
function loader(){
	var reg = document.getElementById("amountme").value;
	if(reg == ""){
		alert("Enter top-up amount");
		return false;
	}else{
		load("paybills?memy="+reg);
		return true;
	}

}
</script>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center wallet">

<form method="POST" onsubmit="return loader()" id="fundwallet">
<p class="banp"><i class="fa fa-credit-card"></i> ENTER <font class="colorg">TOP-UP AMOUNT</font></p>
<input type="number" placeholder="ENTER TOP-UP AMOUNT" required="required" min="200" max="10000" class="form-control ttx" id="amountme" name="amount"/>
<p class="banp"><i class="fa fa-credit-card"></i> CHOOSE WALLET TO <font class="colorg">FUND</font></p>
<select name="type" required="required" class="form-control slec">
<option value="pc">PLAY CASH WALLET</option>
<!--<option value="wb">WALLET BALANCE</option>-->
</select>
<button id="bup" style="margin-top:20pt;" class="btn btn-success"><i class="fa fa-credit-card"></i> PROCEED TO PAYMENT</button>
</form>

</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center walletbank">
<h3 class="yi"><i class="fa fa-bank"></i> BANK  <font class="colorg">TRANSFER</font></h3>
<i class="fa fa-bank hipe"></i>
<table class="table table-hover table-bordered">
<caption class="capp"><!--<i class="fa fa-envelope-o"></i>---><img class="img-responsive" style="width:18px;float:left;" src="../image/whatsapp.png"/> &nbsp;&nbsp;SEND WHATSAPP MESSAGE TO <font class="colorg">+234(0)8052483066</font> AFTER TRANSFER</caption>
<tr align="left">
<th>BANK NAME</th>
<td>ZENITH BANK</td>
</tr>

<tr align="left">
<th>ACCOUNT NAME</th>
<td>XELOW GLOBAL CONCEPT</td>
</tr>

<tr align="left">
<th>ACCOUNT NUMBER</th>
<td>1015341447</td>
</tr>
</table>
</div>

</div>
