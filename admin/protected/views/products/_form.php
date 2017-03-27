<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
			<div class="x_title">
				<h2><?php echo $product_title; ?> <small></small></h2>
				<div class="navbar-right">
					<a href="<?php echo Yii::app()->createUrl("/products/index"); ?>" class="btn btn-success btn-sm">Back To Gallery</a> 
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'products-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data')
				)); ?>
				<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->
				<?php //echo $form->errorSummary($model); ?>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'title', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'title'); ?>
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
					<?php echo $form->labelEx($model,'subcategories_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
							$subCatDetails = array();
							if( !empty( $model->subcategories_id ) ){
								$subCatDetails = CHtml::listData(SubCategories::getActiveSubCategory($model->subcategories_id), 'sub_categories_id','sub_categories_name');
							}
							echo $form->dropDownList($model, 'subcategories_id', $subCatDetails, array('prompt' => '--Select Sub Category Type--', 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'subcategories_id'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'size', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'size',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'size'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'finish', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'finish',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'finish'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'height', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'height',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'height'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'material', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'material',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'material'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'features', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textArea($model,'features',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'features'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'upload_product_pdf', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->fileField($model,'upload_product_pdf',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>true)); ?>
						<?php echo $form->error($model,'upload_product_pdf'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php
					 echo $form->labelEx($model,'product_main_image', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->product_main_image)){
							echo '<img src="../../images/products/'.$model->product_main_image.'" width="200" />';
							echo $form->hiddenField($model, 'product_main_image', array('value'=>$model->product_main_image));
						}
						echo $form->fileField($model,'product_main_image',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'product_main_image'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php
					echo $form->labelEx($model,'product_thum_image', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->product_thum_image)){
							echo '<img src="../../images/products/thum/'.$model->product_thum_image.'" width="200" />';
							echo $form->hiddenField($model, 'product_thum_image', array('value'=>$model->product_thum_image));
						}
						echo $form->fileField($model,'product_thum_image',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'product_thum_image'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'kit_package_image', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->kit_package_image)){
							echo '<img src="../../images/products/kit-package/'.$model->kit_package_image.'" width="200" />';
							echo $form->hiddenField($model, 'kit_package_image', array('value'=>$model->kit_package_image));
						}
						echo $form->fileField($model,'kit_package_image',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'kit_package_image'); ?>
					</div>
				</div>
				
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'planning_image', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->planning_image)){
							echo '<img src="../../images/products/planning/'.$model->planning_image.'" width="200" />';
							echo $form->hiddenField($model, 'planning_image', array('value'=>$model->planning_image));
						}
						echo $form->fileField($model,'planning_image',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'planning_image'); ?>
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
	$(document).ready(function(){
		$(document).on('change','#Products_categories_id', function(){
			var strCatId = $(this).find('option:selected').val();
			if( strCatId != ''){
				$("#loader-overlay").show();
				$.ajax({
	                type: "POST",
	                dataType: "json",
	                data: {cat_id: strCatId},
	                url: "<?php echo Yii::app()->baseUrl; ?>/products/getSubCatDetails/",
	                success: function(data) {
	                    if(data.status =="success"){
	                    	$("#Products_subcategories_id").empty();
	                    	var items="";
							$.each(data.update, function(index, item)
							{
								items += "<option value='"+ item.sub_categories_id +"' >" + item.sub_categories_name + "</option>";
							});
							$("#Products_subcategories_id").html(items);
							$("#loader-overlay").hide();
	                    }
	                },
	            });
			} else {
				$("#Products_subcategories_id").empty();
				$("#Products_subcategories_id").html("<option value=''>--Select Sub Category Type--</option>");
			}
		})
	});

</script>