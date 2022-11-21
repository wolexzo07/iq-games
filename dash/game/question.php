
<script type="text/javascript" language="javascript" src="adax.js"></script>
<div class="timeclass" id="timeclasse"></div>

<?php
include_once("../../finishit.php");
xstart("0");
if(x_count("questionbank","status='1'") > 0){
	$rcount = x_count("questionbank","status='1'");
	$rand = mt_rand(0,$rcount - 15);
	$counter = 0;
	foreach(x_select("question,option_a,option_b,option_c,option_d,option_e","questionbank","status='1'","$rand,15","id desc") as $key){
		$counter++;
		$que = $key["question"];$a = $key["option_a"];$b = $key["option_b"];
		$c = $key["option_c"];$d = $key["option_d"];$e = $key["option_e"];
		//$ans = $key["correct_option"];
	?>
	<!---<p><?php echo $counter.". &nbsp;".htmlspecialchars_decode($que);?></p>-->
	<table class="table table-bordered table-hover">
	<tr valign="top"><th><?php echo $counter.". &nbsp;&nbsp;";?></th>
	<td><?php echo htmlspecialchars_decode($que);?></td></tr>
	<tr valign="top"><th></th>
	<td>
	<table class="table table-bordered table-hover">
	<tr>
<td width="80px">A.<input type="radio" name="<?php echo $id;?>ans[]" value="a"/> </td>
<td ><?php echo htmlspecialchars_decode($a);?></td>
</tr>

<tr>
<td width="20px"> B.<input type="radio" name="<?php echo $id;?>ans[]" value="b"/>&nbsp;&nbsp;</td>
<td ><?php echo htmlspecialchars_decode($b);?></td>
</tr>

<tr>
<td width="80px"> C.<input type="radio" name="<?php echo $id;?>ans[]" value="c"/>&nbsp;&nbsp;</td>
<td><?php echo htmlspecialchars_decode($c);?></td>
</tr>

<tr>
<td width="80px"> D.<input type="radio" name="<?php echo $id;?>ans[]" value="d"/>&nbsp;&nbsp;</td>
<td ><?php echo htmlspecialchars_decode($d);?></td>
</tr>

<tr>
<td width="80px">  E.<input type="radio" name="<?php echo $id;?>ans[]" value="e"/>&nbsp;&nbsp;</td>
<td><?php echo htmlspecialchars_decode($e);?></td>
</tr>
	</table>
	</td></tr>
	</table>
	
	<?php
		
	}
}else{
	echo "<p class='hubmsg'>No question found</p>";
}
?>