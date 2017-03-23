<?php
    ob_start();
    require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="description" content="Modular kitchen and bathroom accessories. All kinds of kitchen accessories, Bathroom fittings, Office Furniture & Fitting ">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title><?php echo $pgTitle; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <link rel="stylesheet" type="text/css" href="assets/gallery/css/default.css" />
        <link rel="stylesheet" type="text/css" href="assets/gallery/css/component.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="assets/css/jquery_notification.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="assets/css/validationEngine.jquery.css" media="screen" />

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery_notification.js"></script>
        <script src="assets/js/jquery.validationEngine-en.js"></script>
        <script src="assets/js/jquery.validationEngine.js"></script>
        <script src="assets/gallery/js/modernizr.custom.js"></script>
        <script src="assets/js/script.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    <div id="loader-overlay"><img src="assets/images/loader.gif" alt="Loading" /></div>
        <?php
            $strGetUrl = '';
            $strFixedUrl = '';
            $arrUrlData = end(explode('/',$_SERVER['REQUEST_URI']));
            $strGetUrl = current(explode('.',$arrUrlData));

            if( empty($strGetUrl)){
                $strGetUrl = 'index';   
            }
            if( $strGetUrl == 'index'){
        ?>
        <div class="container-fluid ">
            <?php include_once('header-top-slider.php') ?>
        </div>
        <?php } ?>
        <div class="container-fluid">
            <?php 
                if($strGetUrl != 'index'){
                    $strFixedUrl = 'fixed';
                }
            ?>
            <div class="menubar <?php echo $strFixedUrl ?>">
                <?php include_once('header-menu.php') ?>
            </div>