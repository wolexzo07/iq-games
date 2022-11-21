<?php
include_once("../../finishit.php");
include_once("validate.php");

if(isset($_GET["sm"])){
	
	function hashans($value){
		$salt = "AdvsagssnahaamywuwtyGtHuKiOLk415262540983?@#$%";
		return md5(sha1($value).$salt).md5($value);
	}
	
//$user = xclean($_SESSION["PBNG_EMAIL_2018_VISION"]);
if(isset($_GET['call']) && !empty($_GET['call'])){
$call = xclean($_GET['call']);
$query="select id from questionbank WHERE question LIKE '%$call%' order by id desc";
}else{
$query="select id from questionbank WHERE status='0' order by id desc";
}
$res    = mysqli_query(x_cstring(),$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 20;
$start = ($page-1) * $recordsPerPage;
$adjacents = "2";
    
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;   
$pagination = "";
if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination'>";
        if ($page > 1)
            $pagination.= "<a href=\"#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                         
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href=\"#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
        
        $pagination.= "</div>";       
    }
    
if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{
    $id=$_POST['pageId'];
}
else
{
    $id='0';
}

//$user = xclean($_SESSION["PBNG_EMAIL_2018_VISION"]);

if(isset($_GET['call']) && !empty($_GET['call'])){
$call = xclean($_GET['call']);
$query="SELECT * FROM questionbank WHERE question LIKE '%$call%' ORDER BY id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}else{
$query="SELECT * FROM questionbank WHERE status='0' ORDER BY id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}

//echo $query;
$res    =   mysqli_query(x_cstring(),$query);
$count  =   mysqli_num_rows($res);
$HTML='';
echo $pagination;
if($count > 0)
{
	$counter = 0;
?>

	<h4 style="border:1px dashed black;padding:20px;text-transform:uppercase;" class="capp"><i class="fa fa-edit"></i> Pending <font class='coml' style="color:green;">= <?php echo x_count("questionbank","status='0'");?></font>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i> Approved <font class='coml' style="color:green;">= <?php echo x_count("questionbank","status='1'");?></font></h4>

<?php
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);

//checking permission to view questions

if(x_count("userdata","is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	
	  while($row=mysqli_fetch_array($res))
    {
	$counter++;
	
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

	<div class="">
	
<table class="table table-bordered">
<tr>
<td width="30px"><?php echo $counter;?></td>
<td style="float:;"><?php echo htmlspecialchars_decode($q);?>
<br/>

<table class="table table-bordered">
<caption><i style="float:right;padding:7px;" class="badge"><?php 
if($status == 0){
	echo "Pending";
}elseif($status == 1){
	echo "Approved";
}else{
	echo "No status";
}
?></i></caption>
<tr>
<td width="80px"><input type="radio" name="<?php echo $id;?>ans[]" value="a"/>&nbsp;&nbsp; A.</td>
<td ><?php echo htmlspecialchars_decode($a);?></td>
</tr>

<tr>
<td width="80px"><input type="radio" name="<?php echo $id;?>ans[]" value="b"/>&nbsp;&nbsp; B.</td>
<td ><?php echo htmlspecialchars_decode($b);?></td>
</tr>

<tr>
<td width="80px"><input type="radio" name="<?php echo $id;?>ans[]" value="c"/>&nbsp;&nbsp; C.</td>
<td><?php echo htmlspecialchars_decode($c);?></td>
</tr>

<tr>
<td width="80px"><input type="radio" name="<?php echo $id;?>ans[]" value="d"/>&nbsp;&nbsp; D.</td>
<td ><?php echo htmlspecialchars_decode($d);?></td>
</tr>

<tr>
<td width="80px"> <input type="radio" name="<?php echo $id;?>ans[]" value="e"/>&nbsp;&nbsp; E.</td>
<td><?php echo htmlspecialchars_decode($e);?></td>
</tr>
<tr style="color:green;">
<td width="80px"> <input type="radio" name="<?php echo $id;?>ans[]" value="e"/>&nbsp;&nbsp; <b>ANS.</b></td>
<td><?php 
$arr = array("a","b","c","d","e");
for($i=0;$i<5;$i++){
	
	if(hashans($arr[$i]) == $cor){

	//checking permission to see ans
	
	if(x_count("userdata","is_see_ans='1' AND is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
		echo "<button class='btn btn-success' style='float:left;'><i class='fa fa-check'></i> ANS = ".strtoupper($arr[$i])."</button>";	
	}
	
	}else{
		
	}
	
}
;?>

	<script type="text/javascript">
		$(document).ready(function(e){
		$("#approme<?php echo $id;?>").on('submit',(function(e) {
		$("#msg<?php echo $id;?>").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "approve_q",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#msg<?php echo $id;?>").html(data);

		    },
		  	error: function(){} 	        
	   });
	}));
	
	
			$("#delet<?php echo $id;?>").on('submit',(function(e) {
		$("#msg<?php echo $id;?>").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "deleted",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#msg<?php echo $id;?>").html(data);

		    },
		  	error: function(){} 	        
	   });
	}));
	
	});
	</script>
	<?php
//setting role management
//checking permission to approve

if(x_count("userdata","is_approve='1' AND is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
	<form style="float:left;margin-left:5pt;" id="approme<?php echo $id;?>">
		<input type="hidden" value="<?php echo $id;?>" name='pid'/>
	<button class="btn btn-primary"><i class="glyphicon glyphicon-check"></i>Approve</button>
	</form>
	<?php
}
	?>
	<?php
	
	//checking permission to deleted
	
	if(x_count("userdata","is_delete='1' AND is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
	<form style="float:left;margin-left:5pt;" id="delet<?php echo $id;?>">
		<input type="hidden" value="<?php echo $id;?>" name='pid'/>
	<button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>
	</form>
	<?php
	
	}
	
	?>
	
	
	<?php
	//checking permission to edit
	if(x_count("userdata","is_edit='1' AND is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
		?><a href="editme?pid=<?php echo $id;?>" target="_blank" style="float:left;margin-left:5pt;" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Edit</a><?php
	}
	?>
	
	<style>
	#msg<?php echo $id;?>{
	margin:5pt;
	display:none;
	color:green;
	font-weight:bold;
	float:none;
	width:100%;
}
		</style>
<div id="msg<?php echo $id;?>"><img src="../image/load.gif"/></div>

</td>
</tr>
</table>

</td>
</tr>
</table>

	</div>
	
	<?php

	
	}
	
}else{
	x_print("<p class='hubmsg text-center'><i style='font-size:70pt;' class='fa fa-briefcase'></i><br/>You are not authorized to View posted questions.</p>");

}
  
}
else
{
    
	$msg = "<p class='text-center' style='font-size:60pt;margin-bottom:10pt;'><span class='fa fa-briefcase'></span></p>";
$msg .= "<p class='text-center'>No question was pending!!</p>";
			echo $msg;
	
}

echo "<div style='margin-bottom:1%;'></div>";
echo $pagination;
}else{
	echo "No parameter";
}
?>
