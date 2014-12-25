<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->Name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Task', 'url'=>array('index')),
	//array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'View Task', 'url'=>array('view', 'id'=>$model->ID)),
	//array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>
<br></br>
<h1>Update Task <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'id'=>$id)); ?>