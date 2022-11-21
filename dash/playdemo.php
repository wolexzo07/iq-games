<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center playdemo">

<form method="POST" id="gameplayer">
<p class="banp"><font class="colorg"><i class="fa fa-bicycle"></i> CHOOSE  GAME</font> TO PLAY</p>
<select name="gametype" required="required" class="form-control slec">
<option value="">SELECT A GAME ...</option>
<?php
if(x_count("iqgames_type","status='1' LIMIT 1") > 0){
	foreach(x_select("0","iqgames_type","status='1'","5","id") as $key){
		$type = $key["type"];
		$id = $key["id"];
		$timer = $key["timing"];
		?>
		<option value="<?php echo $id;?>"><?php echo strtoupper($type)." GAME";?> ======(<?php echo $timer." Mins.";?>)</option>
		<?php

		}
	}else{

		?>
		<option value="">No Game found!</option>
		<?php

		}

?>
</select>

<input type="hidden" value="<?php echo sha1(uniqid());?>" name="gamebase"/>
<button id="bup" style="margin-top:20pt;" class="btn btn-success"><i class="fa fa-gamepad"></i> PROCEED TO GAME</button>
</form>
<p style="font-weight:bold;color:green;margin-top:10pt;">***NOTE : WE ADVICE THAT YOU HAVE GOOD INTERNET.***</p>
<div id="gallery" style="margin-top:10px;"></div>
</div>
