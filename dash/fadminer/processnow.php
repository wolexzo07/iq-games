<?php
include_once("../../finishit.php");
if(isset($_POST["getitnow"]) && !empty($_POST["getitnow"])){
	function hashans($value){
		$salt = "AdvsagssnahaamywuwtyGtHuKiOLk415262540983?@#$%";
		return md5(sha1($value).$salt).md5($value);
	}
	$cat = xp("cat");$q = xp("q");$a = xp("a");$b = xp("b");
	$c = xp("c");$d = xp("d");$e = xp("e");$by = xp("posted");$correct = hashans(xp("correct"));
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
		if(x_count("questionbank","question='$q' LIMIT 1 ") > 0){
			finish("post_questions","Duplication detected in the databank");
		}else{
			
	x_insert("category,question,option_a,option_b,option_c,option_d,option_e,correct_option,status,timer,posted_by","questionbank","'$cat','$q','$a','$b','$c','$d','$e','$correct','0','$time','$by'","<script>alert('Question uploaded successfully');window.location='post_questions';</script>","<script>alert('Failed to upload');window.location='post_questions';</script>");
		
		}
		
		
	}else{
		
		finish("post_questions","Failed to create table");
	}
	
}

?>