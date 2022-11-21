<?php
include_once("finishit.php");
xstart("0");
include_once("refcoder.php");

if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	finish("notify/maintenance","Access denied!");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
 <?php include_once("headed.php");?>
</head>
<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bf8f83379ed6453ccaae4f6/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php include_once("navbarbase.php");?>
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-2" data-rv-view="14" style="background-image: url(assets/images/directv-internet-1280x945.jpg);">
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-center mbr-after-navbar">
        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);"></div>
        <div class="mbr-box__container mbr-section__container container">
            <div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-center">
                <div class="row"><div class=" col-sm-8 col-sm-offset-2">
                    <div class="mbr-hero animated fadeInUp">
                        <h1 class="mbr-hero__text">WIN NGN 100,000 IN 3 MINS</h1>
                        <p class="mbr-hero__subtext">Online Gaming platform that rewards you for testing your intelligence Quotient. You can be the next winner.</p>
                    </div>
                    <!--<div class="mbr-buttons btn-inverse mbr-buttons--center"><a class="mbr-buttons__btn btn btn-lg btn-danger animated fadeInUp delay" href="iqlogin">PLAY DEMO GAMES</a> <a class="mbr-buttons__btn btn btn-lg btn-default animated fadeInUp delay" href="iqlogin">TRY PAID GAMES</a></div>--->

<div class="mbr-buttons btn-inverse mbr-buttons--center">
<a class="mbr-buttons__btn btn btn-lg btn-danger animated fadeInUp delay" href="iqregistration">GET STARTED</a>
	<a class="mbr-buttons__btn btn btn-lg btn-default animated fadeInUp delay" href="#workit">HOW IT WORKS</a></div>

                </div></div>
            </div></div>
        </div>
        <div class="mbr-arrow mbr-arrow--floating text-center">
            <div class="mbr-section__container container">
                <a class="mbr-arrow__link" href="#features1-8"><i class="glyphicon glyphicon-menu-down"></i></a>
            </div>
        </div>
    </div>
</section>
<?php
 include_once("ads_setup.php");
?>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="features1-8" data-rv-view="46" style="background-color: rgb(255, 255, 255);">

    <div class="mbr-section__container mbr-section__container--std-top-padding mbr-section__container--sm-bot-padding mbr-section-title container" style="padding-top: 93px;">
        <div class="mbr-header mbr-header--center mbr-header--wysiwyg row">
            <div class="col-sm-8 col-sm-offset-2">

                <h3 class="mbr-header__text">IQ GAMES <font class="tgreen">FEATURES</font></h3>

            </div>
        </div>
    </div>
    <div class="mbr-section__container container">
        <div class="mbr-section__row row">
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><span class="iconbase mbri-devices mbr-iconfont"></span></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">MOBILE FRIENDLY</h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-article mbr-article--wysiwyg">
                        <p>Our platform is built with simplicity and is mobile friendly.</p>
                    </div>
                </div>

            </div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><span class="iconbase mbri-cash mbr-iconfont"></span></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">SMART PAYMENT</h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-article mbr-article--wysiwyg">
                        <p>Payment made easy for all gamers at anytime</p>
                    </div>
                </div>

            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><span class="iconbase mbri-laptop mbr-iconfont "></span></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">24 / 7 SUPPORT</h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-article mbr-article--wysiwyg">
                        <p>You can reach us at anytime for any question.</p>
                    </div>
                </div>

            </div>

            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><span class="iconbase mbri-credit-card mbr-iconfont "></span></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--middle">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">INSTANT WITHDRAWALS</h3>
                    </div>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-article mbr-article--wysiwyg">
                        <p>You can instantly withdrawal all your earnings.</p>
                    </div>
                </div>

            </div>



        </div>
    </div>
</section>
<?php include_once("ads_setup.php");?>
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="pricing-table1-4" data-rv-view="20" style="background-color: rgb(240, 240, 240);">


    <div class="mbr-section__container mbr-section__container--std-top-padding container" style="padding-top: 30px; margin-bottom: 0px;">

	<h3 class="textme">GAMES <font class="tgreen">PAYMENT PLAN</font></h3>

        <div class="row">

            <div class="mbr-plan col-xs-12 mbr-plan--first col-md-3 col-sm-6">
                <div class="mbr-plan__box">
                    <div class="mbr-plan__header">
                        <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">STARTER</h3>
                        </div>
                    </div>
                    <div class="mbr-plan__number">
                        <div class="mbr-number mbr-number--price">
                            <div class="mbr-number__num">
                                <div class="mbr-number__group">
                                    <sup class="mbr-number__left">NGN</sup><span class="mbr-number__value">200</span>
                                </div>
                            </div>
                            <div class="mbr-number__caption">Per Game</div>
                        </div>
                    </div>
                    <div class="mbr-plan__details"><ul><li><strong>Choose</strong> a game to play</li><li><strong>Within 3</strong>&nbsp; minutes</li><li><strong>To win</strong>&nbsp;NGN 4,000</li></ul></div>
                    <div class="mbr-plan__buttons">
                        <div class="mbr-buttons mbr-buttons--center"><a href="iqregistration" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GET STARTED</a></div>
                    </div>
                </div>
            </div>
            <div class="mbr-plan col-xs-12 mbr-plan--success col-md-3 col-sm-6">
                <div class="mbr-plan__box">
                    <div class="mbr-plan__header">
                        <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">STANDARD</h3>
                        </div>
                    </div>
                    <div class="mbr-plan__number">
                        <div class="mbr-number mbr-number--price">
                            <div class="mbr-number__num">
                                <div class="mbr-number__group">
                                    <sup class="mbr-number__left">NGN</sup><span class="mbr-number__value">500</span>
                                </div>
                            </div>
                            <div class="mbr-number__caption">Per Game</div>
                        </div>
                    </div>
                    <div class="mbr-plan__details"><ul><li><strong>Choose</strong> a game to play</li><li><strong>Within 3</strong> minutes</li><li><strong>To win&nbsp;</strong>&nbsp;NGN 10,000</li></ul></div>
                    <div class="mbr-plan__buttons">
                        <div class="mbr-buttons mbr-buttons--center"><a href="iqregistration" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GET STARTED</a></div>
                    </div>
                </div>
            </div>
            <div class="mbr-plan col-xs-12 mbr-plan--danger mbr-plan--favorite col-md-3 col-sm-6">
                <div class="mbr-plan__box">
                    <div class="mbr-plan__header">
                        <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">PREMIUM</h3>
                        </div>
                    </div>
                    <div class="mbr-plan__number">
                        <div class="mbr-number mbr-number--price">
                            <div class="mbr-number__num">
                                <div class="mbr-number__group">
                                    <sup class="mbr-number__left">NGN</sup><span class="mbr-number__value">2000</span>
                                </div>
                            </div>
                            <div class="mbr-number__caption">Per Game</div>
                        </div>
                    </div>
                    <div class="mbr-plan__details"><ul><li><strong>Choose</strong>a game to play</li><li><strong>Within 3</strong> Minutes</li><li><strong>To win</strong>&nbsp;NGN 40,000</li></ul></div>
                    <div class="mbr-plan__buttons">
                        <div class="mbr-buttons mbr-buttons--center"><a href="iqregistration" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GET STARTED</a></div>
                    </div>
                </div>
            </div>
            <div class="mbr-plan col-xs-12 mbr-plan--warning mbr-plan--last col-md-3 col-sm-6">
                <div class="mbr-plan__box">
                    <div class="mbr-plan__header">
                        <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">ULTIMATE</h3>
                        </div>
                    </div>
                    <div class="mbr-plan__number">
                        <div class="mbr-number mbr-number--price">
                            <div class="mbr-number__num">
                                <div class="mbr-number__group">
                                    <sup class="mbr-number__left">NGN</sup><span class="mbr-number__value">5000</span>
                                </div>
                            </div>
                            <div class="mbr-number__caption">per game</div>
                        </div>
                    </div>
                    <div class="mbr-plan__details"><ul><li><strong>Choose</strong> a game to play</li><li><strong>Within 3</strong> Minutes</li><li><strong>To win</strong>&nbsp;NGN 100,000</li></ul></div>
                    <div class="mbr-plan__buttons">
                        <div class="mbr-buttons mbr-buttons--center"><a href="iqregistration" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-default">GET STARTED</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php include_once("ads_setup.php");?>
<section class="mbr-section mbr-section--relative" id="msg-box5-3" data-rv-view="17" style="background-color: rgb(40, 50, 78);">

    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 93px; padding-bottom: 93px;">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6 image-size" style="width: 50%;">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><iframe class="mbr-embedded-video" src="https://www.youtube.com/embed/rT_ZQ-y0NBM?rel=0&amp;amp;showinfo=0&amp;autoplay=0&amp;loop=0" width="1280" height="720" frameborder="0" allowfullscreen></iframe></figure>
                </div>
                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 content-size mbr-section__right">
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">ABOUT IQ GAMES</h3>

                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg"><p>You can learn more about our &nbsp;platform through the video provided and you can also contact us for more details .</p></div>
                    </div>
                    <div class="mbr-section__container">
                        <div class="mbr-buttons mbr-buttons--auto-align btn-inverse"><a class="mbr-buttons__btn btn btn-lg btn-default" href="#">LEARN MORE</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include_once("ads_setup.php");?>
<?php include_once("workit.php");?>
<?php include_once("ads_setup.php");?>
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="testimonials1-7" data-rv-view="34" style="background-color: rgb(255, 255, 255);">
    <div>

        <div class="mbr-section__container mbr-section__container--std-padding container" style="padding-top: 93px; padding-bottom: 93px;">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="mbr-section__header">TESTI<font style="color:green;">MONIALS</font></h2>
                    <ul class="mbr-reviews mbr-reviews--wysiwyg row">
											<?php
											if(x_count("dummy_testimonies","01") > 0){
											  $counter = 0;
											  foreach(x_select("0","dummy_testimonies","0","3","id desc") as $key){
											    $counter++;
											    $id = $key["id"];
											    $user = $key["username"];
											    $msg = $key["msg"];
											    ?>
											    <li class="mbr-reviews__item col-xs-12 col-sm-6 col-md-4">
											        <div class="mbr-reviews__text"><p class="mbr-reviews__p">“<?php echo htmlspecialchars($msg);?>”</p>
																<img src="image/avatar.png" class="img-responsive" style="width:80px;border-radius:50%;-moz-border-radius:50%;-webkit-border-radius:50%;-o-border-radius:50%;-ms-border-radius:50%;"/>
															</div>
											        <div class="mbr-reviews__author mbr-reviews__author--short">
											            <div class="mbr-reviews__author-name"><?php echo $user;?></div>
											            <div class="mbr-reviews__author-bio">User</div>
											        </div>
											    </li>
											    <?php
											  }

											}else{

											}
											?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once("ourstats.php");?>
<?php include_once("ads_setup.php");?>


<?php include_once("footed.php");?>


</body>
</html>
