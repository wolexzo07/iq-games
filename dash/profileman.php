<?php 
include_once("validatebase.php");
?>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase">

<h3 class="yi" style="text-transform:"><i class="fa fa-cog"></i><font style="color:green;"> Account </font> Settings<br/><p style="text-transform:;color:purple;letter-spacing:1px;font-size:10pt;margin-top:10pt;">Please fill all the form fields with asterisk below.</p></h3>

<div style="margin-top:20pt;" class="panel panel-default">
<div class="panel-heading"><i class="fa fa-users"></i> Account Update</div>
<div class="panel-body text-center">
	<button onclick="load('bankd')" class="btn btn-primary btn-lg re"><i class="fa fa-bank"></i> Add Bank</button>&nbsp;&nbsp;&nbsp;
	<button onclick="alert('coming soon')" class="btn btn-success btn-lg re"><i class="fa fa-lock"></i> Verify Account</button>
	</div>
	</div>

<div style="margin-top:20pt;" class="panel panel-default">
<div class="panel panel-heading"><i class="fa fa-edit"></i><font style="color:green;"> Update </font> Profile</div>
<div class="panel panel-body">
<script>
function readURL(input){
	var file_size = input.files[0].size / 1024;
	if(file_size > 300){
		
		alert("You can not upload file that exceeds 200kb in size!");
		
		
	}else{

if(input.files && input.files[0]){
var reader = new FileReader();
reader.onload = function (e) {
$('#img_prev').attr('src' , e.target.result);

};
reader.readAsDataURL(input.files[0]);

}	
	
	}


}
function validatesize(file){
	var file_size = file.files[0].size / 1024;
	if(file_size > 200){
		
		alert("File size exceeds 200kb!");
		
	}else{
		
	}
	
}
</script>
<style type="text/css">
.banp{
	margin-top:10pt;margin-bottom:10pt;color:gray;font-style:none;
}
</style>
<script type="text/javascript" src="../log.js"></script>
<form id="updatenow" autocomplete="off" method="POST">

<div class="fomlink">
<p class="banp">Upload photo (Max: 300kb):*</p>

<div class="row">
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

<input type="file"  onchange="readURL(this)" required="required" class="vphoto" name="userphoto" placeholder="Please upload photo"/>

</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<img src="../image/users.png" id="img_prev" class="imglog"/>
</div>
</div>
</div>

<div class="fomlink" style="margin-top:10pt;margin-bottom:10pt;">
<p class="banp">Gender*:&nbsp;&nbsp;
<input type="radio" required="required" name="gen" value="male"/>&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;
<input type="radio" required="required" name="gen" value="female"/>&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;
</p>

</div>


<script type="text/javascript" src="countries.js"></script>

<div class="fomlink">
<p class="banp">Country*:</p>
<select required="" class="form-control slec" onchange="print_state('state',this.selectedIndex);" data-trigger="focus" data-location="top-left" data-title="Please select your country" id="country" name="country"></select>
</div>


<div class="fomlink">
<p class="banp">State*:</p>
<select name="state" required="required" id="state" class="form-control slec" data-trigger="focus" data-location="top-left" data-title="Please select your state of origin"></select>
<script language="javascript">print_country("country");</script>
</div>

<div class="fomlink">

<p class="banp">How did you hear about us*:</p>

<select required="required" class="form-control slec" name="how">
<option value="">Select medium..</option>
<?php
if(x_count("medium","01") > 0){
	foreach(x_select("title","medium","0","0","title") as $key){
		$nam = $key["title"];
		echo "<option value='$nam'>$nam</option>";
		
		}
	
	}else{
		?><option value="">No medium found</option><?php
		}

?>

</select>
</div>

<input type="hidden" name="email" value="<?php echo $_SESSION["IQGAMES_EMAIL_2018_VISION"];?>"/>
						       
<input type="hidden" name="identity_update" value="<?php echo sha1(rand());?>"/>
						       
<input type="submit" value="UPDATE NOW" style="margin-top:20pt;" class="btn btn-primary" id="bup"/>
</form>

<div id="gallery"><img src="image/load.gif"/></div>
</div>

</div>

<h3 class="yi" style="text-transform:"><i class="fa fa-lock"></i><font style="color:green;"> Change </font> Password<br/><p style="text-transform:;color:purple;letter-spacing:1px;font-size:10pt;margin-top:10pt;">Please fill all the form fields with asterisk below.</p></h3>

<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-lock"></i> Change password</div>
<div class="panel-body">

	<script>
	proform("#change_password","change_p","#showus","");
	</script>
<form id="change_password" method="POST">
<p class="banp">Enter Old password*</p>
<input type="password" id="oldp" required="required" placeholder="Enter old password" name="old" class="form-control ttx"/>
<p class="banp">Enter New password*</p>
<input type="password" id="new" required="required" placeholder="Enter new password" name="new" class="form-control ttx"/>
<p class="banp">Confirm New password*</p>
<input type="password" id="new" required="required" placeholder="Confirm new password" name="neww" class="form-control ttx"/>
<input type="hidden" name="name" value="<?php echo 	$_SESSION["IQGAMES_NAME_2018_VISION"];?>"/>
<input type="hidden" name="email" value="<?php echo $_SESSION["IQGAMES_EMAIL_2018_VISION"];?>"/>

<input type="hidden" name="changep" value="<?php echo sha1(rand());?>"/>
						      
<button class="btn btn-success" id="bup"><i class="fa fa-lock"></i> Change now</button>
</form>
<div id="showus"><img src="../image/load.gif"/></div>
	
</div>
</div>


</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>
