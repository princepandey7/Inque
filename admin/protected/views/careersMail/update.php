<?php
/* @var $this CareersMailController */
/* @var $model CareersMail */

$this->breadcrumbs=array(
	'Careers Mails'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CareersMail', 'url'=>array('index')),
	array('label'=>'Create CareersMail', 'url'=>array('create')),
	array('label'=>'View CareersMail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CareersMail', 'url'=>array('admin')),
);
?>

<h1>Update CareersMail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>