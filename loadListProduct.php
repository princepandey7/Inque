<?php

ob_start();
require_once("db.php");

$start = $_POST['productCount'];
$categories_id = $_POST['catId'];
$subcategories_id = $_POST['subId'];

$ProductQuery = $connection->tableDataCondition("*", "products", "product_status=1 AND categories_id=". $categories_id ." AND subcategories_id=". $subcategories_id ." LIMIT  ". $start .",1");

$LoadedData = '';
	$rowProducts = $ProductQuery->fetchAll(PDO::FETCH_ASSOC);
	if( !empty( $rowProducts ) ){
		foreach ($rowProducts as $strProIndex => $rowProduct) {
			$LoadedData .='<li>
								<a class="productList" proId = '. $rowProduct['id'] .'>
			                	<span class="title"> '. $rowProduct['title'] .'</span>
			                <span> ';
			                        if(!empty($rowProduct['size'])){
			                           $LoadedData .='<b>Available Size - </b>'. $rowProduct['size'];
			                        }
			$LoadedData .=' 
			                </span>
			                <span>';
			                        if(!empty($rowProduct['finish'])){
			                        	$LoadedData .='<b>Finish - </b>'. $rowProduct['finish'];
			                        }
			$LoadedData .=' 
			                </span>
			                <span>';
			                    if(!empty($rowProduct['height'])){
			                    	$LoadedData .='<b>Height - </b>'. $rowProduct['height'];
			                    }
			$LoadedData .=' 
			                </span>
			                <div> ';
			                    if( !empty( $rowProduct['product_main_image'] ) ){
			                    	$LoadedData .='<img src=assets/images/products/'. $rowProduct['product_main_image'];
			                    }
			$LoadedData .=' <div>
							</a>
			            </li>';
        }

	}
echo $LoadedData;
?>