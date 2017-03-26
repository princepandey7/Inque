<?php 
ob_start();
require_once("db.php");
$pgTitle = "INQUE - Modular kitchen and bathroom accessories";
include_once('header.php') ?>
            <div class="clear0"></div>
            <div class="container event margin-top100">
                <div class="title">Event <hr/></div>
                <div class="col-sm-3">
                    <div class="eventInner">
                        <div class="menu-list">
                            <ul>
                                <li class="active"><a href="">Upcoming Event's</a> </li>
                                <li><a href="">Past Event's </a></li>
                            </ul>
                        </div>
                        <?php
                            $curDate = date("Y-m-d");
                            $EventQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND event_start_date > '$curDate'");
                            $EventPastQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND event_start_date < '$curDate'");

                            $strCount = 1;
                            while($rowPro = $EventQuery->fetch()){
                        ?>
                        <ul>
                            <li class="row">
                                <div class="col-sm-4 pl0"><b>Event</b></div> 
                                <div class="col-sm-8 pl0"><?php echo $rowPro['event_title']; ?></div>
                            </li>
                            <li class="row">
                                <div class="col-sm-4 pl0"><b>Date</b></div>
                                <div class="col-sm-8 pl0"><?php echo date('d F Y', strtotime($rowPro['event_start_date'])); ?></div></li>
                            <li class="row">
                                <div class="col-sm-4 pl0"><b>Description</b></div>
                                <div class="col-sm-8 pl0"><?php echo substr($rowPro['event_description'], 0, 150) ; ?></div>
                            </li>
                            <li class="row">
                                <div class="col-sm-4 pl0"><b>Evenue</b></div>
                                <div class="col-sm-8 pl0"><?php echo substr($rowPro['event_evenue'], 0, 150) ; ?>
                            </li>
                        </ul>
                        <div class="clear0"></div>
                        <hr/>
                        <?php $strCount++; } ?>
                    </div>
                </div>
                <div class="col-sm-9 pl0">
                    <div class="pastEvent">
                        <?php 
                            $strPastCount = 1;
                            while($rowPastPro = $EventPastQuery->fetch()){
                        ?>

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

                            <!-- Wrapper for slides -->
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
                        <div class="clear15"></div>

                        </div>
                        <div class="clear15"></div>
                         <hr/>
                        <?php $strPastCount++; } ?>
                   </div>
                </div>
                <div class="clear15"></div>
                <div class="col-sm-12" style="text-align:center; margin-top:10px"><a href="#" class="btn">view more</a></div>
            </div>
            <div class="clear15"></div>
            <div class="container-fluid footer">
                <div class="clear0"></div>
                <?php include_once('footer.php') ?>
            </div>
        </div>

        <?php include_once('enquiry-slider.php') ?>

        <!-- <script src="assets/js/bootstrap.min.js"></script> -->
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
            // new AnimOnScroll( document.getElementById( 'grid1' ), {
            //     minDuration : 0.4,
            //     maxDuration : 0.7,
            //     viewportFactor : 0.2
            // } );
        </script>
    </body>
</html>
