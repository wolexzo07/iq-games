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
category VARCHAR(100) NOT NULL,
questions VARCHAR(100) NOT NULL,
length INT NOT NULL,
status ENUM('0','1') NOT NULL,
timer VARCHAR(200) NOT NULL,
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
  $q = x_clean($emapData[0]);

  if(empty($q)){
x_print("<p class='hubmsg'> You must fill empty fields @ #$counter</p>");
exit();
  }
$len = strlen($q);$q = strtoupper($q);
  if(x_count("$databank","questions='$q' LIMIT 1 ") > 0){
    //x_print("<p class='hubmsg'>Duplication detected in the databank @ #$counter</p>");
    //exit();
    continue;
  }else{
    	x_insert("length,category,questions,status,timer,posted_by","$databank","'$len','$cat','$q','0','$time','$by'","","<p class='hubmsg'>Failed to post question @ #$counter.</p>");
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
