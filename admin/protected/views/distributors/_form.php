<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
			<div class="x_title">
				<h2><?php echo $distributor_title; ?> <small></small></h2>
				<div class="navbar-right">
					<a href="<?php echo Yii::app()->createUrl("/distributors/index"); ?>" class="btn btn-success btn-sm">Back To Distributor</a> 
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'distributor-form',
					'enableAjaxValidation'=>false,
					// 'htmlOptions'=>array('enctype'=>'multipart/form-data')
				)); ?>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'name'); ?>
					</div>
				</div>
				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'email', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'telephone_no', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textField($model,'telephone_no',array('size'=>60,'maxlength'=>100, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'telephone_no'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'address', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50, 'class'=>'form-control col-md-7 col-xs-12')); ?>
						<?php echo $form->error($model,'address'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'country', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
							echo $form->dropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'name'), array('prompt' => '--Select Country Name--', 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'country'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'state', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
							$subStateDetails = array();
							if( !empty( $model->state ) ){
								$criteriaState=new CDbCriteria();
								$criteriaState->addInCondition('country_id', array( $model->country ));
								$objStateDetails = States::model()->findAll($criteriaState);
								$subStateDetails = CHtml::listData( $objStateDetails , 'id','name');
							}
							echo $form->dropDownList($model, 'state', $subStateDetails, array('prompt' => '--Select State --', 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'state'); ?>
					</div>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->labelEx($model,'city', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
							$subCityDetails = array();
							if( !empty( $model->city ) ){
								$criteriaCity=new CDbCriteria();
								$criteriaCity->addInCondition('state_id', array( $model->state ));
								$objCityDetails = Cities::model()->findAll($criteriaCity);
								$subCityDetails = CHtml::listData($objCityDetails, 'id','name');
							}
							echo $form->dropDownList($model, 'city', $subCityDetails, array('prompt' => '--Select Cities --', 'class' => 'form-control')); ?>
						<?php echo $form->error($model,'state'); ?>
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
	$(document).ready(function(){
		$(document).on('change','#Distributors_country', function(){
			var strCountryId = $(this).find('option:selected').val();
			if( strCountryId != ''){
				$("#loader-overlay").show();
				$.ajax({
	                type: "POST",
	                dataType: "json",
	                data: {country_id: strCountryId},
	                url: "<?php echo Yii::app()->baseUrl; ?>/distributors/getStateDetails/",
	                success: function(data) {
	                    if(data.status =="success"){
	                    	$("#Distributors_state").empty();
	                    	var items="";
							$.each(data.update, function(index, item)
							{
								items += "<option value='"+ item.id +"' >" + item.name + "</option>";
							});
							$("#Distributors_state").html(items);
							$("#Distributors_state").trigger('change');
							$("#loader-overlay").hide();
	                    }
	                },
	            });
			} else {
				$("#Distributors_state").empty();
				$("#Distributors_state").html("<option value=''>--Select State --</option>");
			}
		})



		$(document).on('change','#Distributors_state', function(){
			var strStateId = $(this).find('option:selected').val();
			if( strStateId != ''){
				$("#loader-overlay").show();
				$.ajax({
	                type: "POST",
	                dataType: "json",
	                data: {state_id: strStateId},
	                url: "<?php echo Yii::app()->baseUrl; ?>/distributors/getCityDetails/",
	                success: function(data) {
	                    if(data.status =="success"){
	                    	$("#Distributor_city").empty();
	                    	var items="";
							$.each(data.update, function(index, item)
							{
								items += "<option value='"+ item.id +"' >" + item.name + "</option>";
							});
							$("#Distributors_city").html(items);
							$("#loader-overlay").hide();
	                    }
	                },
	            });
			} else {
				$("#Distributors_city").empty();
				$("#Distributors_city").html("<option value=''>--Select City --</option>");
			}
		})

	});

</script>