<?php
/* @var $this UndanganController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Undangans',
);

$this->menu=array(
	array('label'=>'Create Undangan', 'url'=>array('create')),
	array('label'=>'Manage Undangan', 'url'=>array('admin')),
);
?>

<h1>Undangans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
