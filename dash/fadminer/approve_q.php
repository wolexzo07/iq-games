<?php
include("../../finishit.php");
xstart("0");
if(isset($_POST["pid"])){
$pid = xp("pid");

if(x_count("questionbank","id='$pid' LIMIT 1") > 0){
	if(x_count("questionbank","id='$pid' AND status='0' LIMIT 1") > 0){
		x_update("questionbank","id='$pid'","status='1'","0","Failed");
		echo "Approved";
	}else{
		echo "Approved already";	
	}

}else{
	echo "Invalid question";
}

}else{
	echo "Missing parameter";
}
?>