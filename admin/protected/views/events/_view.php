<?php
/* @var $this EventsController */
/* @var $data Events */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->event_id), array('view', 'id'=>$data->event_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_title')); ?>:</b>
	<?php echo CHtml::encode($data->event_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_description')); ?>:</b>
	<?php echo CHtml::encode($data->event_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_evenue')); ?>:</b>
	<?php echo CHtml::encode($data->event_evenue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->event_start_date); ?>
	<br />

	<!-- <b><?php //echo CHtml::encode($data->getAttributeLabel('event_end_date')); ?>:</b>
	<?php //echo CHtml::encode($data->event_end_date); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_image')); ?>:</b>
	<?php echo CHtml::encode($data->event_image); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('event_status')); ?>:</b>
	<?php echo CHtml::encode($data->event_status); ?>
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