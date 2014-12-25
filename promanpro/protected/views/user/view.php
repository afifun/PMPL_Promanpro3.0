<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->Name,
);

if (Yii::app()->user->id == ($_GET["id"]))
                            {
                                $this->menu=array(
	
									array('label'=>'Edit Name', 'url'=>array('update', 'id'=>$model->ID)),
									array('label'=>'Change Password', 'url'=>array('update_password', 'id'=>$model->ID)),
								);
                            }

?>
<br></br>
<h1><?php echo $model->Username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'ID',
		'Username',
		'Name',
		'Email',
	),
)); ?>
