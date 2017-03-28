<?php 
ob_start();
require_once("db.php");

$start = $_POST['event_count'];
$currEvent = $_POST['event_status'];
$curDate = date("Y-m-d");

$condition = "event_start_date < '$curDate'";
if( $currEvent == 'upcoming' ){
	$condition = "event_start_date > '$curDate'";
}

$arrEventQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND ". $condition ."  LIMIT ". $start .",1");
$LoadedData = '';

if( $currEvent == 'upcoming' ){
	while($rowEvent = $arrEventQuery->fetch()){
		$LoadedData .='<ul class="upcoming_event_box">
			 <li class="row">
		        <div class="col-sm-2 pl0"><b>Event</b></div> 
		        <div class="col-sm-10 pl0">'. $rowEvent['event_title'] .'</div>
		    </li>
		    <li class="row">
		        <div class="col-sm-2 pl0"><b>Date</b></div>
		        <div class="col-sm-10 pl0">'. date('d F Y', strtotime($rowEvent['event_start_date'])) .'</div></li>
		    <li class="row">
		        <div class="col-sm-2 pl0"><b>Description</b></div>
		        <div class="col-sm-10 pl0">'. substr($rowEvent['event_description'], 0, 150) .'</div>
		    </li>
		    <li class="row">
		        <div class="col-sm-2 pl0"><b>Evenue</b></div>
		        <div class="col-sm-10 pl0">'. substr($rowEvent['event_evenue'], 0, 150) .' </div>
		    </li>
		</ul>
		';
	}
} else {
		$strPastCount = 1;
		while($rowPastPro = $arrEventQuery->fetch()){
			$LoadedData .='
				<div class="past_event_box">
					<p> '. $rowPastPro['event_title'] .' </p>
					<p> '. date('d F Y', strtotime($rowPastPro['event_start_date'])) .' </p>
					<div id="pastevent-carausal'. $strPastCount .'" class="carousel slide col-sm-12 padding0 pull-right" data-ride="carousel">';
						if( !empty( $rowPastPro['event_images'] ) ){
                            $getTotalImg = explode(",", $rowPastPro['event_images']);
                            $LoadedData .=' <ol class="carousel-indicators"> ';
                            	for ($i=0; $i < count($getTotalImg) ; $i++) { 
                                    $currStatus = '';
                                    if($i == 0){
                                        $currStatus = 'active';
                                    }
                                    $LoadedData .='<li data-target="#pastevent-carausal'. $strPastCount .'" data-slide-to="'. $i .'" class="'. $currStatus .'"></li> ';
                                }
                            $LoadedData .=' </ol> 
                            <div class="carousel-inner">';
                            	foreach ($getTotalImg as $key => $value) {
                                    $currStatus = '';
                                    if($key == 0){
                                        $currStatus = 'active';
                                    }
                                    $LoadedData .=' <div class="item '. $currStatus .'"> 
                                    					<img src="assets/images/events/'. $value .'" alt="">
                                    				</div>';
                                }
                          	$LoadedData .=' </div>';
                        }  else { echo "No Image";}
		$LoadedData .='	<div class="clear15"></div>
					</div>
		    	</div>';
		 	$strPastCount++; 
		}
}

echo $LoadedData;
?>