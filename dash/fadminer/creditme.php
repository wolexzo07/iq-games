<?php
include_once("../../finishit.php");
include_once("validate.php");
xstart("0");
if(isset($_POST["credit"]) && isset($_POST["credit"]) && isset($_SESSION["IQGAMES_MATRIC_2018_VISION"])){

$credit = xp("credit"); $amount = xp("amount");
$email = xp("email");$trans = xp("trans");

$by = x_clean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
$time = x_curtime(0,1);
$credited_amount = "NGN ".number_format($amount,2);

if(x_count("userdb_bank","email='$email' OR mobile='$email' LIMIT 1") > 0){
foreach(x_select("wallet_balance,wallet_bonus,play_cash,email,name","userdb_bank","email='$email' OR mobile='$email'","1","id") as $key){
$wb = $key["wallet_balance"];$wbonus = $key["wallet_bonus"];$pc = $key["play_cash"];
$email = $key["email"];$namex = $key["name"];
}

//select transaction type credit/debit started

if($trans == "credit"){

if($credit == "wallet_balance"){
  $nbal = $wb + $amount;
}elseif($credit == "wallet_bonus"){
  $nbal = $wbonus + $amount;
}elseif($credit == "play_cash"){
  $nbal = $pc + $amount;
}else{
  $nbal = $wb + 0;
}


}elseif($trans == "debit"){
  if($credit == "wallet_balance"){
    if($wb > $amount){
        $nbal = $wb - $amount;
    }else{
      x_print("<p class='hubmsg'>Insuffient amount <b>($credited_amount)</b>  detected.</p>");
      exit();
    }

  }elseif($credit == "wallet_bonus"){
    if($wbonus > $amount){
        $nbal = $wbonus - $amount;
    }else{
      x_print("<p class='hubmsg'>Insuffient amount <b>($credited_amount)</b>  detected.</p>");
      exit();
    }

  }elseif($credit == "play_cash"){
    if($pc > $amount){
        $nbal = $pc - $amount;
    }else{
      x_print("<p class='hubmsg'>Insuffient amount <b>($credited_amount)</b>  detected.</p>");
      exit();
    }

  }else{
    $nbal = $wb - 0;
  }
}else{
  x_print("<p class='hubmsg'>Invalid transaction type!</p>");
  exit();
}
//select transaction type credit/debit ended
$os = xos();$ip = xip();$br = xbr();
$token = sha1(uniqid());
$walletname = str_ireplace("_"," ",$credit);

if($trans == "credit"){

  //send user notification started

  $rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");
x_insert("type,title,email,message,status,rtime,stime","notifyme","'p','<b>$credited_amount</b> WAS CREDITED TO YOUR ACCOUNT.','$email','<p>Hi <b>$namex</b>,</p>Your $walletname account has been credited with the amount (<b>$credited_amount</b>).If you have any question regarding this transaction do not hesitate to contact us. Thank you.<p><b>IQ-GAMES TEAM</b></p> ','0','$rtimen','$stimen'","","Failed to send notification");

  //send user notification ended

  if($walletname == "play cash"){
    x_update("userdb_bank","email='$email' OR mobile='$email'","$credit='$nbal'","","<p class='hubmsg'>Failed to update</p>");

    x_insert("type,owner,currency,amount,wallet_credited,balance_after,status,paydate,os,br,ip,token","transaction","'offline','$email','NGN','$amount','$walletname','$nbal','approved','$time','$os','$br','$ip','$token'","<p class='hubmsg'>$credited_amount was credited to <b>$email</b> <b>$walletname wallet</b></p>","<p class='hubmsg'>Failed to update</p>");
  }else{
    //creating credit record started

    x_insert("owner,currency,amount,wallet_debited,balance_after,status,os,br,ip,debit_date,token","credit_transaction","'$email','NGN','$amount','$walletname','$nbal','1','$os','$br','$ip','$rtimen','$token'","","Failed to insert debit record.");

    //creating credit record ended
  x_updated("userdb_bank","email='$email' OR mobile='$email'","$credit='$nbal'","$credited_amount was credited to <b>$email</b> <b>$walletname account</b>","Failed to update");
  }

}else{
  //send user notification started

  $rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");
x_insert("type,title,email,message,status,rtime,stime","notifyme","'p','$credited_amount WAS DEBITED FROM YOUR ACCOUNT.','$email','<p>Hi <b>$namex</b>,</p>Your $walletname account has been debited with the amount (<b>$credited_amount</b>).If you have any question regarding this transaction do not hesitate to contact us. Thank you.<p><b>IQ-GAMES TEAM</b></p> ','0','$rtimen','$stimen'","","Failed to send notification");

  //send user notification ended

//creating debit record started

x_insert("owner,currency,amount,wallet_debited,balance_after,status,os,br,ip,debit_date,token","debit_transaction","'$email','NGN','$amount','$walletname','$nbal','1','$os','$br','$ip','$rtimen','$token'","","Failed to insert debit record.");

//creating debit record ended

  x_updated("userdb_bank","email='$email' OR mobile='$email'","$credit='$nbal'","$credited_amount was debited from <b>$email</b> <b>$walletname wallet</b>","Failed to update");
}



}else{
  x_print("<p class='hubmsg'>Invalid user account!</p>");
}

}else{
  x_print("<p class='hubmsg'>Parameter missing</p>");
}
?>
