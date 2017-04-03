<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
			<div class="x_title">
				<h2><?php echo $event_title; ?> <small></small></h2>
				<div class="navbar-right">
					<a href="<?php echo Yii::app()->createUrl("/events/index"); ?>" class="btn btn-success btn-sm">Back To Events</a> 
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'events-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data')
				)); ?>
				<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->
				<?php //echo $form->errorSummary($model); ?>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'event_title', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'event_title',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'event_title'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'event_description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textArea($model,'event_description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'event_description'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'event_evenue', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textArea($model,'event_evenue',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'event_evenue'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'event_start_date', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$model,
								'attribute'=>'event_start_date',
								'value' => '',
								'options'=>array(
									'buttonImage'=>Yii::app()->baseUrl.'/images/icons.date.png',
									'buttomImageOnly'=>true,
									'showAnim'=>'fold',
									'dateFormat' =>'dd-mm-yy',
								),
								'htmlOptions'=>array(
									// 'style'=>'height:20px;',
									'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
								),
							));
							echo $form->error($model,'event_start_date');
						?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php
					 echo $form->labelEx($model,'event_images', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->event_images)){
							echo '<div class="galleryIconDivBox"> <img src="../../../assets/images/events/'.$model->event_images.'" width="200" /> <a event_id= "'. $model->event_id .'" status="main_img1" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
						}
						echo $form->fileField($model,'event_images',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'event_images'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php
					 echo $form->labelEx($model,'event_images1', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->event_images1)){
							echo '<div class="galleryIconDivBox"> <img src="../../../assets/images/events/'.$model->event_images1.'" width="200" /> <a event_id= "'. $model->event_id .'" status="main_img2" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
						}
						echo $form->fileField($model,'event_images1',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'event_images1'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php
					 echo $form->labelEx($model,'event_images2', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->event_images2)){
							echo '<div class="galleryIconDivBox"> <img src="../../../assets/images/events/'.$model->event_images2.'" width="200" /> <a event_id= "'. $model->event_id .'" status="main_img3" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
						}
						echo $form->fileField($model,'event_images2',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'event_images2'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<?php 
							echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save' , array( 'class'=> 'btn btn-success' )); ?>
						<!-- <button class="btn btn-primary" type="button">Cancel</button>
						<button type="submit" class="btn btn-success">Submit</button> -->
					</div>
				</div>
				<?php $this->endWidget(); ?>
			</div>
	    </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".removeImgIcon").on('click',function(){
			$("#loader-overlay").show();
			var This = $(this);
			$.ajax({
			    type: "POST",
			    dataType: "json",
			    data: {event_id : $(this).attr('event_id'), event_status: $(this).attr('status') },
			    url: "<?php echo Yii::app()->baseUrl; ?>/events/RemovePdf/",
			    success: function(data) {
			        if(data.status =="success"){
			        	This.parents('.galleryIconDivBox').hide();
						$("#loader-overlay").hide();
			        }
			    },
			});
		})

	});

</script>