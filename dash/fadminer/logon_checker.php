<?php include_once("headextra.php");?>
		
<?php include_once("logo.php");?></legend>

<form method="POST" action="prologin" autocomplete="off">
  <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
  
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
   <div class="row">
 
 <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
 
 <p class="txt"><i class="fa fa-user fa-2x"></i>&nbsp;&nbsp; Enter userID.</p>
<input type="text" autocomplete="off"  class="form-control" required="" placeholder="Enter userID." style="height:50px;padding:10px;" name="matric"/>
 
 </div>

 
  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
 
 <p class="txt"><i class="fa fa-lock fa-2x"></i>&nbsp;&nbsp; Enter Password.</p>
<input type="password" style="height:50px;padding:10px;" autocomplete="off" class="form-control" required="" placeholder="Enter password" name="pass"/>
 
 </div>

 </div>

 
 <input type="hidden" name="tellme" value="<?php echo sha1(uniqid());?>"/>
 <button style="height:50px;padding:10px;margin-top:30px;" class="btn btn-success btn-lg fr"><i class="fa fa-sign-in"></i> Sign In</button>
 <p class="footed">&copy; copyright <?php echo DATE("Y");?>.Powered by Xelow-Gc&trade;</p>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
  
  </div>
 

 </form>

 <style>
 .footed{
	 text-align:center;
	 margin-top:20pt;
	 display:none;
 }
 .txt{
	 font-weight:bold;
	 color:green;
 }
 </style>
<?php include_once("footextra.php");?>



