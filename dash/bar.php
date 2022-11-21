            <?php require_once("validate.php");?>

		<div id="content">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
						 <button onclick="parent.location='../'" type="button" class="btn btn-success navbar-btn">
                                <i class="glyphicon glyphicon-home"></i>
                                <!---<span>Toggle</span>--->
                                <span></span>
                            </button>

                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i> Menu
                                <!---<span>Toggle</span>--->
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
								 <li class="mb ju"><a href="#"><font class="cashc">PC :</font> <?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 $user = xclean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
								 echo number_format(x_sum("play_cash","userdb_bank","email='$user'"),2);
								 ?> </a></li>
								  <li class="mb ju"><a href="#"><font class="cashd">WB :</font> <?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 echo number_format(x_sum("wallet_balance","userdb_bank","email='$user'"),2);
								 ?> </a></li>
								  <li class="mb ju"><a href="#"><font class="cashc">AFB :</font> <?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 echo number_format(x_sum("wallet_bonus","userdb_bank","email='$user'"),2);
								 ?> </a></li>

                                <li><a href="#" onclick="load('notifyme')">
                                <span class="glyphicon glyphicon-bell"></span>
                                <span class="badge badge-primary"><?php
                              	$user = x_clean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
                              	$cut = x_count("notifyme","type='all' AND status='0' OR type='p' AND email='$user' AND status='0' LIMIT 1");
                              	echo $cut;
                              	?></span>
                                </a></li>
                                <li><a href="../logout"><span class="glyphicon glyphicon-log-out"></span></a></li>

                            </ul>
                        </div>
                    </div>
                </nav>

			<div id="calculate">

			<div class="row firbar">


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

				</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
	<div class="boxme12">
<span class="fa fa-credit-card gl"></span>
			<h1 class="tp"><?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 echo number_format(x_sum("play_cash","userdb_bank","email='$user'"),2);
						?></h1>
			<p class="ttip">PLAY CASH </p>
			</div>
			</div>

	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
				<div class="boxme13">
			<span class="fa fa-money gl"></span>
			<h1 class="tp"><?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 echo number_format(x_sum("wallet_balance","userdb_bank","email='$user'"),2);
								 ?></h1>
			<p class="tti" style="color:purple;">WALLET BALANCE</p>
			</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
			<div class="boxme1">
			<span class="fa fa-gift gl"></span>
			<h1 class="tp"><?php echo $_SESSION["IQGAMES_CUR_2018_VISION"]." ";
								 echo number_format(x_sum("wallet_bonus","userdb_bank","email='$user'"),2);
								 ?></h1>
			<p class="ttip">AFFILIATE BONUS</p>
			</div>
			</div>



				<?php include_once("otherwallet.php");include_once("refdev.php");?>

			</div>

			<table class="table table-striped table-hover table-bordered abil">
			<caption class="capp">PROFILE DETAILS</caption>
			<tr>
			<th><i class="fa fa-briefcase"></i> &nbsp;&nbsp;&nbsp;NAME </th><td><?php echo x_vert($_SESSION["IQGAMES_NAME_2018_VISION"],"");?></td>
			</tr>
			<tr>
			<th><i class="fa fa-signal"></i> &nbsp;&nbsp;&nbsp;PLAN </th><td><?php echo x_vert($_SESSION["IQGAMES_PLAN_2018_VISION"],"");?></td>
			</tr>
			<tr>
			<th><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;EMAIL </th><td><?php echo x_vert($_SESSION["IQGAMES_EMAIL_2018_VISION"],"");?></td>
			</tr>
			<tr>
			<th><i class="fa fa-phone"></i> &nbsp;&nbsp;&nbsp;MOBILE </th><td><?php echo x_vert($_SESSION["IQGAMES_MOBILE_2018_VISION"],"");?></td>
			</tr>

      <tr>
      <th><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;COUNTRY </th><td><?php echo x_vert($_SESSION["IQGAMES_COUNTRY_2018_VISION"],"");?></td>
      </tr>
      <tr>
      <th><i class="fa fa-phone"></i> &nbsp;&nbsp;&nbsp;STATE </th><td><?php echo x_vert($_SESSION["IQGAMES_STATE_2018_VISION"],"");?></td>
      </tr>

      <tr>
      <th><i class="fa fa-laptop"></i> &nbsp;&nbsp;&nbsp;OPERATING SYSTEM </th><td><?php echo x_vert($_SESSION["IQGAMES_OS_2018_VISION"],"");?></td>
      </tr>

      <tr>
      <th><i class="fa fa-edit"></i> &nbsp;&nbsp;&nbsp;BROWSER </th><td><?php echo x_vert($_SESSION["IQGAMES_BR_2018_VISION"],"");?></td>
      </tr>

      <tr>
      <th><i class="fa fa-pencil"></i> &nbsp;&nbsp;&nbsp;IP ADDRESS </th><td><?php echo x_vert($_SESSION["IQGAMES_IP_2018_VISION"],"");?></td>
      </tr>

			<?php
			if($_SESSION["IQGAMES_REF_2018_VISION"] == ""){

			}else{
				?>
				<tr>
			<th><i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp;REF. BY </th><td><?php echo x_vert($_SESSION["IQGAMES_REF_2018_VISION"],"");?></td>
			</tr>
				<?php
			}
			?>


			</table>

			</div>



                <div style="display:none" class="line"></div>


            </div>
