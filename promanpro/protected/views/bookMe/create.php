<?php
/* @var $this SiteController */
/* @var $model user */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Create Book Me Schedule';
$this->breadcrumbs=array(
	'Create Book Me Schedule',
);
?>
<br></br>
<h1>Create Book Me Schedule</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'idp'=>$idp)); ?>