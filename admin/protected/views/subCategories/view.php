<?php
/* @var $this SubCategoriesController */
/* @var $model SubCategories */

$this->breadcrumbs=array(
	'Sub Categories'=>array('index'),
	$model->sub_categories_id,
);

$this->menu=array(
	array('label'=>'List SubCategories', 'url'=>array('index')),
	array('label'=>'Create SubCategories', 'url'=>array('create')),
	array('label'=>'Update SubCategories', 'url'=>array('update', 'id'=>$model->sub_categories_id)),
	array('label'=>'Delete SubCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sub_categories_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubCategories', 'url'=>array('admin')),
);
?>

<h1>View SubCategories #<?php echo $model->sub_categories_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sub_categories_id',
		'categories_id',
		'sub_categories_name',
		'sub_categories_slug',
		'sub_categories_description',
		'sub_categories_status',
		'created_date',
		'modified_date',
		'delete_flag',
	),
)); ?>
