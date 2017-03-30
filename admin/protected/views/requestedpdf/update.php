<?php
/* @var $this RequestedpdfController */
/* @var $model Requestedpdf */

$this->breadcrumbs=array(
	'Requestedpdfs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Requestedpdf', 'url'=>array('index')),
	array('label'=>'Create Requestedpdf', 'url'=>array('create')),
	array('label'=>'View Requestedpdf', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Requestedpdf', 'url'=>array('admin')),
);
?>

<h1>Update Requestedpdf <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>