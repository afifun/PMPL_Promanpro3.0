<?php
/* @var $this SiteController */
/* @var $model user */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Create Meet Up Schedule';
$this->breadcrumbs=array(
	'Create Meet Up Schedule',
);
?>
<br></br>
<h1>Create Meet Up Schedule</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'idp'=>$idp)); ?>