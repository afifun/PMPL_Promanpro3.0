<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 
	$actionId = $this->action->id;

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>20,'maxlength'=>20, 'placeholder' => 'Your name' )); ?>
		<!--<?php echo $form->error($model,'Name'); ?>-->
	</div>

        <div class="row">
            <?php echo $form->labelEx($model,'Username'); ?>
		<?php echo $form->textField($model,'Username',array('size'=>20,'maxlength'=>20,'placeholder'=>'Alphanumerics with no space')); ?>
		<!--<?php echo $form->error($model,'Username'); ?>-->
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model, 'Password',array('size'=>20,'maxlength'=>20,'placeholder'=>'6-20 characters')); ?>
		<!--<?php echo $form->error($model,'Password'); ?>-->
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Repassword'); ?>
		<?php echo $form->passwordField($model,'Repassword',array('size'=>20,'maxlength'=>20,'placeholder'=>'6-20 characters')); ?>		<!--<?php echo $form->error($model,'Password'); ?>-->
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>40,'maxlength'=>40,'placeholder'=>'Your email')); ?>
		<!--<?php echo $form->error($model,'Email'); ?>-->
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::Button('Cancel',array('submit'=>array('site/index'))); ?>
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->