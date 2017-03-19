<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
			<div class="x_title">
				<h2><?php echo $categories_title; ?> <small></small></h2>
				<div class="navbar-right">
					<a href="<?php echo Yii::app()->createUrl("/categories/index"); ?>" class="btn btn-success btn-sm">Back To Category</a> 
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'categories-form',
					'enableAjaxValidation'=>false,
				)); ?>
				<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->
				<!-- <?php //echo $form->errorSummary($model); ?> -->

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'categories_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'categories_name',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'categories_name'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'categories_slug', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'categories_slug',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>true)); ?>
						<?php echo $form->error($model,'categories_slug'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'categories_description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textArea($model,'categories_description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'categories_description'); ?>
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
<script type="text/javascript">
	$(document).ready(function() {
  		$('#Categories_categories_name').keyup(function(e) {
			var txtVal = $(this).val();
			txtVal = txtVal.toLowerCase().replace(/\s/g, '-');
			$('#Categories_categories_slug').val(txtVal);
		});
	});
</script>