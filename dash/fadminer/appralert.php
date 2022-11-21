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
            foreach(x_select("play_cash,email,mobile,name","userdb_bank","id='$user'","1","id desc") as $key){
              $pc = $key["play_cash"];$email = $key["email"];$mobile = $key["mobile"];
              $namex = $key["name"];
            }
            $nbal = $pc + $amt;

            x_update("userdb_bank","id='$user'","play_cash='$nbal'","","Failed to update user balance");

            x_update("alertus","id='$id'","status='1'","","Failed to update alertid");

            //send notifications started
          $credited_amount = "NGN ".number_format($amt,2);
              $nbalamt = "NGN ".number_format($nbal,2);
            $rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");
          x_insert("type,title,email,message,status,rtime,stime","notifyme","'p','<b>$credited_amount</b> WAS CREDITED TO YOUR PLAY CASH WALLET.','$email','<p>Hi <b>$namex</b>,</p>Your <b>play cash wallet</b> has been credited with the amount (<b>$credited_amount</b>) that you transferred and your new balance is now <b>$nbalamt</b> .You can get credited instantly with our online payment system.If you have any question regarding this transaction do not hesitate to contact us. Thank you.<p><b>IQ-GAMES TEAM</b></p> ','0','$rtimen','$stimen'","","Failed to send notification");

          include_once("alertmail.php");

          //send notifications ended

          //capture transaction details started
  x_insert("type,owner,currency,amount,wallet_credited,balance_after,status,paydate,os,br,ip,token","transaction","'offline','$email','NGN','$amt','play cash','$nbal','approved','$time','$os','$br','$ip','$token'","Approved","<p class='hubmsg'>Failed to update</p>");
          //capture transaction details ended


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
