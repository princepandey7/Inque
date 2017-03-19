<?php
/* @var $this CategoriesController */
/* @var $data Categories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->categories_id), array('view', 'id'=>$data->categories_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_name')); ?>:</b>
	<?php echo CHtml::encode($data->categories_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_slug')); ?>:</b>
	<?php echo CHtml::encode($data->categories_slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_description')); ?>:</b>
	<?php echo CHtml::encode($data->categories_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_status')); ?>:</b>
	<?php echo CHtml::encode($data->categories_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('delete_flag')); ?>:</b>
	<?php echo CHtml::encode($data->delete_flag); ?>
	<br />

	*/ ?>

</div>