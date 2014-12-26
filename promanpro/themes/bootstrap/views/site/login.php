<style type="text/css">
.center {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%) }

.border{
	border-style: solid;
    border-width: 1px;
    border-color: #48c9b0;
    padding-top: 30px;
    padding-right: 80px;
}
</style>
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<br></br>


<div class="form">
	<div class="center">
<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="border">
	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password',array(
    )); ?>

	<!--<?php echo $form->checkBoxRow($model,'rememberMe'); ?>-->

	<div class="form-actions" style="border-top:none; background-color:#ecf0f1;">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Login',
        )); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>