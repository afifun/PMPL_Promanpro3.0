<?php
/* @var $this UndanganController */
/* @var $model Undangan */

$this->breadcrumbs=array(
	'Undangans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Undangan', 'url'=>array('index')),
	array('label'=>'Manage Undangan', 'url'=>array('admin')),
);
?>

<h1>Create Undangan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>