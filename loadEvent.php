<?php 
ob_start();
require_once("db.php");

$start = $_POST['event_count'];
$currEvent = $_POST['event_status'];
$curDate = date("Y-m-d");

$condition = 'event_start_date < '$curDate'';
if( $currEvent == 'upcoming' ){
	$condition = "event_start_date > '$curDate'";
}

$arrEventQuery = $connection->tableDataCondition("*", "events", "event_status=1 AND ". $condition ."  LIMIT ". $start .",1");

$LoadedData = '';

if( $currEvent == 'upcoming' ){
	while($rowEvent = $arrEventQuery->fetch()){
		$LoadedData .='<ul class="upcoming_event_box">
			 <li class="row">
		        <div class="col-sm-4 pl0"><b>Event</b></div> 
		        <div class="col-sm-8 pl0">'. $rowEvent['event_title'] .'</div>
		    </li>
		    <li class="row">
		        <div class="col-sm-4 pl0"><b>Date</b></div>
		        <div class="col-sm-8 pl0">'. date('d F Y', strtotime($rowEvent['event_start_date'])) .'</div></li>
		    <li class="row">
		        <div class="col-sm-4 pl0"><b>Description</b></div>
		        <div class="col-sm-8 pl0">'. substr($rowEvent['event_description'], 0, 150) .'</div>
		    </li>
		    <li class="row">
		        <div class="col-sm-4 pl0"><b>Evenue</b></div>
		        <div class="col-sm-8 pl0">'. substr($rowEvent['event_evenue'], 0, 150) .' </div>
		    </li>
		</ul>
		';
	}
} else {
	while($rowEvent = $arrEventQuery->fetch()){
		$LoadedData .='<ul class="upcoming_event_box">
			 <li class="row">
		        <div class="col-sm-4 pl0"><b>Event</b></div> 
		        <div class="col-sm-8 pl0">'. $rowEvent['event_title'] .'</div>
		    </li>
		    <li class="row">
		        <div class="col-sm-4 pl0"><b>Date</b></div>
		        <div class="col-sm-8 pl0">'. date('d F Y', strtotime($rowEvent['event_start_date'])) .'</div></li>
		    <li class="row">
		        <div class="col-sm-4 pl0"><b>Description</b></div>
		        <div class="col-sm-8 pl0">'. substr($rowEvent['event_description'], 0, 150) .'</div>
		    </li>
		    <li class="row">
		        <div class="col-sm-4 pl0"><b>Evenue</b></div>
		        <div class="col-sm-8 pl0">'. substr($rowEvent['event_evenue'], 0, 150) .' </div>
		    </li>
		</ul>
		';
	}
}

echo $LoadedData;
?>