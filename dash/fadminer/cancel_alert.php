<?php
include_once("../../finishit.php");
xstart("0");
if(isset($_POST['pid']) && !empty($_POST['pid']) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
$id = xp("pid");
$amt = xp("amount");
$user = xp("userid");
$os = xos();$ip = xip();$br = xbr();
$token = sha1(uniqid());$time = x_curtime(0,1);
      if(x_count("alertus","id='$id' AND status='0' LIMIT 1") > 0){

          if(x_count("userdb_bank","id='$user' LIMIT 1") > 0){

            x_del("alertus","id='$id' AND status='0'","Deleted","Failed");

          }else{
              x_print("invalid user");
          }

      }else{
        x_print("invalid data");
      }


}else{
  x_print("invalid parameter");
}
?>
