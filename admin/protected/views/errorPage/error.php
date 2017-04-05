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
        	<!-- <a href="<?php //echo Yii::app()->createUrl('/dashboard'); ?>" title="SumHR" class="logo">SumHR</a> -->
            <div class="errorNumber">404</div> 
        </div>
        <div class="rightHolder">
            <div class="message"><p>Oops! Looks like the page you've landed on doesn't exist any more, or you've typed the wrong URL, or may be your administrator has disabled access to this page.</p></div>
            <div class="robotik"><img src="<?php echo Yii::app()->baseUrl; ?>/css/error/images/robotik.png" alt="Oooops....we can’t find that page." title="Oooops....we can’t find that page." id="robot"></div>
            <div class="tryToMessage">
                
		You can do any of the following now:
                <ul>
                    <li>Visit the <a href="<?php echo Yii::app()->createUrl('/dashboard'); ?>">dashboard</a></li>
                    <li>Contact your HR team or Administrator</li>
                    <!-- <li>Get in touch with our <a href="http://support.sumhr.com"> support team </a></li> -->
                </ul>
            </div>
	</div>

</div>
</div>
<!-- end .wrapper -->
