<?php include_once("../../finishit.php");?>
<?php include_once("head.php");?>
	<h3 class="tutor"><i class="fa fa-edit"></i> POST <font class="spart">DATA</font></h3></legend>
	<?php include_once("logo.php");?>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<?php
//include("../../finishit.php");
xstart("0");
if(isset($_GET["pid"])){
$pid = xg("pid");

if(x_count("questionbank","id='$pid' LIMIT 1") > 0){

foreach(x_select("0","questionbank","id='$pid'","1","id") as $row){
	$id = $row["id"];
	$cat = $row["category"];
	$q = $row["question"];
	$a = $row["option_a"];
	$b = $row["option_b"];
	$c = $row["option_c"];
	$d = $row["option_d"];
	$e = $row["option_e"];
	$cor = $row["correct_option"];
	$status = $row["status"];
	$timer = $row["timer"];
	
	?>
	<form method="POST" action="processit">
	<input type="hidden" value="<?php echo $pid;?>" name="getitnow"/>
	<p class="txt">Enter Questions:</p>
<textarea  class="form-control tarea" name="q">
<?php echo htmlspecialchars_decode($q);?></textarea>
<p class="txt">Enter Option A:</p>
<textarea  class="form-control tarea" name="a"><?php echo htmlspecialchars_decode($a);?></textarea>
<p class="txt">Enter Option B:</p>
<textarea  class="form-control tarea" name="b"><?php echo htmlspecialchars_decode($b);?></textarea>
<p class="txt">Enter Option C:</p>
<textarea  class="form-control tarea" name="c"><?php echo htmlspecialchars_decode($c);?></textarea>
<p class="txt">Enter Option D:</p>
<textarea  class="form-control tarea" name="d"><?php echo htmlspecialchars_decode($d);?></textarea>
<p class="txt">Enter Option E:</p>
<textarea  class="form-control tarea" name="e"><?php echo htmlspecialchars_decode($e);?></textarea>

<p class="txt">Select Correct option:</p>
<select class="form-control slect" required name="correct">
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
<option value="e">E</option>
</select>
<button type="submit" class="btn btn-primary btn-lg guo"><i class="fa fa-cloud-upload"></i> POST DATA</button>
	</form>
	<?php
	
}	

}else{
	echo "Invalid question";
}

}else{
	echo "Missing parameter";
}
?>

 <?php include_once("footbase.php");?>