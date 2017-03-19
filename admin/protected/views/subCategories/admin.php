<?php
/* @var $this SubCategoriesController */
/* @var $model SubCategories */

$this->breadcrumbs=array(
	'Sub Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SubCategories', 'url'=>array('index')),
	array('label'=>'Create SubCategories', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sub-categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sub Categories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sub-categories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'sub_categories_id',
		'categories_id',
		'sub_categories_name',
		'sub_categories_slug',
		'sub_categories_description',
		'sub_categories_status',
		/*
		'created_date',
		'modified_date',
		'delete_flag',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
