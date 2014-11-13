<?php
/* @var $this ParticipantController */
/* @var $model Participant */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'participant-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idProject'); ?>
		<?php echo $form->textField($model,'idProject'); ?>
		<?php echo $form->error($model,'idProject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUser'); ?>
		<?php echo $form->textField($model,'idUser'); ?>
		<?php echo $form->error($model,'idUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isAdmin'); ?>
		<?php echo $form->textField($model,'isAdmin'); ?>
		<?php echo $form->error($model,'isAdmin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->