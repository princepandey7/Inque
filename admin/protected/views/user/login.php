<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'Username')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>'Password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<!-- <div class="row rememberMe">
		<?php //echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-default submit')); ?>
	</div>

<?php $this->endWidget(); ?>

<!-- 
<form>
<h1>Login Form</h1>
<div>
<input type="text" class="form-control" placeholder="Username" required="" />
</div>
<div>
<input type="password" class="form-control" placeholder="Password" required="" />
</div>
<div>
<a class="btn btn-default submit" href="index.html">Log in</a>
<a class="reset_pass" href="#">Lost your password?</a>
</div>

<div class="clearfix"></div>

<div class="separator">
<p class="change_link">New to site?
  <a href="#signup" class="to_register"> Create Account </a>
</p>

<div class="clearfix"></div>
<br />

<div>
  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
</div>
</div>
</form> -->