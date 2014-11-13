<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->Name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Project', 'url'=>array('index')),
	//array('label'=>'Create Project', 'url'=>array('create')),
	//array('label'=>'View Project', 'url'=>array('view', 'id'=>$model->ID)),
	//array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>
<br></br>
<h1>Update Project</h1>

<?php $this->renderPartial('_form_2', array('model'=>$model,'id'=>$id)); ?>