<?php 
ob_start();
require_once("db.php");
$pgTitle = "INQUE - Modular kitchen and bathroom accessories";
include_once('header.php') ?>
            <div class="container gallery margin-top100">
                <div class="title">Gallery</div>
                <?php
                    $GalleryQuery = $connection->tableDataCondition("*", "gallery", "gallery_status=1 LIMIT 0,6");
                ?>
                <ul class="grid effect-2 imageGalleryMainBox" id="grid1">
                    <?php 
                        while($rowPro = $GalleryQuery->fetch()){ 
                    ?>
                        <li class="galleryMainImage">
                            <a href="assets/images/gallery/<?php echo $rowPro['gallery_main_image']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="assets/images/gallery/thumbnail/<?php echo $rowPro['gallery_thumnail_image']; ?>">
                            <div class="caption">
                                <b><?php echo $rowPro['gallery_title']; ?></b>
                                <p><?php echo $rowPro['gallery_description']; ?></p>
                            </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="clear0"></div>
                <div class="col-sm-12" style="text-align:center"><a class="btn" id="galleryViewMore">view more</a></div>
            </div>
            <div class="clear0"></div>
            
            <div class="container">
                <div class="col-sm-12">
                <div id="galleryCarousel" class="galleryCarousel carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active vendor">
                          <iframe width="100%" height="100%" src="//www.youtube.com/embed/SEBLt6Kd9EY?controls=0" frameborder="0" allowfullscreen=""></iframe>
                            <div class="caption">
                                <b>Vile Parle Demonetisation</b>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                </p>
                            </div>
                        </div>
                        <div class="item vendor">
                            <iframe width="100%" height="100%" src="//www.youtube.com/embed/SEBLt6Kd9EY?controls=0" frameborder="0" allowfullscreen=""></iframe>
                            <div class="caption">
                                <b>Vile Parle Demonetisation</b>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                </p>
                            </div>
                        </div>
                        <div class="item vendor">
                            <iframe width="100%" height="100%" src="//www.youtube.com/embed/IkTw7J-hGmg?controls=0" frameborder="0" allowfullscreen=""></iframe>
                            <div class="caption">
                                <b>Vile Parle Demonetisation</b>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                </p>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                </div>
                </div>
            </div>

            <div class="clear15"></div>
            <div class="container-fluid footer">
                <div class="clear0"></div>
                <?php include_once('footer.php') ?>
            </div>
        </div>

        <?php include_once('enquiry-slider.php') ?>

        <!-- <script src="assets/js/bootstrap.min.js"></script> -->
        <script src="assets/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="assets/js/jquery.fancybox.js"></script>
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
            $(function(){
                loadImageGallery();
                $(document).on('click', '#galleryViewMore', function(){
                    $("#loader-overlay").show();
                    var countTotalGallery = $(".imageGalleryMainBox").children("li").length;
                    var This = $(this);
                    jQuery.ajax({
                        url: "loadGallery.php",
                        type: "post",
                        data: {"gallery_count" : countTotalGallery},
                        success: function(data) {
                            if( data != ''){
                                $('.imageGalleryMainBox').find("li:last").after(data);
                                loadImageGallery();
                            } else {
                                This.hide();
                            }
                            $("#loader-overlay").hide();
                        }
                    });
                })
            });
        </script>
        <script type="text/javascript">
            function loadImageGallery(){
                new AnimOnScroll( document.getElementById( 'grid1' ), {
                    minDuration : 0.4,
                    maxDuration : 0.7,
                    viewportFactor : 0.2
                });
            }
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
        <script>
            $('.fancybox').fancybox();
            // Basic FitVids Test
            $(".vendor").fitVids();
            // Custom selector and No-Double-Wrapping Prevention Test
            $(".vendor").fitVids({ customSelector: "iframe[src^='http://socialcam.com']"});
        </script>
    </body>
</html>
