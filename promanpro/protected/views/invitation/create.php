<?php
/* @var $this InvitationController */
/* @var $model invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List invitation', 'url'=>array('index')),
	//array('label'=>'Manage invitation', 'url'=>array('admin')),
);
?>
<br></br>
<h1>Create invitation</h1>

<?php $this->renderPartial('_form_1', array('model'=>$model,'Nama'=>$Nama, 'id'=>$id)); ?>