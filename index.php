<?php
require_once("db.php");
$pgTitle = "INQUE - Modular kitchen and bathroom accessories";
include_once('header.php') ?>
            <div class="kitchenBlock">
                <div class="container kitchenContainer">
                    <div id="kitchen-carausal" class="carousel slide col-sm-6" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#kitchen-carausal" data-slide-to="0" class="active"></li>
                            <li data-target="#kitchen-carausal" data-slide-to="1"></li>
                            <li data-target="#kitchen-carausal" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="assets/images/kitchen-banner.png" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/kitchen-banner.png" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/kitchen-banner.png" alt="">
                            </div>
                        </div>
                    </div>
                   
                    <div class="kitchenAbsolute">
                        <h4>KITCHEN</h4>
                        <hr/>
                        <p>Design Your Dream Kitchen with Us</p>
                        <a href="#">view more</a>
                    </div>
                </div>
            </div>
            <div class="bathroomBlock">
                <div class="container kitchenContainer">
                    <div id="bathroom-carausal" class="carousel slide col-sm-6 pull-right" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#bathroom-carausal" data-slide-to="0" class="active"></li>
                            <li data-target="#bathroom-carausal" data-slide-to="1"></li>
                            <li data-target="#bathroom-carausal" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="assets/images/bathroom-banner.png" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/bathroom-banner.png" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/bathroom-banner.png" alt="">
                            </div>
                        </div>
                    </div>
                   
                    <div class="kitchenAbsolute">
                        <h4>BATHROOM</h4>
                        <hr/>
                        <p>Fittings Accessories</p>
                        <a href="#">view more</a>
                    </div>
                </div>
            </div> <!-- /bathroomBlock -->

            <div class="container furnitureOffice">
               <div class="col-sm-6">
                   <div class="furnitureFitting">
                       <h3>furniture fitting</h3>
                       <p>Hardware and Accessories <br/> and Equipemnt Fittings</p>
                       <a href="#">view more</a>
                   </div>
               </div>
               <div class="col-sm-6">
                   <div class="officeFurniture">
                        <h3>office furniture</h3>
                       <p>Keyboard Drawers and<br/> Fitting Accessories</p>
                       <a href="#">view more</a>
                   </div>
               </div>
            </div>
            <div class="clear0"></div>
            <div class="col-sm-12 padding0 bgcolor">
                <div class="col-sm-6 padding0">
                    <img src="assets/images/about-section.png" class="responsive-img">
                </div>
                <div class="col-sm-6 padding0">
                    <div class="solutionForsmart">
                        <h1>solution For smart spaces</h1>
                        <hr/>
                        <p>
                            INQUE, one of the fastest growing hardware brand in India has been able to make a mark with its impressive product range and a wide spread reach across the country. With an understanding of the unique demands of the modern designs, INQUE has been able to introduce efficient solutions to fulfill such requirements.
                        </p>
                        <p>
                            INQUE in India, started its journey from selling door hardware in 2007 and now has successfully managed to grow exponentially with about 225 employees.
                        </p>
                        <a href="#">view more</a>
                    </div>
                </div>
            </div>
            <div class="clear0"></div>
            <div class="container gallery">
                <div class="title">Gallery</div>
                <?php
                    $GalleryQuery = $connection->tableDataCondition("*", "gallery", "gallery_status=1 LIMIT 0,6");
                ?>
                <ul class="grid effect-2" id="grid1">
                    <?php 
                        while($rowPro = $GalleryQuery->fetch()){ 
                    ?>
                    <li>
                        <a href="assets/images/gallery/<?php echo $rowPro['gallery_main_image']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="assets/images/gallery/<?php echo $rowPro['gallery_thumnail_image']; ?>">
                        <div class="caption">
                            <b><?php echo $rowPro['gallery_title']; ?></b>
                            <p><?php echo $rowPro['gallery_description']; ?></p>
                        </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="clear0"></div>
                <div class="col-sm-12" style="text-align:center"><a href="<?php echo DIR .'gallery' ?>" class="btn">view more</a></div>
            </div>
            <div class="clear0"></div>
            <div class="container event">
                <div class="title">Event <hr/></div>
                <div class="col-sm-5">
                    <div class="eventInner">
                        <h5>upcoming events</h5>
                <?php
                    $curDate = date("Y-m-d");
                    $EventCurrentQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND event_start_date > '$curDate' LIMIT 0,2");
                    $EventPastQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND event_start_date < '$curDate' LIMIT 0,1");

                    $strCount = 1;
                    while($rowPro = $EventCurrentQuery->fetch()){
                ?>
                        <ul>
                            <li>
                                <div class="col-sm-4 pl0"><b>Event</b></div> 
                                <div class="col-sm-8 pl0"><?php echo $rowPro['event_title']; ?></div>
                            </li>
                            <li>
                                <div class="col-sm-4 pl0"><b>Date</b></div>
                                <div class="col-sm-8 pl0"> <?php echo date('d F Y', strtotime($rowPro['event_start_date'])); ?></div></li>
                            <li>
                                <div class="col-sm-4 pl0"><b>Description</b></div>
                                <div class="col-sm-8 pl0"><?php echo substr($rowPro['event_description'], 0, 150) ; ?></div>
                            </li>
                            <li>
                                <div class="col-sm-4 pl0"><b>Evenue</b></div>
                                <div class="col-sm-8 pl0"><?php echo substr($rowPro['event_evenue'], 0, 150) ; ?>
                            </li>
                        </ul>
                        <div class="clear0"></div>
                        <hr/>
                        <?php $strCount++; } ?>
                    </div>
                </div>
                <div class="col-sm-7 pl0">
                    <div class="pastEvent">
                        <?php 
                            $strPastCount = 1;
                            while($rowPastPro = $EventPastQuery->fetch()){
                        ?>
                            <h5>past events</h5>
                            <p><?php echo $rowPastPro['event_title']; ?></p>
                            <p><?php echo date('d F Y', strtotime($rowPastPro['event_start_date'])); ?></p>
                            <div id="pastevent-carausal" class="carousel slide col-sm-12 padding0 pull-right" data-ride="carousel">
                            <?php 
                                if( !empty( $rowPastPro['event_images'] ) ){
                                    $getTotalImg = explode(",", $rowPastPro['event_images']);
                            ?>
                                <ol class="carousel-indicators">
                                    <?php for ($i=0; $i < count($getTotalImg) ; $i++) { 
                                        $currStatus = '';
                                        if($i == 0){
                                            $currStatus = 'active';
                                        }
                                    ?> 
                                        <li data-target="#pastevent-carausal" data-slide-to="<?php echo $i; ?>" class="<?php echo $currStatus;?>"></li>
                                    <?php } ?>
                                    <!-- <li data-target="#pastevent-carausal" data-slide-to="1"></li>
                                    <li data-target="#pastevent-carausal" data-slide-to="2"></li> -->
                                </ol>

                            
                                <div class="carousel-inner">
                                <?php 
                                    foreach ($getTotalImg as $key => $value) {
                                        $currStatus = '';
                                        if($key == 0){
                                            $currStatus = 'active';
                                        }
                                ?> 
                                    <div class="item <?php echo $currStatus;?>">
                                        <img src="assets/images/events/<?php echo $value; ?>" alt="">
                                    </div>
                                <?php } ?>
                                
                            </div>
                            <?php } else { echo "No Image";} ?>
                        <?php $strPastCount++; } ?>
                        </div>
                   </div>
                </div>
                <div class="clear15"></div>
                <div class="col-sm-12" style="text-align:center; margin-top:10px"><a href="<?php echo DIR .'event' ?>" class="btn">view more</a></div>
            </div>
            <div class="clear15"></div>
            <div class="container-fluid footer">
                <div class="container">
                    <div class="col-sm-6">
                        <h5>Product catalogue</h5>
                        <hr/>
                        <div class="clear0"></div>
                        <p>Be the first to know about the products, store events and other discount information</p>
                        <a href="" class="btn">Download</a>
                    </div>
                    <div class="col-sm-6">
                        <img src="assets/images/bro-img.png">
                    </div>
                </div>
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
        <script type="text/javascript">
            $('#portfolio').click(function(e){
              e.preventDefault();
              //var href = $(this).attr('href');
              $('.kitchenBlock').slideUp('fast');
            });
        </script>
    </body>
</html>
