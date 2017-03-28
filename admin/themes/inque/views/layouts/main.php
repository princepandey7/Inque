<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/build/css/custom.css" rel="stylesheet">
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/jquery.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="nav-md">
  <div id="loader-overlay"><img src="<?php echo Yii::app()->baseUrl ?>/images/loader.gif" alt="Loading" /></div>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              	<a href="<?php echo Yii::app()->baseUrl ?>/dashboard" class="site_title"><i class="fa fa-paw"></i> <span>Inque</span></a>
            </div>

            <div class="clearfix"></div>

            <div class="profile clearfix">
              	<div class="profile_pic">
                	<img src="<?php echo Yii::app()->baseUrl ?>/images/img.jpg" alt="..." class="img-circle profile_img">
              	</div>
              	<div class="profile_info">
                	<span>Welcome,</span>
                	<h2><?php echo Users::getFullName(); ?></h2>
              	</div>
            </div>
            <br />

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              	<div class="menu_section">
					<h3>General</h3>
					<ul class="nav side-menu">
						<li>
							<a href="<?php echo Yii::app()->baseUrl ?>/dashboard"><i class="fa fa-home"></i> Home</a>
						</li>
					  	<li>
							<a href="<?php echo Yii::app()->createUrl("/categories/index"); ?>"><i class="fa fa-tags" aria-hidden="true"></i>Category </a>
						</li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl("/subcategories/index"); ?>"><i class="fa fa-list-alt" aria-hidden="true"></i> SubCategory </a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl("/products
/index"); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Product</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl("/gallery/index"); ?>"><i class="fa fa-picture-o"></i></i> Gallery </a>
                        </li>
						<li>
							<a href="<?php echo Yii::app()->createUrl("/events/index"); ?>"><i class="fa fa-calendar"></i> Event </a>
						</li>
						<li>
							<a><i class="fa fa-envelope"></i>Mail Info <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
								<li><a href="<?php echo Yii::app()->createUrl("/careersMail/index"); ?>"><i class="fa fa-user" aria-hidden="true"></i>Career Info</a></li>
								<li><a href="<?php echo Yii::app()->createUrl("/ContactUs/index"); ?>"><i class="fa fa-at" aria-hidden="true"></i>Contact Us Info</a></li>
							</ul>
						</li>
					</ul>
              	</div>
            </div>

            <div class="sidebar-footer hidden-small">
				<a data-toggle="tooltip" data-placement="top" title="Settings">
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				</a>
				<a data-toggle="tooltip" data-placement="top" title="FullScreen">
					<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
				</a>
				<a data-toggle="tooltip" data-placement="top" title="Lock">
					<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
				</a>
				<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo Yii::app()->createUrl("/user/logout"); ?>">
					<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				</a>
            </div>
          </div>
        </div>

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/img.jpg" alt=""><?php echo Users::getFullName(); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="<?php echo Yii::app()->createUrl("/user/logout"); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <!-- <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a> -->
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->baseUrl ?>/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->baseUrl ?>/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->baseUrl ?>/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo Yii::app()->baseUrl ?>/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
         	<?php echo $content; ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/Flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/Flot/jquery.flot.time.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

     <!-- Datatables -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jszip/dist/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/pdfmake/build/vfs_fonts.js"></script>


    <!-- Custom Theme Scripts -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/build/js/custom.min.js"></script>
	 <script type='text/javascript'>
    $(window).load(function(){
        $('#loader-overlay').fadeOut(900);
        $("html").css("overflow","visible");
    });
    </script>
  </body>
</html>
