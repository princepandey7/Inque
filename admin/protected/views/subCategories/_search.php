<?php
/* @var $this SubCategoriesController */
/* @var $model SubCategories */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sub_categories_id'); ?>
		<?php echo $form->textField($model,'sub_categories_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'categories_id'); ?>
		<?php echo $form->textField($model,'categories_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_categories_name'); ?>
		<?php echo $form->textField($model,'sub_categories_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_categories_slug'); ?>
		<?php echo $form->textField($model,'sub_categories_slug',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_categories_description'); ?>
		<?php echo $form->textArea($model,'sub_categories_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_categories_status'); ?>
		<?php echo $form->textField($model,'sub_categories_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delete_flag'); ?>
		<?php echo $form->textField($model,'delete_flag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->