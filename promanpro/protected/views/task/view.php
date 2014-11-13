<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->Name,
);

$this->menu=array(
	//array('label'=>'List Task', 'url'=>array('index')),
	//array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Update Task', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Task', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>
<br></br>
<h1><?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'ID',
		//'pID',
		//'ID',
		//'Name',
		'Description',
		'PJ',
		'Progress',
		'Start_Time',
		'End_Time',
	),
)); ?>
