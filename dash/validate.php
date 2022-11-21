<?php
include_once("../finishit.php");
if(!isset($_SESSION["IQGAMES_EMAIL_2018_VISION"])){
	finish("../","Session expired");
	exit();
	}

?>