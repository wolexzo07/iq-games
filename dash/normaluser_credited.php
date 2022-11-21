<?php
//confirming that this referred user is credited once started

if(x_count("referral_credit","paidfrom='$user' AND paidto='$refemail' LIMIT 1") > 0){
    // User already credited
}else{
  // User need to be credited
  x_insert("paidfrom,paidto,refamount,currency,paydate,rpaydate","referral_credit","'$user','$refemail','$refcredit','NGN','$stimen','$rtimen'","","<p class='hubmsg'>Failed to insert referral bonus.</p>");

  //updating referred user's wallet

  x_update("userdb_bank","email='$refemail'","wallet_bonus='$bonus_amount'","","<p class='hubmsg'>Failed to credit wallet bonus.</p>");

  // sending notification to referred user

  x_insert("type,title,email,message,status,rtime,stime","notifyme","'p','REFERRAL BONUS OF <b>NGN $refcredit </b> WAS CREDITED TO YOUR WALLET','$refemail','<p>Hi <b>$refname</b>,</p>Your Affiliate wallet has been credited with referral bonus of <b>NGN $refcredit</b> for referring <b>$refname ($refemail)</b> to iqgames.You can now start playing paid games to earn big. Thank you.<br/><br/><b>CEO</b> IQ-GAMES','0','$rtimen','$stimen'","","Failed to send notification");
}

// confirming that this referred user is credited once ended
?>
