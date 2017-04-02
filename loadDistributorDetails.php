<?php 
ob_start();
require_once("db.php");
if( !empty( $_POST['status'] ) ){
	$status = $_POST['status'];

	$tableName = '';
	$strCondition = '';
	if( $status == 'country' ){
		$tableName = 'states';
		$strCondition = 'country_id='. $_POST['country_id'];
	} elseif ( $status == 'state' ) {
		$tableName = 'cities';
		$strCondition = 'state_id='. $_POST['state_id'];
	}
	$getDetailsQuery = $connection->tableDataCondition("*", $tableName , $strCondition);
}

$LoadedData = '';

 $getDetails = $getDetailsQuery->fetchAll(PDO::FETCH_ASSOC);
if( !empty( $getDetails ) ){
	foreach ($getDetails as $strDetailIndex => $rowDetail) {
		$LoadedData .=' <option value="'. $rowDetail['id'] .'"> '. $rowDetail['name'] .' </option>';
	}
}
echo $LoadedData;
?>
