<?php
session_start();
include_once("../../finishit.php");
if(!isset($_SESSION["IQGAMES_MATRIC_2018_VISION"])){
	finish("logon_checker","0");
	exit();
}else{

}
?>
