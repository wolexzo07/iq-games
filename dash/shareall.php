<?php
//include_once("../finishit.php");
//$date = DATE("Y-m-d");
//getting sharing formula
if(x_count("shformula","id='1' LIMIT 1") > 0){
foreach(x_select("0","shformula","id='1'","1","id") as $key){
$company = $key["company"];$user = $key["users"];$startamount = $key["start_paying_at"];
}

$gettoday_transaction = x_sum("amount","transaction","status='approved'");
$usershare = ($user/100)*$gettoday_transaction;
$companyshare = ($company/100)*$gettoday_transaction;

$user_wins = x_sum("reward_amount","games_played","status='won'");
$total_wins = x_count("games_played","status='won'");
$total_loser = x_count("games_played","status='lost'");
$total_incomp = x_count("games_played","status=''");
$total_lw = x_count("games_played","0");
$total_investor = x_count("transaction","status='approved'");
?>
<table class="table table-hover table-bordered">
<caption style="border:1px solid lightgray;padding:15px;margin-top:20pt;" class="capp"><i class="fa fa-signal"></i> IQ-GAMES STATISTICS SINCE INCEPTION.</caption>
<tr align="left">
<th>PAYMENT ALLOWED @</th>
<td><?php echo "NGN ".number_format($startamount,2);?></td>
</tr>

<tr align="left">
<th>TOTAL INVESTMENT</th>
<td><?php echo "NGN ".number_format($gettoday_transaction,2);?></td>
</tr>

<tr align="left">
<th>USER SHARE</th>
<td><?php echo "NGN ".number_format($usershare,2);?></td>
</tr>

<tr align="left">
<th>COMPANY SHARE</th>
<td><?php echo "NGN ".number_format($companyshare,2);?></td>
</tr>

<tr align="left">
<th>EXPECTED PAYOUT</th>
<td><?php echo "NGN ".number_format($user_wins,2);?></td>
</tr>

<tr align="left">
<th>EXPECTED LEFTOVER</th>
<td><?php echo "NGN ".number_format(($usershare-$user_wins),2);?></td>
</tr>

<tr align="left">
<th>TOTAL INVESTORS</th>
<td><?php echo $total_investor;?></td>
</tr>

<tr align="left">
<th>TOTAL GAME PLAYED</th>
<td><?php echo $total_lw;?></td>
</tr>

<tr align="left">
<th>TOTAL GAME WON</th>
<td><?php echo $total_wins;?></td>
</tr>

<tr align="left">
<th>TOTAL GAME LOST</th>
<td><?php echo $total_loser;?></td>
</tr>

<tr align="left">
<th>TOTAL INCOMPLETE GAME</th>
<td><?php echo $total_incomp;?></td>
</tr>

</table>
<?php
//getting reward from database
if(x_count("iqplans","status='1'") > 0){
foreach(x_select("reward","iqplans","status='1' AND id='1'","1","id") as $key){
$starter_reward = $key["reward"];
}

foreach(x_select("reward","iqplans","status='1' AND id='2'","1","id") as $key){
$standard_reward = $key["reward"];
}

foreach(x_select("reward","iqplans","status='1' AND id='3'","1","id") as $key){
$premium_reward = $key["reward"];
}

foreach(x_select("reward","iqplans","status='1' AND id='4'","1","id") as $key){
$ultimate_reward = $key["reward"];
}


}else{
  echo "Invalid plan detected";
}
//getting reward from database ended

}else{
x_print("<p class='hubmsg'>Invalid sharing formula</p>");
}

?>
