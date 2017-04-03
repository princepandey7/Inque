<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
			<div class="x_title">
				<h2><?php echo $categories_title; ?> <small></small></h2>
				<div class="navbar-right">
					<a href="<?php echo Yii::app()->createUrl("/subcategories/index"); ?>" class="btn btn-success btn-sm">Back To Sub-Category</a> 
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'sub-categories-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data')
				)); ?>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'sub_categories_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'sub_categories_name',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'sub_categories_name'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'sub_categories_slug', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'sub_categories_slug',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>true)); ?>
						<?php echo $form->error($model,'sub_categories_slug'); ?>
					</div>
				</div>
				
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'categories_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
							echo $form->dropDownList($model, 'categories_id', CHtml::listData(Categories::getActiveCategory(), 'categories_id', 'categories_name'), array('prompt' => '--Select Category Type--', 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'categories_id'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'upload_pdf', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
							echo $form->fileField($model,'upload_pdf',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>true)); 
							
							if(!empty($model->upload_pdf)){
								echo '<div class="pdfIconDivBox"> <img src="../../images/pdfIcon.png" style="width:30px" />'. RandomHelper::getChopedPdfString($model->upload_pdf) .' <a sub_cat_id= "'. $model->sub_categories_id .'" id="removePdfSubCat"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
							}
						?>
						<?php echo $form->error($model,'upload_pdf'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'sub_categories_description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textArea($model,'sub_categories_description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'sub_categories_description'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
					</div>
				</div>
				<?php $this->endWidget(); ?>
			</div>
	    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
  		$('#Subcategories_sub_categories_name').keyup(function(e) {
			var txtVal = $(this).val();
			txtVal = txtVal.toLowerCase().replace(/\s/g, '-');
			$('#Subcategories_sub_categories_slug').val(txtVal);
		});

		$("#removePdfSubCat").on('click',function(){
			$("#loader-overlay").show();
			var This = $(this);
			$.ajax({
			    type: "POST",
			    dataType: "json",
			    data: {cat_id: $(this).attr('sub_cat_id')},
			    url: "<?php echo Yii::app()->baseUrl; ?>/subcategories/RemovePdf/",
			    success: function(data) {
			        if(data.status =="success"){
			        	This.parents('.pdfIconDivBox').hide();
						$("#loader-overlay").hide();
			        }
			    },
			});
		})
	});
</script>