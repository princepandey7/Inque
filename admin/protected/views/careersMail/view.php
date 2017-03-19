<?php
/* @var $this CareersMailController */
/* @var $model CareersMail */

$this->breadcrumbs=array(
	'Careers Mails'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CareersMail', 'url'=>array('index')),
	array('label'=>'Create CareersMail', 'url'=>array('create')),
	array('label'=>'Update CareersMail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CareersMail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CareersMail', 'url'=>array('admin')),
);
?>

<h1>View CareersMail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'phone',
		'city',
		'state',
		'country',
		'message',
		'resume',
		'created_on',
	),
)); ?>
