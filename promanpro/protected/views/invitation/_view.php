<?php
/* @var $this InvitationController */
/* @var $data invitation */
?>

<div class="view">

	<!--<b><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>-->
	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<!--<br />-->
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->status), array('view', 'id'=>$data->id)); ?>
	<br 
            -->
        <?php 
//            $Nama = array();
//                $modelNama = User::model()->findAll();
//                
//                foreach($modelNama as $user){
//                    if($user->Username == $data->idUser){
//                        $Nama[]=$user->Username;
//                    }
//                }
//                echo $Nama[0]; 
        ?>
<!--            
        <b><?php //echo CHtml::encode($data->getAttributeLabel('idProject')); ?>:</b>
	<?php //echo CHtml::encode($data->idProject); ?>
	<br />
        -->
        <b><?php echo CHtml::encode('Project Name'); ?>:</b>
	<?php 
        $modPro = Project::model()->findByPk($data->idProject);
        $nm = $modPro->Name;
        //echo CHtml::encode($nm); 
        echo CHtml::link(CHtml::encode($nm), array('update', 'id'=>$data->id));
        ?>
	<br />
        
        <b><?php // echo CHtml::encode($data->getAttributeLabel('idUser')); 
        ?></b>
        
	<?php //echo CHtml::encode($Nama[0]); ?>
	<br />


</div>