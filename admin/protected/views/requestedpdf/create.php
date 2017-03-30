<?php
/* @var $this RequestedpdfController */
/* @var $model Requestedpdf */

$this->breadcrumbs=array(
	'Requestedpdfs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Requestedpdf', 'url'=>array('index')),
	array('label'=>'Manage Requestedpdf', 'url'=>array('admin')),
);
?>

<h1>Create Requestedpdf</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>