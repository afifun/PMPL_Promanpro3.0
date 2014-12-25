<?php
/* @var $this InvitationController */
/* @var $model invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List invitation', 'url'=>array('index')),
	//array('label'=>'Create invitation', 'url'=>array('create')),
	array('label'=>'View invitation', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage invitation', 'url'=>array('admin')),
);
?>
<br></br>
<h1>Update invitation <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form_2', array('model'=>$model)); ?>