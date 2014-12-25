<?php
/* @var $this InvitationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Invitations',
);

$this->menu=array(
	//array('label'=>'Create invitation', 'url'=>array('create')),
	//array('label'=>'Manage invitation', 'url'=>array('admin')),
);
?>
<br></br>
<h1>Invitations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
