<?php 
ob_start();
require_once("db.php");

$intProductId = $_POST['productId'];
$arrProductDescQuery = $connection->tableDataCondition("*", "products", "	product_status=1 AND id=". $intProductId);
$LoadedData = '';

while($rowProductDesc = $arrProductDescQuery->fetch()){
	$LoadedData .='
	<div class="descr">
        <span class="title-band"> 
            '. $rowProductDesc['title'] .'
        </span>
        <div class="left-sec">
            <img src="assets/images/kitchen-banner.png">
        </div>
        <div class="right-sec">
            <span class="title">EBDS - 4040-95</span>';
            if( !empty($rowProductDesc['size']) ) {
				$LoadedData .='<span>
				    <b>Available Size -</b>
					'. $rowProductDesc['size'] .'                
				</span>';
        	}

        	if( !empty($rowProductDesc['finish']) ) {
        		$LoadedData .='<span>
				    <b>Finish -</b>
					'. $rowProductDesc['finish'] .'                
				</span>';
        	}

        	if( !empty($rowProductDesc['height']) ) {
        		$LoadedData .='<span>
				    <b>Height -</b>
					'. $rowProductDesc['height'] .'                
				</span>';
        	}

        	if( !empty($rowProductDesc['features']) ) {
        		$LoadedData .='<span>
				    <b>Features -</b>
					<span>'. $rowProductDesc['features'] .' </span>                
				</span>';
        	}

    $LoadedData .='
        </div>
        <div class="clear15"></div>';
        if( !empty($rowProductDesc['upload_product_pdf']) ) {
            $filename = 'assets/pdfProduct/product/'. $rowProductDesc['upload_product_pdf'];
            if(file_exists($filename)){ 
 $LoadedData .='
        <div class="link pull-right">
            <a href="'. $filename .'"  target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> View &nbsp;/&nbsp;&nbsp;</a>
            <a class="active commonPdfRequest" requested_pdf_name="'. $rowProductDesc['upload_product_pdf'] .'" pdf_status="get_product_pdf" data-toggle="modal" data-target="#productPdfRequest" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a>
        </div> ';
            }
        }
$LoadedData .='
        <div class="clear0"></div>
    </div>';

    if( !empty($rowProductDesc['kit_package_image']) ) {
		$LoadedData .='<div class="img-block">
		    <b>Kit Package -</b>
		    <img src="assets/images/products/kit-package/'. $rowProductDesc['kit_package_image'] .'" class="responsive-img">              
		</div>';
	}
	if( !empty($rowProductDesc['planning_image']) ) {
		$LoadedData .='<div class="img-block">
		    <b>Kit Package -</b>
		    <img src="assets/images/products/planning/'. $rowProductDesc['planning_image'] .'" class="responsive-img">              
		</div>';
	}
?>
<?php } 
echo $LoadedData;
?>
