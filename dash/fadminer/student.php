<?php include_once("../../finishit.php");?>
<?php include_once("validate.php");?>
<?php include_once("head.php");?>

	<?php include_once("logo.php");?>



	<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	<h4 class="tutor"><i class="fa fa-plus-circle"></i> ADD <font class="spart">ADMIN</font></h4>
	<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-users"></i> Create new admin</div>
	<div class="panel panel-body">
	<script type="text/javascript" src="log.js"></script>
	<?php
	$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
	//checking permission to add admin
if(x_count("userdata","is_add_admin='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
?>
<form method="POST" action="requestpro">
<p class="txt">Full Name</p>
<input type="text" id="txp" placeholder="Enter fullname" name="full" class="form-control txtt"/>

<p class="txt">Login ID:</p>
<input type="text" id="txp" placeholder="Enter login ID" name="mat" class="form-control txtt"/>

<p class="txt">Password</p>
<input type="password" id="txp" placeholder="Enter password" name="passkey" class="form-control"/>

<p class="txt">Mobile No:</p>
<input type="text" id="txp" placeholder="Enter mobile no" name="mobile" class="form-control"/>

<p class="txt">Select Role: </p>
<select required="required" id="slect" name="dept" class="form-control">
<option value="">Select role...</option>
<option value="admin">Admin Role</option>
<option value="super">Superadmin Role</option>
</select>


<input type="hidden" name="tellme" value="<?php echo sha1(uniqid());?>"/>
<button class="btn btn-success btn-lg fr"><i class="fa fa-user"></i> Add admin</button>
</form>
<?php
}else{
	x_print("<p style='border:0px;color:gray;' class='hubmsg text-center'><i style='font-size:60pt;' class='fa fa-minus-circle'></i><br/><br/> You are not permitted to perform this duty.</p>");
}
?>
	</div>
	</div>

	</div>
	  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
	</div>

 <?php include_once("footbase.php");?>
