<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Create',
);

// $this->menu=array(
// 	array('label'=>'List Events', 'url'=>array('index')),
// 	array('label'=>'Manage Events', 'url'=>array('admin')),
// );
?>
<?php $this->renderPartial('_form', array('model'=>$model, 'event_title' => 'Create Events')); ?>