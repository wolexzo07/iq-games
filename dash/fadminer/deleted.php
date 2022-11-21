<?php
include("../../finishit.php");
xstart("0");
if(isset($_POST["pid"])){
$pid = xp("pid");

if(x_count("questionbank","id='$pid' LIMIT 1") > 0){
	
x_del("questionbank","id='$pid'","Deleted","Failed to delete");

}else{
	echo "Invalid question";
}

}else{
	echo "Missing parameter";
}
?>