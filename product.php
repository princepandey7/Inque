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
                            $catId = isset($_GET['cat']) ? $_GET['cat'] : "1";
                            $subId = isset($_GET['subid']) ? $_GET['subid'] : "1";
                                $current_cat = urlencode($catId);
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
                                        if(isset($subId) && ( $subId == $rowSubCategory['sub_categories_id'] ) ){
                                            $strActiveClass = 'active';
                                            $strActiveTitle = $rowSubCategory['sub_categories_name'];
                                            $strActiveDesc = $rowSubCategory['sub_categories_description'];
                                        }
                                    ?>
                                    <li class="<?php echo $strActiveClass; ?>"><a href=<?php echo 'product?cat='. $catId .'&subid='. $rowSubCategory['sub_categories_id']; ?>><?php echo $rowSubCategory['sub_categories_name']?></a> </li>
                                <?php } ?>
                            </ul>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-9 rt-sec">
                        <?php
                            $ProductQuery = $connection->tableDataCondition("*", "products", "product_status=1 AND categories_id=". $current_cat ." AND subcategories_id=". $subId ." LIMIT 0,5");
                        ?>
                        <div class="heading">
                            <h2><?php echo $strActiveTitle; ?></h2>
                            <p>
                                <?php echo $strActiveDesc; ?>
                            </p>
                            <div class="link">
                                <a ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> View &nbsp;/&nbsp;&nbsp;</a>
                                <a class="active" data-toggle="modal" data-target="#enquiryForm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a>
                            </div>
                            <div class="backToProductBox" style="display: none;">
                                <a id="backToProductList">Back To Product</a>
                            </div>
                        </div>
                        <div class="block productInqueList">
                            <ul>
                                <?php
                                    $rowProducts = $ProductQuery->fetchAll(PDO::FETCH_ASSOC);
                                    if( !empty( $rowProducts ) ){
                                        foreach ($rowProducts as $strProIndex => $rowProduct) {
                                ?>
                                    <li>
                                        <span class="title"> <a class="productList" proId = <?php echo $rowProduct['id']; ?>><?php echo $rowProduct['title']; ?> </a></span>
                                        <span>
                                            <?php 
                                                if(!empty($rowProduct['size'])){
                                                    echo "<b>Available Size - </b>". $rowProduct['size']; 
                                                }
                                            ?>
                                        </span>
                                        <span>
                                            <?php 
                                                if(!empty($rowProduct['finish'])){
                                                    echo "<b>Finish - </b>". $rowProduct['finish']; 
                                                }
                                            ?>
                                        </span>
                                        <span>
                                            <?php 
                                                if(!empty($rowProduct['height'])){
                                                    echo "<b>Height - </b>". $rowProduct['height']; 
                                                }
                                            ?>
                                        </span>
                                        <div>
                                            <?php 
                                                if( !empty( $rowProduct['product_main_image'] ) ){
                                                    echo "<img src=assets/images/products/". $rowProduct['product_main_image'] ."";
                                                }
                                            ?>
                                        <div>
                                    </li>
                                <?php
                                        }
                                    } else { echo "No Product Found"; } 
                                ?>
                            </ul>
                            <div class="clear0"></div>
                            <?php if( !empty( $rowProducts ) ){ ?>
                                <div class="col-sm-12" style="text-align:center"><a class="btn" id="productViewMore">view more</a></div>
                            <?php } ?>
                        </div>
                        <div class="productDetails" style="display: none"></div>
                    </div>
                </div>
            </div>
            <div class="clear15"></div>
            <div class="container-fluid footer">
                <div class="clear0"></div>
                <?php include_once('footer.php') ?>
            </div>
        </div>
 <div class="clear0"></div>
        <?php //include_once('enquiry-slider.php') ?>
         <?php include_once('enquiry-popup.php') ?>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/gallery/js/masonry.pkgd.min.js"></script>
        <script src="assets/gallery/js/imagesloaded.js"></script>
        <script src="assets/gallery/js/classie.js"></script>
        <script src="assets/gallery/js/AnimOnScroll.js"></script>

        <script type="text/javascript">
            // $(".menubar").on('click', 'li', function () {
            //     $(".menubar li.active").removeClass("active");
            //     $(this).addClass("active");
            // });
        </script>
         <script>

            $(function(){
                $(".backToProductBox").hide();
                $(document).on('click', '.productList', function(){
                    $("#loader-overlay").show();
                    var productId = $(this).attr("proid");
                    var This = $(this);
                    jQuery.ajax({
                        url: "loadProductDetails.php",
                        type: "post",
                        data: {"productId" : productId},
                        success: function(data) {
                            if( data != ''){
                                This.parents('.productInqueList').hide();
                                $(".productDetails").show();
                                $(".productDetails").html();
                                $(".productDetails").html(data);
                                $(".backToProductBox").show();
                                // $('.imageGalleryMainBox').find("li:last").after(data);
                            }
                            $("#loader-overlay").hide();
                        }
                    });
                })

                $(document).on('click', '#backToProductList', function(){
                    $("#loader-overlay").show();
                    $(".productDetails").html();
                    $(".productDetails").hide();
                    $(".productInqueList").show();
                    $("#loader-overlay").hide();
                    $(this).parent('.backToProductBox').hide();
                });

                
            });
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
