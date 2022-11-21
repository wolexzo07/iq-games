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
<div style="margin-top:20pt;" class="panel panel-default">
<div class="panel-heading">
  <h4 style="padding:10px;" class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
    <i class="fa fa-cc-mastercard"></i> &nbsp;&nbsp;ONLINE FUNDING</a>
  </h4>
</div>
<div id="collapse1" class="panel-collapse collapse">
<div class="panel-body">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center wallet">
    <h3 class="yi"><i class="fa fa-cc-mastercard"></i> ONLINE  <font class="colorg">FUNDING</font></h3>
    <i class="fa fa-cc-mastercard hipe"></i>
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

</div>
</div>
</div>



<div class="panel panel-default">
<div class="panel-heading">
  <h4 style="padding:10px;" class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
    <i class="fa fa-bank"></i> &nbsp;&nbsp;BANK TRANSFER </a>
  </h4>
</div>
<div id="collapse2" class="panel-collapse collapse">
<div class="panel-body">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center walletbank">
  <h3 class="yi"><i class="fa fa-bank"></i> BANK  <font class="colorg">TRANSFER</font></h3>
  <i class="fa fa-bank hipe"></i>
  <table class="table table-hover table-bordered">
  <caption class="capp"><!--<i class="fa fa-envelope-o"></i>---><img class="img-responsive" style="width:18px;float:left;" src="../image/whatsapp.png"/> &nbsp;&nbsp;SEND US TRANSFER ALERT <font class="colorg">AFTER PAYMENT</font> </caption>
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
</div>
</div>



<div class="panel panel-default">
<div class="panel-heading">
  <h4 style="padding:10px;" class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
    <i class="glyphicon glyphicon-transfer"></i> &nbsp;&nbsp;SEND TRANSFER ALERT </a>
  </h4>
</div>
<div id="collapse3" class="panel-collapse collapse">
<div class="panel-body">


<h3 class="yi text-center"><i class="glyphicon glyphicon-transfer"></i> BANK TRANSFER  <font class="colorg">ALERT</font><br/>
<small> Use the section to send us alert after making payment to the company bank account.</small>
</h3>
<!--<i class="fa fa-cc-mastercard hipe"></i>-->
<script type="text/javascript" src="../log.js"></script>
<form method="POST"  id="sendalert">
<p class="banp"><i class="fa fa-money"></i> Amount <font class="colorg"> Sent</font></p>
<input type="number" placeholder="Enter Amount Sent" required="required" min="200" max="10000" class="form-control ttx" id="amountmet" name="amount"/>

<p class="banp"><i class="fa fa-bank"></i> Bank Used</p>
<select name="bankname" required="required" id="bankid" class="form-control slec">
<option> Select Bank name .......</option>
<?php require_once("fetch_banks.php");?>
</select>

<p class="banp"><i class="fa fa-credit-card"></i> Account <font class="colorg">Name</font></p>

<input type="text" placeholder="Enter the account name" required="required" class="form-control ttx" id="acctname" name="acctname"/>

<p class="banp"><i class="fa fa-calendar"></i> Transfer<font class="colorg"> Date</font></p>

<input type="date" placeholder="Enter Transfer Date" required="required"  class="form-control ttx" id="transferdate" name="tdate"/>

<input type="hidden" value="<?php echo sha1(uniqid());?>" name="alertus"/>
<button id="bup" style="margin-top:20pt;" class="btn btn-success"><i class="fa fa-bell"></i> SEND ALERT</button>
</form>

<div style="margin-top:10pt;display:none;color:green;font-weight:bold;text-center" id="gallery"><img src="../image/load.gif" class="img-responsive" style="width:80px;"/></div>

</div>
</div>
</div>


<style>
#abilp a:active{
  background-color:transparent;
  text-decoration:none;
  color:black;
  padding:10px;
}
#abilp a:hover{
    background-color:transparent;
  text-decoration:none;
  color:black;padding:10px;

}
  #abilp a:visited{
    background-color:transparent;
  text-decoration:none;
  color:black;padding:10px;
}
#abilp a{
    background-color:transparent;
  text-decoration:none;
  color:black;padding:10px;
}
</style>
