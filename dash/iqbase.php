<?php
  include_once("../finishit.php");

  xstart("0");
  xreq("validation.php");
  xreq("headtop.php");
  xtitle("IQ Games - IQ-Gamer's Page");
  xreq("headbt.php");
  ?>
<div class="container">
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase" style="">
<h4 style="text-align:center;border:1px dashed green;margin-top:10px;margin-bottom:10px;padding:20px;color:red;font-weight:bold;text-transform:uppercase;">*** Do not reload this page. ***</h4>
<script type="text/javascript" src="adax.js"></script>


<?php
if(isset($_GET["gid"]) && !empty($_GET["gid"])){
	$gid = xg("gid");
	$ghash = $gid;
	$gone = md5(sha1(1)).md5(sha1(1));
	$gtwo = md5(sha1(2)).md5(sha1(2));
	$gthree = md5(sha1(3)).md5(sha1(3));
	if($ghash == $gone){
		include_once("questionbash.php");
	}elseif($ghash == $gtwo){
		include_once("scramblebase.php");
	}elseif($ghash == $gthree){
	include_once("testdices.php");
	}else{
		//echo $gone;
		x_print("<p class='hubmsg'>Parameter Modified!</p>");
	}

}else{
	x_print("<p class='hubmsg'>Parameter Tampered!</p>");
}

?>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>

        </div>
<?php xreq("foot.php")?>
