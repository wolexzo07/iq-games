<?php
//include_once("../finishit.php");
//getting sharing formula
$ftresult = $arr_a[$random_keys[3]];
$cheatresult = $arr_a[$random_keys[4]];
if(x_count("shformula","id='1' LIMIT 1") > 0){
foreach(x_select("0","shformula","id='1'","1","id") as $key){
$company = $key["company"];$user = $key["users"];$startamount = $key["start_paying_at"];
}
$date = DATE("Y-m-d");
$gettoday_transaction = x_sum("amount","transaction","status='approved' AND paydate LIKE '$date%'");
$usershare = ($user/100)*$gettoday_transaction;
$companyshare = ($company/100)*$gettoday_transaction;
$user_wins = x_sum("reward_amount","games_played","status='won' AND startdate LIKE '$date%'");
//cheat generation started here
if(($gettoday_transaction >= $startamount) && ($user_wins <= $usershare)){
//allow to start winning if condition is meet now
$reward=$reamt;   //must be adapted from plan
$new_investment_amount = $reward + $user_wins ;  // reward is for winners here
//checking to be sure the wins is not more than usershare
if($new_investment_amount > $usershare){
//echo "You finally Failed 2 started";
  if(($a == $fresult) && ($b == $sresult) && ($c == $thresult) && ($d == $ftresult)){
    $ftresult = $arr_a[$random_keys[4]];
  }else{
    $ftresult = $arr_a[$random_keys[3]];
  }
//echo "You finally Failed 2 ended";
}else{
//echo "You finally passed";
$ftresult = $arr_a[$random_keys[3]];

}
}else{
//echo "You finally Failed 1 started";
  if(($a == $fresult) && ($b == $sresult) && ($c == $thresult) && ($d == $ftresult)){
    $ftresult = $arr_a[$random_keys[4]];
  }else{
    $ftresult = $arr_a[$random_keys[3]];
  }
//echo "You finally Failed 1 ended";
}
//cheat generation ended here
}else{
x_print("<p class='hubmsg'>Invalid sharing formula</p>");
exit();
}?>
