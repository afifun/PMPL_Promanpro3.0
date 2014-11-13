<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="view">

    <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />
    -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<!--<?php echo CHtml::encode($data->Name); ?>-->
        <?php echo CHtml::link(CHtml::encode($data->Name), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Start_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Start_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('End_Date')); ?>:</b>
	<?php echo CHtml::encode($data->End_Date); ?>
	<br />
        <br></br>
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('adminProject')); ?>:</b>
	<?php echo CHtml::encode($data->adminProject); ?>
	<br />
-->


</div>