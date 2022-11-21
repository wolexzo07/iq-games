<?php
session_start();
if(!isset($_SESSION['timeer'])){
		echo "<p style='font-size:10pt;'>Timed out!</p>";
		
	}
	else{
require_once("timtalk.php");
$current = $_SESSION['timeer'] - time();
if(($current > 30) && ($current <= 120)){
?>
<p style='font-size:16pt;display:none;'>less than 2 minutes</p>
<?php
	
	}
	
	if($current < 180){
		
		?>
			<style type="text/css">

		.timeclass{
			color:red;
			font-weight:bold;
			
			}
	</style>
		
		<?php
		
		}
		
if($current <= 0){
	unset($_SESSION['timeer']);
    
	if(isset($_SESSION['EXAM_RESULT_STOPPED'])){
		
	unset($_SESSION['EXAM_RESULT_STOPPED']);
	
	}
	
}else{
		
echo secondsToTime($current);

}

}
?>
