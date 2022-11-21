<?php
include_once("../../finishit.php");
include_once("validate.php");

if(isset($_GET["sm"])){

if(isset($_GET['call']) && !empty($_GET['call'])){
$call = xclean($_GET['call']);
$query="select id from games_played WHERE status LIKE '%$call%' order by id desc";
}else{
$query="select id from games_played order by id desc";
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
$query="SELECT * FROM games_played WHERE status LIKE '%$call%' ORDER BY id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}else{
$query="SELECT * FROM games_played ORDER BY id desc
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

	<h4 style="border:1px dashed black;padding:20px;text-transform:uppercase;" class="capp"><i class="fa fa-edit"></i> Winners <font class='coml' style="color:green;">= <?php echo x_count("games_played","status='won'");?></font>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i> Losers <font class='coml' style="color:green;">= <?php echo x_count("games_played","status='lost' OR status=''");?></font></h4>

<?php
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);

//checking permission to view

if(x_count("userdata","is_see_payments='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
<table class="table table-bordered">
<tr style="text-transform:uppercase;">
<th>No.</th>
<th>User</th>
<th>Plan</th>
<th>Plan Amt.</th>
<th>Reward</th>
<th>G.played</th>
<th>Game ID</th>
<th>Status</th>
<th>Timestamp</th>
</tr>
	<?php
	  while($row=mysqli_fetch_array($res))
    {
	$counter++;

	$id = $row["id"];
	$userid = $row["user_id"];
	$gtype = $row["gametype"];
	$plan = $row["plan"];
	$amt = $row["plan_amount"];
	$gid = $row["game_id"];
	$ramt = $row["reward_amount"];
	$status = $row["status"];
	$ts = $row["startdate"];

if($status==""){
  $status = "incomp";
}

  if(x_count("userdb_bank","id='$userid' LIMIT 1") > 0){
foreach(x_select("email,name,mobile","userdb_bank","id='$userid'","1","id") as $key){
  $name = $key["name"];$email = $key["email"];$mobile = $key["mobile"];
}
  }else{
$name = "";$email = "";$mobile = "";
  }


  if(x_count("iqgames_type","id='$gtype' LIMIT 1") > 0){
foreach(x_select("type","iqgames_type","id='$gtype'","1","id") as $key){
  $typer = $key["type"];
}
  }else{
$typer = "";
  }

	?>
<tr>
<th><?php echo $counter;?></th>
<th>
  <p><?php echo $name;?></p>
  <p><?php echo $email;?></p>
  <p><?php echo $mobile;?></p>
</th>
<th><p><?php echo $plan;?></p>
</th>
<th><?php echo "NGN ".number_format($amt,2);?></th>
<th><?php echo "NGN ".number_format($ramt,2);?></th>
<th>
<p><?php echo $typer;?></p>
</th>
<th>
<p><?php echo $gid;?></p>
</th>
<th>
<p><?php echo $status;?></p>
</th>
<th>
<p><?php echo $ts;?></p>
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
$msg .= "<p class='text-center'>No game record was created!</p>";
			echo $msg;

}

echo "<div style='margin-bottom:1%;'></div>";
echo $pagination;
}else{
	echo "No parameter";
}
?>
