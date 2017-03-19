<?php
/* @var $this GalleryController */
/* @var $data Gallery */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gallery_id), array('view', 'id'=>$data->gallery_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_title')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_description')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_main_image')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_main_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_thumnail_image')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_thumnail_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_status')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delete_flag')); ?>:</b>
	<?php echo CHtml::encode($data->delete_flag); ?>
	<br />

	*/ ?>

</div>