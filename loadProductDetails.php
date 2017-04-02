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
        <div class="left-sec" style="width:65%">';

       if( !empty($rowProductDesc['product_main_image']) ) {
            $LoadedData .='
                <img src="assets/images/products/'. $rowProductDesc['product_main_image'] .'" class="responsive-img">';
        }


$LoadedData .='</div>
        <div class="right-sec">
            <span class="title">EBDS -'. $rowProductDesc['ebds'] .' </span>';
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
            <a class="active commonPdfRequest" requested_pdf_name="'. $rowProductDesc['upload_product_pdf'] .'" pdf_status="get_product_pdf" data-toggle="modal" sub_cat_id="'.  $rowProductDesc['id'] .'" data-target="#productPdfRequest" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a>
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
