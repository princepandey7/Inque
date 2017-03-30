<?php
/* @var $this RequestedpdfController */
/* @var $model Requestedpdf */

$this->breadcrumbs=array(
	'Requestedpdfs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Requestedpdf', 'url'=>array('index')),
	array('label'=>'Create Requestedpdf', 'url'=>array('create')),
	array('label'=>'Update Requestedpdf', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Requestedpdf', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Requestedpdf', 'url'=>array('admin')),
);
?>

<h1>View Requestedpdf #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'mobile',
		'company',
		'country',
		'state',
		'city',
		'requested_by',
		'is_visible',
		'creted_date',
		'modified_date',
		'delete_flag',
	),
)); ?>
