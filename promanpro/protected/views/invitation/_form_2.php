<?php
/* @var $this InvitationController */
/* @var $model invitation */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'invitation-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

        <?php echo $form->errorSummary($model); ?>


    
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <!--<?php echo $form->textField($model, 'idUser'); ?>-->
        <?php
        echo CHtml::dropDownList('status','', array(1=>'Wait',2=>'Approve',3=>'Reject'));
        ?>
        <?php echo $form->error($model, ''); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
         <?php echo CHtml::Button('Cancel',array('submit'=> array('project/index'))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->