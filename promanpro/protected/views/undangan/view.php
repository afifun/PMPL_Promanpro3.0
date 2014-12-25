<?php
/* @var $this UndanganController */
/* @var $model Undangan */

$this->breadcrumbs=array(
	'Undangans'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Undangan', 'url'=>array('index')),
	array('label'=>'Create Undangan', 'url'=>array('create')),
	array('label'=>'Update Undangan', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Undangan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Undangan', 'url'=>array('admin')),
);
?>

<h1>View Undangan #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'Status',
	),
)); ?>
