<style>
a {
    color: #fff!important;
}
</style>
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/error/style.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/error/backgrounds.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/stylegreen.css" />
<title><?php echo Yii::app()->name ?></title>

<div class="wrapper">
    <div class="mainWrapper">
        <div class="leftHolder">
            <a href="<?php echo Yii::app()->createUrl('/dashboard'); ?>" title="SumHR" class="logo">SumHR</a>
            <div style="font-size:50px; color:#FFFFFF; font-weight:bold; padding-top:13%; margin-right:30px; line-height:130%; text-align:center;">OOPS! YOUR ACCOUNT IS DEACTIVATED<br/>or<br/>SUSPENDED</div> 
        </div>
        <div class="rightHolder">
            <div class="message">
        		<p style="font-size:15px;">
        			This could be due to any of the following reasons:<br/>
            		- Trial period has expired<br/>
            		- Payment is overdue<br/>
            		- Your administrator deactivated or closed down your sumHR account<br/>
				</p>
            </div>
            <div class="robotik">
				<img src="<?php echo Yii::app()->baseUrl; ?>/css/error/images/robotik.png" alt="Oooops....we can’t find that page." title="Oooops....we can’t find that page." id="robot">
			</div>
            <div class="tryToMessage">
				<p class="alert" style="font-size:13px; font-weight:bold; color:#000000; background:yellow; border:1px solid yellow;">
	                If you would like to access your account please contact:<br/><br/>
	                sumHR support team<br/><br/>
	                OR<br/><br/>
	                Your sumHR account Administrator<br/>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- end .wrapper -->
