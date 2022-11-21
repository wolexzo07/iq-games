<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 upo">
				
			<div style="overflow-x:auto;" class="panel panel-default">
				
			<div class="panel panel-heading" style="text-transform:uppercase;">
				<i class="fa fa-users"></i> Refer someone and earn 
			</div>
			
			<div class="panel panel-body">
			
			<script type="text/javascript">new ClipboardJS('.btn');</script>
			<table class="table table-responsive">
			<tr>
			<td>
			<?php
			include_once("qrlib.php");
			$host = "iqgames.app";
			$tok = $_SESSION["IQGAMES_TOKEN_2018_VISION"];
$refcode = "refcode/".$tok.md5(1).".png";
if(file_exists($refcode)){
echo "";
}else{
 $trk = "https://$host?ref_code=".$tok;
QRcode::png("$trk", "$refcode", "H", 4, 2);
}
			?>
			<img src="<?php echo $refcode;?>" class="qrcod"/><br/>
			<button class="btn btn-primary" id="btn" data-clipboard-text="https://<?php echo $host;?>?ref_code=<?php echo $tok;?>"><i class="fa fa-link"></i> copy link</button>
			</td>
			
			<td><p class='lin'><a href="https://<?php echo $host;?>?ref_code=<?php echo $tok;?>">https://<?php echo $host;?>?ref_code=<?php echo $tok;?></a></p>
			</td>
			
			</tr>
			
			<tr>
			<td> 
			<?php
$refcodee = "refcode/".$tok.md5(2).".png";
if(file_exists($refcodee)){
echo "";
}else{

 $trkk = "https://$host/iqregistration?ref_code=".$tok;
QRcode::png("$trkk", "$refcodee", "H", 4, 2);
}
			?>
			<img src="<?php echo $refcodee;?>" class="qrcod"/><br/>
		<button data-clipboard-text="https://<?php echo $host;?>/iqregistration?ref_code=<?php echo $tok;?>" class="btn btn-success"><i class="fa fa-link"></i> copy link</button>
			</td>
			<td>
			<p class='lin'><a href="https://<?php echo $host;?>/iqregistration?ref_code=<?php echo $tok;?>">https://<?php echo $host;?>/iqregistration?ref_code=<?php echo $tok;?></a></p>
			</td>
			</tr>
			
			</table>
			
			</div>
			</div>
			
			</div>
