<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Login',
);
?>
<br />
<h3><?php
echo $message;
?></h3>
<h3><?php
echo CHtml::Button('Back to project',array('onClick'=> 'js:history.go(-1);returnFalse;'));
?></h3>