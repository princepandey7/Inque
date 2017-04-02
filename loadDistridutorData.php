<?php 
ob_start();
require_once("db.php");
if( !empty( $_POST['country_id'] ) && !empty( $_POST['state_id'] ) && !empty( $_POST['city_id'] ) ){
	$country_id = $_POST['country_id'];
	$state_id 	= $_POST['state_id'];
	$city_id 	= $_POST['city_id'];

	$getDetailsQuery = $connection->tableDataCondition("*", "distributors" , 'country = '. $country_id .' AND state='. $state_id .' AND city='. $city_id);
}

$LoadedData = '';
$getDetails = $getDetailsQuery->fetchAll(PDO::FETCH_ASSOC);
if( !empty( $getDetails ) ){
	foreach ($getDetails as $strDetailIndex => $rowDetail) {
		$LoadedData .='<li class="col-sm-4">
						<div>
							<p>
							    <b>'. $rowDetail['name'] .'</b> <br/>
							    <span>'. $rowDetail['address'] .', '. $rowDetail['state'] .', '. $rowDetail['country'] .' </span>
							    <span>'. $rowDetail['city'] .'</span>
							</p>
							<p>
							    <span>Tel: '. $rowDetail['telephone_no'] .'</span>
							</p>
							<p>
							    <span>Email: '. $rowDetail['email'] .'</span>
							</p>
						</div>  
					</li>';
	}
} else {
	$LoadedData .='<li class="col-sm-4"> No Distributor Available </li>';
}
echo $LoadedData;
?>
