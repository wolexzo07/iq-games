<?php
include_once("../../finishit.php");
include_once("validate.php");

if(isset($_GET["sm"])){

if(isset($_GET['call']) && !empty($_GET['call'])){
$call = xclean($_GET['call']);
$query="select id from alertus WHERE date_time LIKE '%$call%' order by id desc";
}else{
$query="select id from alertus WHERE status='0' order by id desc";
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
$query="SELECT * FROM alertus WHERE date_time LIKE '%$call%' ORDER BY id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}else{
$query="SELECT * FROM alertus WHERE status='0' ORDER BY id desc
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

	<h4 style="border:1px dashed black;padding:20px;text-transform:uppercase;" class="capp"><i class="fa fa-edit"></i> Pending <font class='coml' style="color:green;">= <?php echo x_count("alertus","status='0'");?></font>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i> Approved <font class='coml' style="color:green;">= <?php echo x_count("alertus","status='1'");?></font></h4>

<?php
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);

//checking permission to view

if(x_count("userdata","is_see_payments='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
<table class="table table-bordered">
<tr style="text-transform:uppercase;">
<th>No.</th>
<th>User Data</th>
<th>Tr.From</th>
<th>Amount</th>
<th>Tr.Date</th>
<th>Sub.Date</th>
<th>Action</th>
</tr>
	<?php
	  while($row=mysqli_fetch_array($res))
    {
	$counter++;

	$id = $row["id"];
	$userid = $row["userid"];
	$amt = $row["amount"];
  $bname = $row["bankname"];
  $acctname = $row["acctname"];
  $trdate = $row["transfer_date"];
	$time = $row["timereal"];
	$status = $row["status"];

  if(x_count("userdb_bank","id='$userid' LIMIT 1") > 0){
foreach(x_select("email,name,mobile,account_name,bank_name,account_number","userdb_bank","id='$userid'","1","id") as $key){
  $name = $key["name"];$email = $key["email"];$mobile = $key["mobile"];
}
  }else{
$name = "";$email = "";$mobile = "";
}



	?>
<tr>
<th><?php echo $counter;?></th>
<th>
  <p><?php echo $name;?></p>
  <p><?php echo $email;?></p>
  <p><?php echo $mobile;?></p>
</th>
<th>
  <p style="color:purple;"><?php echo $bname;?></p>
  <p style="color:green;"><?php echo $acctname;?></p>

</th>
<th><?php echo "NGN ".number_format($amt,2);?></th>
<th>
<p><?php echo $trdate;?></p>
</th>
<th>
<p><?php echo $time;?></p>
</th>
<th>
  <script type="text/javascript">
		$(document).ready(function(e){
		$("#approme<?php echo $id;?>").on('submit',(function(e) {
		$("#msg<?php echo $id;?>").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "appralert",
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


  $("#cancel<?php echo $id;?>").on('submit',(function(e) {
  $("#msg<?php echo $id;?>").show("slow");
  e.preventDefault();
  $.ajax({
        url: "cancel_alert",
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

	<form style="float:left;margin-left:5pt;" id="approme<?php echo $id;?>">
		<input type="hidden" value="<?php echo $id;?>" name='pid'/>
    <input type="hidden" value="<?php echo $amt;?>" name='amount'/>
    <input type="hidden" value="<?php echo $userid;?>" name='userid'/>
	<button class="btn btn-warning"><i class="fa fa-check-circle"></i></button>
	</form>

  <form style="float:left;margin-left:5pt;" id="cancel<?php echo $id;?>">
    <input type="hidden" value="<?php echo $id;?>" name='pid'/>
    <input type="hidden" value="<?php echo $amt;?>" name='amount'/>
    <input type="hidden" value="<?php echo $userid;?>" name='userid'/>
  <button class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
  </form>

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

<br/><br/>
<div id="msg<?php echo $id;?>"><img src="../image/load.gif"/></div>
</th>

</tr>
	<?php


	}
	?></table><?php
}else{
	x_print("<p class='hubmsg text-center'><i style='font-size:70pt;' class='fa fa-briefcase'></i><br/>You are not authorized to View.</p>");

}

}
else
{

	$msg = "<p class='text-center' style='font-size:60pt;margin-bottom:10pt;'><span class='fa fa-briefcase'></span></p>";
$msg .= "<p class='text-center'>No offline alert recieved!</p>";
			echo $msg;

}

echo "<div style='margin-bottom:1%;'></div>";
echo $pagination;
}else{
	echo "No parameter";
}
?>
