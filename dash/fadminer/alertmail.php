<?php
$subject = "$credited_amount WAS CREDITED TO YOUR PLAY CASH WALLET.";

$message = "
<html>
<head>
<title>$credited_amount WAS CREDITED TO YOUR PLAY CASH WALLET.</title>
</head>
<body>
<div style='margin:0%;border:1px solid purple;'>
<div style='height:30px;padding:1%;background-color:purple;color:white'>

</div>
<div style='background-color:white;padding:1%;'>
<center>
<h2 style='text-align:center;display:block;'><img src='https://iqgame.app/image/logome.png' style='width:80px;padding:0px;'/> <br/><font style='color:green;'>iqgames</font>.app</h2></center>
</div>
<div style='padding:20px;'>
Hi <b>$namex ($email)</b>,<br/>Your <b>play cash wallet</b> has been credited with the amount (<b>$credited_amount</b>) that you transferred and your new balance is now <b>$nbalamt</b> .You can get credited instantly with our online payment system.If you have any question regarding this transaction do not hesitate to contact us. Thank you.<br/><b>IQ-GAMES TEAM</b>

<br/><br/>
<style type='text/css'>
.br{
background-color:purple;
padding:10px;
border-radius:7px;

}
.br:hover{
background-color:gold;
padding:10px;
}
a{
color:white;
text-decoration:none;
}
.mail{
text-decoration:none;
color:white;
font-size:13pt;
}

</style>
</p>
</div>
<div style='padding:1%;background-color:purple;color:white'>

<b>From <i>IQ-GAMES TEAM</i> </b><br/>


<font style='color:;font-weight:bold;font;'>Contact our support on:</font><br/>
Email : support@iqgames.app<br/>
Phone : +234(0)8164359148<br/>
</div>
</div>
</body>
</html>
";
/**
if(x_count("mailer","status='1' LIMIT 1") > 0){
**/
	$mailsend =  sendmail($email,$subject,$message);
  if($mailsend==0){

	echo '<h2>There are some issue sending mail.</h2>';
  }
  else{
	#echo '<h2>email sent.</h2>';
  }

	/**}else{


	}**/



						?>
