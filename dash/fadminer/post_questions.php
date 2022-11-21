<?php include_once("../../finishit.php");?>
<?php include_once("validate.php");?>
<?php include_once("head.php");?>

	<?php include_once("logo.php");?>
<h4 class="tutor"><i class="fa fa-edit"></i> POST <font class="spart">QUESTIONS</font></h4>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<?php
//setting role management
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
if(x_count("userdata","is_post='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
	<form method="POST" class="" action="processnow" autocomplete="off" >
<p class="txt">Select Categories:</p>
<select  class="form-control slect" name="cat">
<option value="">Choose Categories.....</option>
<?php
if(x_count("categories","01") > 0){
	foreach(x_select("id,department","categories","0","50","department") as $key){
		$dp = $key["department"];$id = $key["id"];
		?>
		<option value="<?php echo $id;?>"><?php echo $dp;?></option>
		<?php
	}
}
?>
</select>
<p class="txt">Enter Questions:</p>
<textarea  class="form-control tarea" name="q"></textarea>
<p class="txt">Enter Option A:</p>
<textarea  class="form-control tarea" name="a"></textarea>
<p class="txt">Enter Option B:</p>
<textarea  class="form-control tarea" name="b"></textarea>
<p class="txt">Enter Option C:</p>
<textarea  class="form-control tarea" name="c"></textarea>
<p class="txt">Enter Option D:</p>
<textarea  class="form-control tarea" name="d"></textarea>
<p class="txt">Enter Option E:</p>
<textarea  class="form-control tarea" name="e"></textarea>
<input type="hidden" name="getitnow" value="<?php x_print(sha1(uniqid()));?>"/>
<input type="hidden" name="posted" value="<?php x_print($_SESSION["IQGAMES_MATRIC_2018_VISION"]);?>"/>

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
}else{
x_print("<p class='hubmsg text-center'><i style='font-size:70pt;' class='fa fa-briefcase'></i><br/>You are not authorized to Post.</p>");
}
?>
<?php include_once("footbase.php");?>
