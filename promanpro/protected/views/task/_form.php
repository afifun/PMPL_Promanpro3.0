<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'task-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'pID'); ?>
		<?php echo $form->textField($model,'pID'); ?>
		<?php echo $form->error($model,'pID'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name', array('size'=>20,'maxlength'=>20,'placeholder'=>'name')); ?>
		<?php //echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description', array('rows' => 6, 'cols' => 50, 'placeholder' => 'describe your task')); ?>
		<?php //echo $form->error($model,'Description'); ?>
	</div>

 

  

    <div class="row">
<?php echo $form->labelEx($model, 'PJ'); ?>
<?php echo $form->textField($model, 'PJ', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'assigned to')); ?>
    <?php //echo $form->error($model, 'PJ'); ?>
    </div>


    <div class="row">
<?php echo $form->labelEx($model, 'Progress'); ?>
<?php echo $form->textField($model, 'Progress', array('placeholder' => '1 - 100')); ?>
        <?php //echo $form->error($model, 'Progress'); ?>
    </div>

       <div class="row">
        <?php echo $form->labelEx($model, 'Start_Date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Task[Start_Time]',
            'value' => $model->Start_Time,
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
                'placeholder' => 'yyyy-mm-dd' 
            ),
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
            )
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'End_Date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Task[End_Time]',
            'value' => $model->End_Time,
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
                'placeholder' => 'yyyy-mm-dd' 
            ),
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
            )
        ));
        ?>
        
    </div>


    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
         <?php echo CHtml::Button('Cancel',array('submit'=>array('project/'.$id))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->