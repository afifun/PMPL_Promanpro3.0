<?php
/* @var $this UndanganController */
/* @var $model Undangan */

$this->breadcrumbs=array(
	'Undangans'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Undangan', 'url'=>array('index')),
	array('label'=>'Create Undangan', 'url'=>array('create')),
	array('label'=>'View Undangan', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Undangan', 'url'=>array('admin')),
);
?>

<h1>Update Undangan <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>