<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
			<div class="x_title">
				<h2><?php echo $gallery_title; ?> <small></small></h2>
				<div class="navbar-right">
					<a href="<?php echo Yii::app()->createUrl("/gallery/index"); ?>" class="btn btn-success btn-sm">Back To Gallery</a> 
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'gallery-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data')
				)); ?>
				<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'gallery_title', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'gallery_title',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'gallery_title'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'gallery_description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textArea($model,'gallery_description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'gallery_description'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'gallery_main_image', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
						if(!empty($model->gallery_main_image)){
							echo '<img src="../../../assets/images/gallery/'.$model->gallery_main_image.'" width="200" />';	
						} 
						echo $form->fileField($model,'gallery_main_image',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'gallery_main_image'); ?>
					</div>
				</div>

				
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'gallery_thumnail_image', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->gallery_main_image)){
							echo '<img src="../../../assets/images/gallery/thumbnail/'. $model->gallery_thumnail_image .'" width="200" />';	
						}
						echo $form->fileField($model,'gallery_thumnail_image',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'gallery_thumnail_image'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
						<!-- <button class="btn btn-primary" type="button">Cancel</button>
						<button type="submit" class="btn btn-success">Submit</button> -->
					</div>
				</div>
				<?php $this->endWidget(); ?>
			</div>
	    </div>
  </div>
</div>