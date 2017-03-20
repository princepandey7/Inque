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
                            <?php
                                // $getUrl = explode("&",$_SERVER['QUERY_STRING']);
                            $current_cat = urlencode($_GET['cat']);
                                $CategoryQuery = $connection->tableDataCondition("*", "categories", "categories_id=". $current_cat);
                                $SubCategoryQuery = $connection->tableDataCondition("*", "sub_categories", "categories_id=". $current_cat);

                                while($rowCategory = $CategoryQuery->fetch()){
                            ?>
                            <div class="heading">
                                <h2>products /</h2>
                                <h4><?php echo $rowCategory['categories_name']?></h4>
                            </div>
                            <ul>
                                <?php 
                                    $strActiveTitle = '';
                                    $strActiveDesc = '';
                                    while($rowSubCategory = $SubCategoryQuery->fetch()){ 
                                        $strActiveClass = '';
                                        if(isset($_GET['subid']) && ( $_GET['subid'] == $rowSubCategory['sub_categories_id'] ) ){
                                            $strActiveClass = 'active';
                                            $strActiveTitle = $rowSubCategory['sub_categories_name'];
                                            $strActiveDesc = $rowSubCategory['sub_categories_description'];
                                        }
                                    ?>
                                    <li class="<?php echo $strActiveClass; ?>"><a href=<?php echo 'product?cat=1&subid='. $rowSubCategory['sub_categories_id']; ?>><?php echo $rowSubCategory['sub_categories_name']?></a> </li>
                                <?php } ?>
                            </ul>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-9 rt-sec">
                        <?php
                             $ProductQuery = $connection->tableDataCondition("*", "products", "product_status=1 LIMIT 0,5");
                        ?>
                        <div class="heading">
                            <h2><?php echo $strActiveTitle; ?></h2>
                            <p>
                                <?php echo $strActiveDesc; ?>
                            </p>
                            <div class="link">
                                <a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i> View &nbsp;/&nbsp;&nbsp;</a>
                                <a href="" class="active"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a>
                            </div>
                        </div>
                        <div class="row block">
                            <div class="col-sm-4">
                                <ul>
                                    <li>
                                        <span class="title">EVA Slim Box Standard Drawer</span>
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
                                        <div><img src="assets/images/06.png" /><div>
                                    </li>
                                    <li>
                                        <span class="title">EVA Slim Box Standard Drawer</span>
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
                                        <div><img src="assets/images/06.png" /><div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul>
                                    <li>
                                        <span class="title">EVA Slim Box Standard Drawer</span>
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
                                        <div><img src="assets/images/06.png" /><div>
                                    </li>
                                    <li>
                                        <span class="title">EVA Slim Box Standard Drawer</span>
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
                                        <div><img src="assets/images/06.png" /><div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul>
                                    <li>
                                        <span class="title">EVA Slim Box Standard Drawer</span>
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
                                        <div><img src="assets/images/06.png" /><div>
                                    </li>
                                    <li>
                                        <span class="title">EVA Slim Box Standard Drawer</span>
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
                                        <div><img src="assets/images/06.png" /><div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
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
        <!-- <script type="text/javascript">
            $('#portfolio').click(function(e){
              e.preventDefault();
              //var href = $(this).attr('href');
              $('.kitchenBlock').slideUp('fast');
            });
        </script> -->
    </body>
</html>
