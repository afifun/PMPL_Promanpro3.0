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
    <!--<p class="note"> <span class="required">username are required</span></p>-->

        <?php // echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Username'); ?>
        <!--<?php echo $form->textField($model, 'idUser'); ?>-->
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model' => $model,
            'attribute' => 'idUser',
            'name' => 'normal',
            'source' => $Nama,
            // additional javascript options for the autocomplete plugin
            'options' => array(
                'minLength' => '1',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;',
            ),
        )); //echo '<p class="note"> <span class="required">username are required</span></p>';
//        echo '<p class="note"> <span class="required">username are required</span></p>';
//        echo '</html>';
        ?> 
        <?php echo $form->error($model, 'idUser'); ?>
    </div>
    
<!--    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'idUser'); ?>
        <?php
        echo CHtml::dropDownList('idUser','', array(1=>'Wait',2=>'Approve',3=>'Reject'));
        ?>
        <?php echo $form->error($model, ''); ?>
    </div>-->

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
         <?php //echo CHtml::Button('Cancel',array('onClick'=> 'js:history.go(-1);returnFalse;')); ?>
         <?php echo CHtml::Button('Cancel',array('submit'=> array('project/'.$id))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->