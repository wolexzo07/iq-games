<?php include_once("../../finishit.php");?>
<?php  include_once("validate.php");include_once("head.php");?>
	
	<?php include_once("logo.php");?>
<h4 class="tutor"><i class="glyphicon glyphicon-check"></i> APPROVED <font class="spart">QUESTIONS</font></h4>
	<script src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
changePagination('0');    
});
function changePagination(pageId){
     $(".flash").show();
     $(".flash").fadeIn(400).html('Loading <img src="../image/load.gif" />');
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "fetchappr?call=<?php if(isset($_GET['call']) && !empty($_GET['call'])){echo $_GET['call'];}else{} ?>&sm=<?php echo md5(rand(123,8929203867));?>",
           data: dataString,
           cache: false,
           success: function(result){
           $(".flash").hide();
                 $("#pageData").html(result);
           }
      });
}
</script>

<div id="pageData"></div>
<span class="flash"></span>
	
  
  <?php include_once("footbase.php");?>