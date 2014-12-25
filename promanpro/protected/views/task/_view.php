<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<!--<?php echo CHtml::encode($data->Name); ?>-->
        <?php echo CHtml::link(CHtml::encode($data->Name), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PJ')); ?>:</b>
	<?php echo CHtml::encode($data->PJ); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Start_Time')); ?>:</b>
	<?php echo CHtml::encode($data->Start_Time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Progress')); ?>:</b>
        <?php 
            echo CHtml::encode($data->Progress); 
            
        ?>%
        <br></br>
        <?php
        $s = intval($data->Progress) ; 
        $this->widget('zii.widgets.jui.CJuiProgressBar', array(
	        'value'=>$s, //value in percent
	        'htmlOptions'=>array(
	                'style'=>'height:20px;',
                        'style'=>'width:500px;'
	        ),
	));
        ?>

</div>