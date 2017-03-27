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
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#present-event">Upcoming Event's</a> 
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#past-event">Past Event's </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 pl0 tab-content">
                    <?php
                        $curDate = date("Y-m-d");
                        $EventQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND event_start_date > '$curDate' LIMIT 0,1");
                        $EventPastQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND event_start_date < '$curDate' LIMIT 0,1");

                    ?>
                    <div id="present-event" class="tab-pane fade  in pastEvent active">
                        <?php
                            $strCount = 1;
                            while($rowPro = $EventQuery->fetch()){
                        ?>

                        <ul class="upcoming_event_box">
                            <li class="row">
                                <div class="col-sm-2 pl0"><b>Event</b></div> 
                                <div class="col-sm-10 pl0"><?php echo $rowPro['event_title']; ?></div>
                            </li>
                            <li class="row">
                                <div class="col-sm-2 pl0"><b>Date</b></div>
                                <div class="col-sm-10 pl0"><?php echo date('d F Y', strtotime($rowPro['event_start_date'])); ?></div></li>
                            <li class="row">
                                <div class="col-sm-2 pl0"><b>Description</b></div>
                                <div class="col-sm-10 pl0"><?php echo substr($rowPro['event_description'], 0, 150) ; ?></div>
                            </li>
                            <li class="row">
                                <div class="col-sm-2 pl0"><b>Evenue</b></div>
                                <div class="col-sm-10 pl0"><?php echo substr($rowPro['event_evenue'], 0, 150) ; ?>
                            </li>
                        </ul>
                        <div class="clear0"></div>
                       
                        <?php $strCount++; } ?>
                        <div class="col-sm-12" style="text-align:center; margin-top:10px"><a id="strPresentEventBtn" class="btn">view more</a></div>

                        <div class="clear15"></div>
                    </div>
                    <div id="past-event" class="pastEvent tab-pane fade in">
                        <?php 
                            $strPastCount = 1;
                            while($rowPastPro = $EventPastQuery->fetch()){
                        ?>
                        <div class="past_event_box">
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
                                <div class="clear15"></div>
                            </div>
                        </div>
                        <hr/>
                        <?php $strPastCount++; } ?>
                    <div class="clear15"></div>
                <div class="col-sm-12" style="text-align:center; margin-top:10px"><a id="strPastEventBtn" class="btn">view more</a></div>
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
            // $(".menubar").on('click', 'li', function () {
            //     $(".menubar li.active").removeClass("active");
            //     $(this).addClass("active");
            // });
        </script>
        <script>
            $(function(){
                $(document).on('click', '#strPresentEventBtn', function(){
                    $("#loader-overlay").show();
                    var countTotalEvent = $(".upcoming_event_box").length;
                    console.log(countTotalEvent);
                    var This = $(this);
                    jQuery.ajax({
                        url: "loadEvent.php",
                        type: "post",
                        data: {"event_count" : countTotalEvent, "event_status" : "upcoming"},
                        success: function(data) {
                            if( data != ''){
                                $('.upcoming_event_box:last').after(data);
                            } else {
                                This.hide();
                            }
                            $("#loader-overlay").hide();
                        }
                    });
                });


                $(document).on('click', '#strPastEventBtn', function(){
                    $("#loader-overlay").show();
                    var countTotalEvent = $(".past_event_box").length;
                    // console.log(countTotalEvent);
                    var This = $(this);
                    jQuery.ajax({
                        url: "loadEvent.php",
                        type: "post",
                        data: {"event_count" : countTotalEvent, "event_status" : "past"},
                        success: function(data) {
                            if( data != ''){
                                $('.past_event_box:last').after(data);
                            } else {
                                This.hide();
                            }
                            $("#loader-overlay").hide();
                        }
                    });
                });
            });
        </script>
    </body>
</html>
