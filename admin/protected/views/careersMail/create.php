<?php
/* @var $this CareersMailController */
/* @var $model CareersMail */

$this->breadcrumbs=array(
	'Careers Mails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CareersMail', 'url'=>array('index')),
	array('label'=>'Manage CareersMail', 'url'=>array('admin')),
);
?>

<h1>Create CareersMail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>