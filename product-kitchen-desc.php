<?php
ob_start();
require_once("db.php");
$pgTitle = "INQUE - Modular kitchen and bathroom accessories";
include_once('header.php');
?>
            <div class="container-fluid banner margin-top100">
                <img src="assets/images/top-banner.jpg" class="responsive-img">
                <h6>solution for smart spaces</h6>
            </div>
            <div class="clear0"></div>
            <div class="container product-block">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="menu-list">
                            <div class="heading">
                                <h2>products /</h2>
                                <h4>kitchen</h4>
                            </div>
                            <ul>
                                <li class="active"><a href="">EVA Slim Box Drawer</a> </li>
                                <li><a href="">Rolling Shutter </a></li>
                                <li><a href="">EVA Slim Box Drawer</a></li>
                                <li><a href="">Rolling Shutter </a></li>
                                <li><a href="">EVA Slim Box Drawer</a></li>
                                <li><a href="">Rolling Shutter </a></li>
                                <li><a href="">EVA Slim Box Drawer</a></li>
                                <li><a href="">Rolling Shutter</a></li>
                                <li><a href="">EVA Slim Box Drawer </a></li>
                                <li><a href="">Rolling Shutter </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9 rt-sec">
                        <div class="heading">
                            <h2>EVA Slim Drawer</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting 
                            </p>
                            <p>
                                Industry. Lorem Ipsum has been the industry's 
                            </p>
                            <div class="link">
                                <a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i> View &nbsp;/&nbsp;&nbsp;</a>
                                <a href="" class="active"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a>
                            </div>
                        </div>
                        <div class="productDescription">
                            <div class="descr">
                                <span class="title-band"> 
                                    EVA Slim Box High Inner Drawer with Cross Railling System
                                </span>
                                <div class="left-sec">
                                    <img src="assets/images/kitchen-banner.png">
                                </div>
                                <div class="right-sec">
                                    <span class="title">EBDS - 4040-95</span>
                                    <span>
                                        <b>Available Size -</b>
                                        400/450/500/550/600/650/700
                                    </span>
                                    <span>
                                        <b>Finish - </b>
                                        White &amp; Grey
                                    </span>
                                    <span>
                                        <b>Height - </b>
                                        Drawer sides height 95mm
                                    </span>
                                    <span>
                                        <b>Features - </b>
                                        <span>Drawer sides height</span>
                                        <span>Drawer sides height 95mm</span>
                                        <span>Drawer sides height 95mm</span>
                                        <span>Drawer sides height 95mm</span>
                                    </span>
                                </div>
                                <div class="clear15"></div>
                                <div class="link pull-right">
                                    <a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i> View &nbsp;/&nbsp;&nbsp;</a>
                                    <a href="" class="active"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a>
                                </div>
                                <div class="clear0"></div>
                            </div>
                            <div class="img-block">
                                <b>Kit Package -</b>
                                <img src="assets/images/banner-img.jpg" class="responsive-img">
                            </div>
                            <div class="img-block">
                                <b>Planning -</b>
                                <img src="assets/images/banner-img.jpg" class="responsive-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="container-fluid footer">
                <div class="clear0"></div>
                <?php include_once('footer.php') ?>
            </div>
        </div>

        <div class="clear0"></div>

        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/gallery/js/masonry.pkgd.min.js"></script>
        <script src="assets/gallery/js/imagesloaded.js"></script>
        <script src="assets/gallery/js/classie.js"></script>
        <script src="assets/gallery/js/AnimOnScroll.js"></script>

        <script type="text/javascript">
            $(".menubar").on('click', 'li', function () {
                $(".menubar li.active").removeClass("active");
                $(this).addClass("active");
            });
        </script>
        <script>
            new AnimOnScroll( document.getElementById( 'grid1' ), {
                minDuration : 0.4,
                maxDuration : 0.7,
                viewportFactor : 0.2
            } );
        </script>
        <script type="text/javascript">
            /*
            ------------------------------------------------------------
            Function to activate form button to open the slider.
            ------------------------------------------------------------
            */
            function open_panel() {
            slideIt();
            var a = document.getElementById("sidebar");
            a.setAttribute("id", "sidebar1");
            a.setAttribute("onclick", "close_panel()");
            }
            /*
            ------------------------------------------------------------
            Function to slide the sidebar form (open form)
            ------------------------------------------------------------
            */
            function slideIt() {
            var slidingDiv = document.getElementById("slider");
            var stopPosition = 0;
            if (parseInt(slidingDiv.style.right) < stopPosition) {
            slidingDiv.style.right = parseInt(slidingDiv.style.right) + 2 + "px";
            setTimeout(slideIt, 1);
            }
            }
            /*
            ------------------------------------------------------------
            Function to activate form button to close the slider.
            ------------------------------------------------------------
            */
            function close_panel() {
            slideIn();
            a = document.getElementById("sidebar1");
            a.setAttribute("id", "sidebar");
            a.setAttribute("onclick", "open_panel()");
            }
            /*
            ------------------------------------------------------------
            Function to slide the sidebar form (slide in form)
            ------------------------------------------------------------
            */
            function slideIn() {
            var slidingDiv = document.getElementById("slider");
            var stopPosition = -342;
            if (parseInt(slidingDiv.style.right) > stopPosition) {
            slidingDiv.style.right = parseInt(slidingDiv.style.right) - 2 + "px";
            setTimeout(slideIn, 1);
            }
            }
        </script>
    </body>
</html>
