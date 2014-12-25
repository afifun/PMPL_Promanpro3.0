<?php
/* @var $this ParticipantController */
/* @var $data Participant */
?>

<div class="view">

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php //echo CHtml::encode($data->getAttributeLabel('idUser')); ?></b>
        <?php //echo CHtml::link(CHtml::encode($data->idUser), array('user/view', 'id'=>$data->idUser)); ?>
	<?php // echo CHtml::encode($data->idUser); ?>
	<!--<br />-->
        
        <b><?php //echo CHtml::encode('username'); ?></b>
        <?php 
        $model=User::model()->findByPk($data->idUser);
        //echo $model->Username;die();
        echo CHtml::link(CHtml::encode($model->Username), array('user/view', 'id'=>$data->idUser)); 
        ?>
	<?php // echo CHtml::encode($data->idUser); ?>
	<!--<br />-->

	<b><?php //echo CHtml::encode($data->getAttributeLabel('idProject')); ?></b>
	<?php //echo CHtml::encode($data->idProject); ?>
	<!--<br />-->

	<b><?php //echo CHtml::encode($data->getAttributeLabel('isAdmin')); ?></b>
	<?php //echo CHtml::encode($data->isAdmin); ?>
	<!--<br />-->
        <br></br>


</div>