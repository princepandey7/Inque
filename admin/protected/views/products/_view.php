<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categories_id')); ?>:</b>
	<?php echo CHtml::encode($data->categories_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcategories_id')); ?>:</b>
	<?php echo CHtml::encode($data->subcategories_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ebds')); ?>:</b>
	<?php echo CHtml::encode($data->ebds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finish')); ?>:</b>
	<?php echo CHtml::encode($data->finish); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('material')); ?>:</b>
	<?php echo CHtml::encode($data->material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('features')); ?>:</b>
	<?php echo CHtml::encode($data->features); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upload_product_pdf')); ?>:</b>
	<?php echo CHtml::encode($data->upload_product_pdf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_main_image')); ?>:</b>
	<?php echo CHtml::encode($data->product_main_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_thum_image')); ?>:</b>
	<?php echo CHtml::encode($data->product_thum_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kit_package_image')); ?>:</b>
	<?php echo CHtml::encode($data->kit_package_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('planning_image')); ?>:</b>
	<?php echo CHtml::encode($data->planning_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_status')); ?>:</b>
	<?php echo CHtml::encode($data->product_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delete_flag')); ?>:</b>
	<?php echo CHtml::encode($data->delete_flag); ?>
	<br />

	*/ ?>

</div>