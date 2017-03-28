<?php 
ob_start();
require_once("db.php");

$start = $_POST['gallery_count'];

$arrGalleryQuery = $connection->tableDataCondition("*", "gallery", "gallery_status=1 LIMIT ". $start .",6");

$LoadedData = '';
while($rowGallery = $arrGalleryQuery->fetch()){
$LoadedData .='<li class="galleryMainImage" style="position: absolute; left: 0px; top: 0px; animation-duration: 0.620164s;">
	<a href="assets/images/gallery/'. $rowGallery["gallery_main_image"] .'" class="fancybox" data-fancybox-group="gallery"><img src="assets/images/gallery/'. $rowGallery['gallery_thumnail_image'] .'">
		<div class="caption">
		    <b> '. $rowGallery['gallery_title'] .' </b>
		    <p> '. $rowGallery['gallery_description'] .' </p>
		</div>
	</a>
</li>
';
?>
<?php } 
echo $LoadedData;
?>
