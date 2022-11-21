<?php
include("../finishit.php");
xstart("0");
if(!isset($_SESSION["IQGAMES_EMAIL_2018_VISION"])){
	?>
	<center><button class="text-center btn btn-danger btn-lg" onclick="parent.location='../logout'">
	<i style="color:white;"  class="fa fa-warning hipe"></i>
	<br/><br/>
	Session Inactive Detected ! Click to re-login</button></center>
	<?php
	
	exit();
}
?>
