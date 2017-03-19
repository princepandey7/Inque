<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->gallery_id=>array('view','id'=>$model->gallery_id),
	'Update',
);

// $this->menu=array(
// 	array('label'=>'List Gallery', 'url'=>array('index')),
// 	array('label'=>'Create Gallery', 'url'=>array('create')),
// 	array('label'=>'View Gallery', 'url'=>array('view', 'id'=>$model->gallery_id)),
// 	array('label'=>'Manage Gallery', 'url'=>array('admin')),
// );
?>

<h1>Update Gallery <?php echo $model->gallery_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'gallery_title' => 'Update Gallery')); ?>