<?php
/* @var $this MeetupController */
/* @var $model Meetup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'meetup-Create-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name'); ?>
		<?php // echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model, 'Description', array('rows' => 6, 'cols' => 50)); ?>
		<?php // echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model, 'StartDay'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Meetup[StartDay]',
            'value' => $model->StartDay,
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
            )
        ));
        ?>
        <!--<?php // echo $form->error($model, 'StartDay'); ?>-->

    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'EndDay'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Meetup[EndDay]',
            'value' => $model->EndDay,
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
            )
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'StartTime'); ?>
<?php echo $form->dropDownList($model, 'StartTime', array(
    '00:00'=>'00:00',
    '01:00'=>'01:00',
    '02:00'=>'02:00',
    '03:00'=>'03:00',
    '04:00'=>'04:00',
    '05:00'=>'05:00',
    '06:00'=>'06:00',
    '07:00'=>'07:00',
    '08:00'=>'08:00',
    '09:00'=>'09:00',
    '10:00'=>'10:00',
    '11:00'=>'11:00',
    '12:00'=>'12:00',
    '13:00'=>'13:00',
    '14:00'=>'14:00',
    '15:00'=>'15:00',
    '16:00'=>'16:00',
    '17:00'=>'17:00',
    '18:00'=>'18:00',
    '19:00'=>'19:00',
    '20:00'=>'20:00',
    '21:00'=>'21:00',
    '22:00'=>'22:00',
    '23:00'=>'23:00')); ?>
<?php // echo $form->error($model, 'StartTime'); ?>
    </div>
        
        <div class="row">
        <?php echo $form->labelEx($model, 'EndTime'); ?>
<?php echo $form->dropDownList($model, 'EndTime', array(
    '00:00'=>'00:00',
    '01:00'=>'01:00',
    '02:00'=>'02:00',
    '03:00'=>'03:00',
    '04:00'=>'04:00',
    '05:00'=>'05:00',
    '06:00'=>'06:00',
    '07:00'=>'07:00',
    '08:00'=>'08:00',
    '09:00'=>'09:00',
    '10:00'=>'10:00',
    '11:00'=>'11:00',
    '12:00'=>'12:00',
    '13:00'=>'13:00',
    '14:00'=>'14:00',
    '15:00'=>'15:00',
    '16:00'=>'16:00',
    '17:00'=>'17:00',
    '18:00'=>'18:00',
    '19:00'=>'19:00',
    '20:00'=>'20:00',
    '21:00'=>'21:00',
    '22:00'=>'22:00',
    '23:00'=>'23:00')); ?>
<?php // echo $form->error($model, 'EndTime'); ?>
    </div>

        <?php //echo $idp;?>

	<div class="row buttons">
<?php echo CHtml::submitButton('Create'); ?>
    <?php echo CHtml::Button('Cancel',array('submit'=> array('project/'.$idp.''))); ?>
            <?php //echo CHtml::Button('Cancel',array('onClick'=> 'js:history.go(-1);returnFalse;')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->