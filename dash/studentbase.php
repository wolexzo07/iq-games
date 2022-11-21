<ul class="list-unstyled components">

					<li class="active">
					  <a href="./manpag">
                            <i class="glyphicon glyphicon-dashboard"></i>
                            Dashboard
                        </a>
					</li>

					<?php
					$uid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
						if(x_count("userdb_bank","is_verified_agent='1' AND id='$uid'") > 0){
							?>	<li>
								  <a href="#" onclick="load('agentearning')">
			                            <i class="fa fa-money"></i>
			                           Earnings
			                        </a>
								</li><?php
						}else{

						}
					?>

			<li>
					  <a href="#" onclick="load('walletfunder')">
                            <i class="fa fa-cc-mastercard"></i>
                             Fund Wallet
                        </a>
					</li>

				<li>
					  <a href="#" onclick="load('playgames')">
                            <i class="fa fa-gamepad"></i>
                             Play Games
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('playedgames')">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Games Played
                        </a>
					</li>
					<li>
					  <a href="#" onclick="load('bankd')">
                            <i class="fa fa-bank"></i>
                            Add Bank Details
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('track_details')">
                            <i class="fa fa-cc-mastercard"></i>
                            Transactions
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('wallet_manager')">
                            <i class="glyphicon glyphicon-credit-card"></i>
                           Wallet Manager
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('developerbase')">
                            <i class="fa fa-github"></i>
                           Developer Tools
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('referral_base')">
                            <i class="fa fa-users"></i>
                          Manage Referrals
                        </a>
					</li>

					<li>
					  <a href="#" onclick="load('faqbase')">
                            <i class="fa fa-question-circle"></i>
                          FAQ
                        </a>
					</li>

						<li>
					  <a href="#" onclick="load('testify')">
                            <i class="glyphicon glyphicon-edit"></i>
                           Testify
                      </a>
					</li>

					<li>
					  <a href="#" onclick="load('contactbase')">
                            <i class="fa fa-envelope-o"></i>
                            Contact us
                        </a>
					</li>

					 <li>
                        <a href="#" onclick="load('notifyme')">
                            <i class="glyphicon glyphicon-bell"></i>
                            Notifications <span class="badge pull-right">
	<?php
	$user = x_clean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
	$cut = x_count("notifyme","type='all' AND status='0' OR type='p' AND email='$user' AND status='0' LIMIT 1");
	echo $cut;
	?></span>
                        </a>
                    </li>

					<li>
					  <a href="#" onclick="load('profileman')">
                            <i class="fa fa-cog"></i>
                           Settings
                        </a>
					</li>



					<li>
                        <a href="../logout">
                            <i class="glyphicon glyphicon-log-out"></i>
                            Logout
                        </a>
                    </li>
                </ul>
