<?php
//confirming that this referred user by agent is credited once started

  // User need to be credited
  x_insert("paidfrom,paidto,refamount,currency,paydate,rpaydate","agent_referral_credit","'$user','$refemail','$agentcredit','NGN','$stimen','$rtimen'","","<p class='hubmsg'>Failed to insert agent referral bonus.</p>");

  //updating referred user's wallet

  x_update("userdb_bank","email='$refemail'","wallet_balance='$agentpayme'","","<p class='hubmsg'>Failed to credit agent wallet balance.</p>");

  // sending notification to referred user

  x_insert("type,title,email,message,status,rtime,stime","notifyme","'p','REFERRAL BONUS OF <b>NGN $agentcredit </b> WAS CREDITED TO YOUR WALLET','$refemail','<p>Hi <b>$refname</b>,</p>Your wallet balance has been credited with referral bonus of <b>NGN $agentcredit</b> for referring <b>$refname ($refemail)</b> to iqgames. This money can be withdrawn <b>(because you are an agent)</b> or used to play game(s) on our platform to earn bigger amount. Thank you.<br/><br/><b>IQ-GAMES TEAM</b> ','0','$rtimen','$stimen'","","Failed to send notification");


// confirming that this referred user by agent is credited once ended
?>
