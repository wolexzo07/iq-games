<?php require_once("validate.php");?>
<nav id="sidebar">
                <div class="sidebar-header">

	<center><img id="imgbase" class="img-responsive imcl" src="<?php
	if(isset($_SESSION["IQGAMES_PHOTO_2018_VISION"])){
		if(!file_exists($_SESSION["IQGAMES_PHOTO_2018_VISION"])){
			echo "../image/avatar.png";
		}else{
			echo $_SESSION["IQGAMES_PHOTO_2018_VISION"];
		}

	}else{
		echo "../image/avatar.png";
	}
	?>"/></center>


                    <h3>
  <?php $userbiz = $_SESSION["IQGAMES_NAME_2018_VISION"];?>
	<button onclick="alert('I am <?php echo $userbiz;?>.')" class="btn btn-primary" style="text-align:left;color:white;background-color:;margin-top:0pt;border:1px solid white;width:100%;font-size:;font-weight:none;">
    <?php
    $uid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
      if(x_count("userdb_bank","is_verified_agent='1' AND id='$uid'") > 0){
        ?><span class="fa fa-check-circle"></span><?php
      }else{
?><span class="glyphicon glyphicon-user"></span><?php
      }
    ?>
						<?php echo substr($_SESSION["IQGAMES_NAME_2018_VISION"] ,0,20);?></button>

<button onclick="" class="btn btn-success" style="text-align:left;margin-top:5pt;border:1px solid white;width:100%;color:white;font-size:;font-weight:none;"><span class="glyphicon glyphicon-check"></span> <?php
$userme = $_SESSION["IQGAMES_EMAIL_2018_VISION"];
if(x_count("userdb_bank","email='$userme' LIMIT 1") > 0){
	foreach(x_select("plan","userdb_bank","email='$userme'","1","id desc") as $key){$plan = $key["plan"];}
	x_print(ucfirst($plan)." Plan");
}else{
	x_print("No Plan");
}
?></button>

<?php
$uid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
  if(x_count("userdb_bank","is_verified_agent='1' AND id='$uid'") > 0){
    ?>
<button onclick="alert('You are now a verified agent.')" class="btn btn-primary" style="text-align:left;margin-top:5pt;border:1px solid white;width:100%;color:white;font-size:;font-weight:none;">
<span class="fa fa-check-circle"></span> verified agent
</button>
    <?php
  }else{
?><?php
  }
?>
                    </h3>
                    <strong style='color:green;'><?php echo x_short($_SESSION["IQGAMES_NAME_2018_VISION"]);?></strong>
                </div>



				<?php

				include_once("studentbase.php");


						?>

            </nav>
