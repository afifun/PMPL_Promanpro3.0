<?php
/* @var $this InvitationController */
/* @var $model invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List invitation', 'url'=>array('index')),
	//array('label'=>'Create invitation', 'url'=>array('create')),
	array('label'=>'Update invitation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete invitation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage invitation', 'url'=>array('admin')),
);
?>
<br></br>
<h1>View invitation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'status',
                //'idProject',
                //'idUser'
	),
)); ?>
