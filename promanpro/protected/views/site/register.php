<?php
/* @var $this SiteController */
/* @var $model user */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);
?>
<br></br>
<h1>Register</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>