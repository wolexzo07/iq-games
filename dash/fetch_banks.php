<?php
require_once("../finishit.php");
xstart("0");
if(x_count("banks_info","01") > 0){
	$bn = $_SESSION["IQGAMES_BN_2018_VISION"];
		foreach(x_select("banks","banks_info",0,0,"banks") as $key){
		$bank = $key["banks"];
		if($bn == $bank){
			echo "<option value='$bank' selected='selected'>$bank</option>";
		}else{
			echo "<option value='$bank'>$bank</option>";
		}
		
	}
}
else{
	echo "<option value=''>No bank found</option>";
}
?>