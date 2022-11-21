<?php
include_once("../../finishit.php");
xstart("0");
if(isset($_POST["playnow"]) && !empty($_POST["playnow"])){
  $planid = xpo("planid");
  $plantype = xpo("plantype");
  $tplay = xpo("tplay");
  $twin = xpo("twin");
  $len = count($planid);

  for($i=0;$i<$len;$i++){
    //echo $planid[$i]."<br/>";
    if(x_count("iqplans","id='$planid[$i]' AND status='1' LIMIT 1") > 0){
      foreach(x_select("total_played,today_played,total_win,today_win","iqplans","id='$planid[$i]' AND status='1'","1","id") as $key){
        $total_played = $key["total_played"];
        $today_played = $key["today_played"];
        $total_win = $key["total_win"];
        $today_win = $key["today_win"];
      }
      $new_one = $total_played + $tplay[$i];
      $new_two = $tplay[$i];
      $new_three = $total_win + $twin[$i];
      $new_four = $twin[$i];

      x_updated("iqplans","id='$planid[$i]' AND status='1'","total_played='$new_one',today_played='$new_two',total_win='$new_three',today_win='$new_four'","Updated at <b># $plantype[$i]</b>","Failed to update #$i");

    }else{
      x_print("No plan found the database!");
    }
  }
finish("trickbase","Update completed");
}else{

}

?>
