<?php
include_once("../../finishit.php");
xstart("0");
if(isset($_POST["testid"]) && !empty($_POST["testid"])){
  $tid = xpo("testid");
  $msg = xpo("msg");
  $user = xpo("user");

  $len = count($tid);

  for($i=0;$i<$len;$i++){
    //echo $planid[$i]."<br/>";
    if(x_count("dummy_testimonies","id='$tid[$i]' LIMIT 1") > 0){
      foreach(x_select("0","dummy_testimonies","id='$tid[$i]'","1","id") as $key){
        $username = $key["username"];
        $message = $key["msg"];
      }

x_updated("dummy_testimonies","id='$tid[$i]'","username='$user[$i]',msg='$msg[$i]'","Updated at <b># $tid[$i]</b>","Failed to update #$i");

    }else{
      x_print("No plan found the database!");
    }
  }
finish("trickbase","Update completed");
}else{

}

?>
