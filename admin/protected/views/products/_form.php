<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
			<div class="x_title">
				<h2><?php echo $product_title; ?> <small></small></h2>
				<div class="navbar-right">
					<a href="<?php echo Yii::app()->createUrl("/products/index"); ?>" class="btn btn-success btn-sm">Back To Product</a> 
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'products-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data')
				)); ?>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'title', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'title'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'ebds', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'ebds',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'ebds'); ?>
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
								$subCatDetails = CHtml::listData(Subcategories::getActiveSubCategory($model->categories_id), 'sub_categories_id','sub_categories_name');

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
						<?php echo $form->fileField($model,'upload_product_pdf',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>true)); 
							if(!empty($model->upload_product_pdf)){
								echo '<div class="productIconDivBox"> <img src="../../images/pdfIcon.png" style="width:30px" />'. RandomHelper::getChopedPdfString($model->upload_product_pdf) .'<a product_id= "'. $model->id .'" status="pdf" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
							}
						?>
						<?php echo $form->error($model,'upload_product_pdf'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php
					 echo $form->labelEx($model,'product_main_image', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						if(!empty($model->product_main_image)){
							echo '<div class="productIconDivBox"> <img src="../../../assets/images/products/'.$model->product_main_image.'" width="200" /> <a product_id= "'. $model->id .'" status="main_img" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
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
							echo '<div class="productIconDivBox"> <img src="../../../assets/images/products/thum/'.$model->product_thum_image.'" width="200" /> <a product_id= "'. $model->id .'" status="thum_img" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div> ';
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
							echo '<div class="productIconDivBox"> <img src="../../../assets/images/products/kit-package/'.$model->kit_package_image.'" width="200" /> <a product_id= "'. $model->id .'" status="kit_img" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
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
							echo ' <div class="productIconDivBox"> <img src="../../../assets/images/products/planning/'.$model->planning_image.'" width="200" /> <a product_id= "'. $model->id .'" status="plan_img" class="removeImgIcon"> <img src="../../images/remove.png" style="width:20px" /> </a> </div>';
						}
						echo $form->fileField($model,'planning_image',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'planning_image'); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success')); ?>
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
		});

		$(".removeImgIcon").on('click',function(){
			$("#loader-overlay").show();
			var This = $(this);
			$.ajax({
			    type: "POST",
			    dataType: "json",
			    data: {product_id : $(this).attr('product_id'), product_status: $(this).attr('status') },
			    url: "<?php echo Yii::app()->baseUrl; ?>/products/RemovePdf/",
			    success: function(data) {
			        if(data.status =="success"){
			        	This.parents('.productIconDivBox').hide();
						$("#loader-overlay").hide();
			        }
			    },
			});
		})
	});
</script>