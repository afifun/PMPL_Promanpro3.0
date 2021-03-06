<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>20,'maxlength'=>20)); ?>
		<!--<?php echo $form->error($model,'Name'); ?>-->
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<!--<?php echo $form->error($model,'Description'); ?>-->
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Start_Date'); ?>
		<?php // echo $form->textField($model,'Start_Date',array('placeholder'=>'YYYY-MM-DD')); ?>
            <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'Project[Start_Date]',
    'value' => $model->Start_Date,
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
    'options' => array(
                'dateFormat' => 'yy-mm-dd',
            )
));?>
		<!--<?php echo $form->error($model,'Start_Date'); ?>-->
                
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'End_Date'); ?>
		<?php // echo $form->textField($model,'Start_Date',array('placeholder'=>'YYYY-MM-DD')); ?>
            <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'Project[End_Date]',
    'value' => $model->End_Date,
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
    'options' => array(
                'dateFormat' => 'yy-mm-dd',
            )
));?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
            <?php echo CHtml::Button('Cancel',array('submit'=> array('project/'.$id))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->