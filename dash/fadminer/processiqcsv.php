<?php
include_once("../../finishit.php");
include_once("validate.php");
xstart("0");
if(isset($_POST["databank"]) && isset($_POST["cat"]) && isset($_SESSION["IQGAMES_MATRIC_2018_VISION"])){

  function hashans($value){
		$salt = "AdvsagssnahaamywuwtyGtHuKiOLk415262540983?@#$%";
		return md5(sha1($value).$salt).md5($value);
	}

$databank = xp("databank"); $cat = xp("cat");
$by = x_clean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
$time = x_curtime(0,1);

$create = x_dbtab("$databank","
category VARCHAR(200) NOT NULL,
question TEXT NOT NULL,
option_a TEXT NOT NULL,
option_b TEXT NOT NULL,
option_c TEXT NOT NULL,
option_d TEXT NOT NULL,
option_e TEXT NOT NULL,
correct_option TEXT NOT NULL,
timer VARCHAR(200) NOT NULL,
status ENUM('0','1') NOT NULL,
posted_by VARCHAR(200) NOT NULL
","MYISAM");

if(!$create){
  x_print("<p class='hubmsg'>Failed to create table.</p>");
}

$filename=$_FILES["file"]["tmp_name"];

if($_FILES["file"]["size"] > 0)
{

   $file = fopen($filename, "r");

   $counter = 0;

    while (($emapData = fgetcsv($file, 100000, ",")) !== FALSE)
      {
 $counter++;
 if($counter == 1)
 {continue;}

 foreach( $emapData as $key =>$value )
  { $emapData[$key] = $value;}
  $q = x_clean($emapData[0]); $a = x_clean($emapData[1]); $b = x_clean($emapData[2]);
  $c = x_clean($emapData[3]);$d = x_clean($emapData[4]);$e = x_clean($emapData[5]);
  $correct = x_clean($emapData[6]);

  if(($q == "") || ($a == "") || ($b == "") || ($c == "") || ($d == "") || ($e == "") || ($correct == "")){
x_print("<p class='hubmsg'> You must fill empty fields @ #$counter</p>");
exit();
  }
  //checking for correct option started
  $valid_options = array("a","b","c","d","e");
  if(!in_array($emapData[6] , $valid_options))
  {
    x_print("<p class='hubmsg'> Correct options is not valid. Only (a,b,c,d,e) @ #$counter</p>");
    exit();
  }
  //checking for correct option ended
  $correct = hashans($correct);
  if(x_count("$databank","question='$q' LIMIT 1 ") > 0){
    //x_print("<p class='hubmsg'>Duplication detected in the databank @ #$counter</p>");
    //exit();
    continue;
  }else{
    	x_insert("category,question,option_a,option_b,option_c,option_d,option_e,correct_option,status,timer,posted_by","$databank","'$cat','$q','$a','$b','$c','$d','$e','$correct','0','$time','$by'","","<p class='hubmsg'>Failed to post question @ #$counter.</p>");
  }

}
x_print("<p class='hubmsg'>Question uploaded successfully @ $time.</p>");
}else{
  x_print("<p class='hubmsg'>No data was uploaded</p>");
}

}else{
  x_print("<p class='hubmsg'>Parameter missing</p>");
}
?>
