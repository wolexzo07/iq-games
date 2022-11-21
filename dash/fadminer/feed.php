<?php
include_once("../../finishit.php");
include_once("validate.php");

if(isset($_GET["sm"])){

if(isset($_GET['call']) && !empty($_GET['call'])){
$call = xclean($_GET['call']);
$query="select id from feedback WHERE date_time LIKE '%$call%' order by id desc";
}else{
$query="select id from feedback WHERE status='pending' order by id desc";
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
$query="SELECT * FROM feedback WHERE date_time LIKE '%$call%' ORDER BY id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}else{
$query="SELECT * FROM feedback WHERE status='pending' ORDER BY id desc
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

	<h4 style="border:1px dashed black;padding:20px;text-transform:uppercase;" class="capp"><i class="fa fa-edit"></i> Pending <font class='coml' style="color:green;">= <?php echo x_count("feedback","status='pending'");?></font>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i> Approved <font class='coml' style="color:green;">= <?php echo x_count("feedback","status='treated'");?></font></h4>

<?php
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);

//checking permission to view

if(x_count("userdata","is_post='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
  <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	<?php
	  while($row=mysqli_fetch_array($res))
    {
	$counter++;

	$id = $row["id"];
	$userid = $row["email"];
	$msg = $row["message"];
  $title = $row["subject"];
  $timer = $row["timereal"];

  if(x_count("userdb_bank","email='$userid' LIMIT 1") > 0){
foreach(x_select("email,name,mobile,account_name,bank_name,account_number","userdb_bank","email='$userid'","1","id") as $key){
  $name = $key["name"];$email = $key["email"];$mobile = $key["mobile"];
}
  }else{
$name = "";$email = "";$mobile = "";
}

?>
<div class="panel panel-default">
<div class="panel-heading"><i class='fa fa-pencil'></i> <?php echo htmlspecialchars($title);?><i class='badge' style="float:right;padding:7px;">pending</i></div>
<div class="panel-body">
  <table class="table">
<tr><td><i class="fa fa-user"></i> Userdata</td><th>
  <p><?php echo $name;?></p>
    <p><?php echo $email;?></p>
  <p><?php echo $mobile;?></p>

</th></tr>
<tr><th><i class="fa fa-envelope-o"></i> Message Content Below</th><td></td></tr>
  </table>
  <hr/>
<?php echo htmlspecialchars($msg);?>

<script type="text/javascript">
  $(document).ready(function(e){
  $("#approme<?php echo $id;?>").on('submit',(function(e) {
  $("#msg<?php echo $id;?>").show("slow");
  e.preventDefault();
  $.ajax({
        url: "sendreply",
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
        url: "delfed",
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
<form style="float:left;margin-left:5pt;" id="cancel<?php echo $id;?>">
  <input type="hidden" value="<?php echo $id;?>" name='pid'/>
<button class="btn btn-danger"><i class="fa fa-minus-circle"></i> Delete</button>
</form>
<br/><br/>
<div id="msg<?php echo $id;?>"><img src="../image/load.gif"/></div>
<form style="margin-top:25pt;" id="approme<?php echo $id;?>">
  <textarea class="form-control" name="msgrep"></textarea>
  <input type="hidden" value="<?php echo $id;?>" name='pid'/>
  <input type="hidden" value="<?php echo $email;?>" name='userid'/>
  <input type="hidden" value="<?php echo $title;?>" name='title'/>
<button class="btn btn-warning btn-lg" style="width:100%;margin-top:10pt;"><i class="fa fa-envelope-o"></i> Send Reply</button>
</form>
<style type="text/css">
#msg<?php echo $id;?>{
margin:5pt;
display:none;
color:green;
font-weight:bold;
float:none;
width:100%;
}
  </style>



</div>
</div>
<?php
	}

}else{
	x_print("<p class='hubmsg text-center'><i style='font-size:70pt;' class='fa fa-briefcase'></i><br/>You are not authorized to View.</p>");

}

}
else
{

	$msg = "<p class='text-center' style='font-size:60pt;margin-bottom:10pt;'><span class='fa fa-briefcase'></span></p>";
$msg .= "<p class='text-center'>No message was recieved!</p>";
			echo $msg;

}

echo "<div style='margin-bottom:1%;'></div>";
echo $pagination;
}else{
	echo "No parameter";
}
?>
