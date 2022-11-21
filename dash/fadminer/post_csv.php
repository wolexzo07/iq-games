<?php include_once("validate.php");include_once("head.php");?>

	<?php include_once("logo.php");?>



<script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<h4 class="tutor"><i class="fa fa-cloud-upload"></i> CSV <font class="spart">DATA UPLOAD</font></h4>

<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-cloud-upload"></i> Upload questions (.csv)</div>
<div class="panel panel-body">
<script type="text/javascript" src="log.js"></script>

<?php
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
//checking permission to upload csv questions
if(x_count("userdata","is_upload_csv='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
?>
<div style="margin-top:10pt;margin-bottom:10pt;display:none;color:green;font-weight:bold" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>

	<form method="POST" id="uploadiq" autocomplete="off" >
		<p class="txt">Select Databank:</p>
		<select  class="form-control" id="slect" name="databank">
		<option value="questionbank">Live questions</option>
		<option value="questionbank_demo">Demo questions</option>
	</select>

	<p class="txt">Select Categories:</p>
	<select  class="form-control" id="slect" name="cat">
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
	<p class="txt">Upload File (.csv):</p>
	<div class="dressme">
	<input type="file" class="uplo" id="file" name="file"/>
	</div>
	<button type="submit" class="btn btn-primary btn-lg guo"><i class="fa fa-cloud-upload"></i> UPLOAD DATA</button>

	</form>
<?php
}else{
	x_print("<p style='border:0px;color:gray;' class='hubmsg text-center'><i style='font-size:60pt;' class='fa fa-minus-circle'></i><br/><br/> You are not permitted to perform this duty.</p>");
}?>



</div>
</div>



<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-cloud-upload"></i> Upload Scramble Words (.csv)</div>
<div class="panel panel-body">

	<?php
	$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
	//checking permission to upload csv questions
	if(x_count("userdata","is_upload_csv='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>

	<div style="margin-top:10pt;margin-bottom:10pt;display:none;color:green;font-weight:bold" id="gallo"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>

	<form method="POST" id="uploadscrm" autocomplete="off" >
		<p class="txt">Select Databank:</p>
		<select  class="form-control" id="slect" name="databank">
		<option value="question_scramble">Live scramble questions</option>
		<option value="demo_scramble">Demo scramble questions</option>
	</select>

	<p class="txt">Select Categories:</p>
	<select  class="form-control" id="slect" name="cat">
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
	<p class="txt">Upload File (.csv):</p>
	<div class="dressme">
	<input type="file" class="uplo" name="file"/>
	</div>
	<button type="submit" class="btn btn-success btn-lg guo"><i class="fa fa-cloud-upload"></i> UPLOAD DATA</button>

	</form>

	<?php
	}else{
		x_print("<p style='border:0px;color:gray;' class='hubmsg text-center'><i style='font-size:60pt;' class='fa fa-minus-circle'></i><br/><br/> You are not permitted to perform this duty.</p>");
	}?>

</div>
</div>


</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>


<?php include_once("footbase.php");?>
