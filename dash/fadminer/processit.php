<?php
include_once("../../finishit.php");
if(isset($_POST["getitnow"]) && !empty($_POST["getitnow"])){
	function hashans($value){
		$salt = "AdvsagssnahaamywuwtyGtHuKiOLk415262540983?@#$%";
		return md5(sha1($value).$salt).md5($value);
	}
	$pid = xp("getitnow");
	$q = xp("q");$a = xp("a");$b = xp("b");
	$c = xp("c");$d = xp("d");$e = xp("e");$correct = hashans(xp("correct"));
	$time= x_curtime(0,1);
	$create = x_dbtab("questionbank","
	category VARCHAR(200) NOT NULL,
	question TEXT NOT NULL,
	option_a TEXT NOT NULL,
	option_b TEXT NOT NULL,
	option_c TEXT NOT NULL,
	option_d TEXT NOT NULL,
	option_e TEXT NOT NULL,
	correct_option TEXT NOT NULL,
	timer VARCHAR(200) NOT NULL,
	status ENUM('0','1') NOT NULL,
	posted_by VARCHAR(200) NOT NULL
	","MYISAM");
	
	if($create){
		if(x_count("questionbank","id='$pid' LIMIT 1 ") > 0){
			
			x_update("questionbank","id='$pid'","question='$q',option_a='$a',option_b='$b',option_c='$c',option_d='$d',option_e='$e',correct_option='$correct'","","<script>alert('Failed to update');window.location='editme?pid=$pid';</script>");
		finish("editme?pid=$pid","Question updated successfully");
		}else{
			
		finish("editme?pid=$pid","Invalid question detected");
		}
		
		
	}else{
		
		finish("editme?pid=$pid","Failed to create table");
	}
	
}

?>