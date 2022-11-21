<?php
//include_once("../../finishit.php");
include_once("../../finishit.php");
include_once("validate.php");
if(isset($_POST["tellme"]) && !empty($_POST["tellme"])){

$dept = xp("dept");	$full = xp("full");	$mat = xp("mat");$mobile = xp("mobile");
	$pass = sha1(xp("passkey"));$dated = x_curtime(0,1);
	
		$create = x_dbtab("userdata","
		user_id DOUBLE NOT NULL,
		fullname VARCHAR(200) NOT NULL,
		role ENUM('admin','super') NOT NULL,
		matric_no VARCHAR(100) NOT NULL,
		mobile VARCHAR(50) NOT NULL,
		password TEXT NOT NULL,
		dated_on VARCHAR(200) NOT NULL,
		status ENUM('0','1') NOT NULL
		","MYISAM");
		if($create){
			
			if(x_count("userdata","matric_no='$mat' LIMIT 1") > 0){
			finish("student","User $mat already exist!");
			}else{
			x_insert("password,fullname,role,matric_no,mobile,dated_on,status","userdata","'$pass','$full','$dept','$mat','$mobile','$dated','1'","<script>alert('Admin account created successfully');window.location='student';</script>","<script>alert('Failed to add admin account');window.location='student';</script>");	
				}
			
		}else{
			finish("student","Failed to create test table!");
		}
		
	
	
}else{
	finish("student","Parameter Missing!");
}
?>