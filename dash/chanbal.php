<?php
include_once("../finishit.php");
xstart("0");
if(isset($_POST["useme"]) && !empty($_POST["useme"]) && isset($_POST["plan"]) && !empty($_POST["plan"])  && isset($_SESSION["IQGAMES_PLAN_2018_VISION"])){
	$user = xpmail("useme");$nplan = xp("plan");
	if(x_count("userdb_bank","email='$user' LIMIT 1") > 0){
		$_SESSION["IQGAMES_PLAN_2018_VISION"] = $nplan;
		x_update("userdb_bank","email='$user'","plan='$nplan'","","Failed to update plan");
		finish("./manpag","Plan updated to $nplan");
	}else{
		finish("./manpag","Invalid user detected");
	}
}
?>