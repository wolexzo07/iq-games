<?php
//include_once("../finishit.php");
$date = DATE("Y-m-d");
//getting sharing formula
if(x_count("shformula","id='1' LIMIT 1") > 0){
foreach(x_select("0","shformula","id='1'","1","id") as $key){
$company = $key["company"];$user = $key["users"];$startamount = $key["start_paying_at"];
}

$gettoday_transaction = x_sum("amount","transaction","status='approved' AND paydate LIKE '$date%'");
$usershare = ($user/100)*$gettoday_transaction;
$companyshare = ($company/100)*$gettoday_transaction;

$user_wins = x_sum("reward_amount","games_played","status='won' AND startdate LIKE '$date%'");
$total_wins = x_count("games_played","status='won' AND startdate LIKE '$date%'");
$total_loser = x_count("games_played","status='lost' AND startdate LIKE '$date%'");
$total_incomp = x_count("games_played","status='' AND startdate LIKE '$date%'");
$total_lw = x_count("games_played","startdate LIKE '$date%'");
$total_investor = x_count("transaction","status='approved' AND paydate LIKE '$date%'");
?>
<table class="table table-hover table-bordered">
<caption style="border:1px solid lightgray;padding:15px;margin-top:20pt;" class="capp"><i class="fa fa-signal"></i> IQ-GAMES TODAY STATISTICS.</caption>
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

//cheat generation started here
//starter output started
if(($gettoday_transaction >= $startamount) && ($user_wins <= $usershare)){
//allow to win now
$reward=$starter_reward ;
$new_investment_amount = $reward + $user_wins ;  // reward is for winners here
//checking to be sure the wins is not more than usershare
if($new_investment_amount > $usershare){
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Starter Players : Failed 2</div>";
}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Starter Players : Passed</div>";
}}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Starter Players : Failed 1</div>";
}
//starter ouput ended

//standard output started
if(($gettoday_transaction >= $startamount) && ($user_wins <= $usershare)){
//allow to win now
$reward=$standard_reward ;
$new_investment_amount = $reward + $user_wins ;  // reward is for winners here
//checking to be sure the wins is not more than usershare
if($new_investment_amount > $usershare){
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Standard Players : Failed 2</div>";
}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Standard Players : Passed</div>";
}}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Standard Players : Failed 1</div>";
}
//standard ouput ended


//Premium output started
if(($gettoday_transaction >= $startamount) && ($user_wins <= $usershare)){
//allow to win now
$reward=$premium_reward;
$new_investment_amount = $reward + $user_wins ;  // reward is for winners here
//checking to be sure the wins is not more than usershare
if($new_investment_amount > $usershare){
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Premium Players : Failed 2</div>";
}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Premium Players : Passed</div>";
}}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Premium Players : Failed 1</div>";
}
//premium ouput ended

//Ultimate output started
if(($gettoday_transaction >= $startamount) && ($user_wins <= $usershare)){
//allow to win now
$reward=$ultimate_reward;
$new_investment_amount = $reward + $user_wins ;  // reward is for winners here
//checking to be sure the wins is not more than usershare
if($new_investment_amount > $usershare){
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Ultimate Players : Failed 2</div>";
}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Ultimate Players : Passed</div>";
}}else{
echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12 tush'><i class='fa fa-signal'></i> Utimate Players : Failed 1</div>";
}
//Ultimate ouput ended

//cheat generation ended here

}else{
  echo "Invalid plan detected";
}
//getting reward from database ended

}else{
x_print("<p class='hubmsg'>Invalid sharing formula</p>");
}

?>
