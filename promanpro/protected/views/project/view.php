<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->Name,
);

$this->menu=array(
	//array('label'=>'List Project', 'url'=>array('index')),
	//array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->ID)),
    array('label'=>'Setting Project', 'url'=>array('setting', 'id'=>$model->ID)),
	//array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Create Task', 'url'=>array('task/create', 'id'=>$model->ID)),
        //array('label'=>'View Task', 'url'=>array('task/index', 'id'=>$model->ID)),
        array('label'=>'Create invitation', 'url'=>array('invitation/create', 'id'=>$model->ID)),
        //array('label'=>'View Participant', 'url'=>array('participant/index', 'id'=>$model->ID)),
     array('label'=>'Create Book Me', 'url'=>array('BookMe/create', 'idProject'=>$model->ID)),
    array('label'=>'Create Meet Up', 'url'=>array('Meetup/Create', 'idProject'=>$model->ID)),
        //array('label'=>'Manage Project', 'url'=>array('admin')),
);

$dataProvider2=new CActiveDataProvider('Participant',array(
                    'criteria'=>array(
                        'condition'=>'idProject='.$model->ID,
                    ),
));

?>
<br></br>
<h1><?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'ID',
		//'Name',
		'Description',
		'Status',
		'Start_Date',
		'End_Date',
		//'adminProject',
	),
)); ?>
<br />

<?php
$bm = '';
?>
<div id="footer">
    <?php
    //echo "<h6>Available BOOK ME Schedule(s):</h6>";
    $record = Bookme::model()->findAllByAttributes(array('IdProject'=>$model->ID));
    if($record!=null){
        for($i=0; $i<count($record); $i++){
             if($record[$i]->EndDate>=Date('Y-m-d')){
                  $linkid = $record[$i]->IdBookMe;
                //echo "<a href='../BookMe/bookingUp?idBookMe=".$linkid."'>Link ".$i."</a>";
                $nama = $record[$i]->Name;
                //echo "<a href='../BookMe/bookingUp?idBookMe=".$linkid."'>".($i+1).". ".$nama."</a>";
                $bm .= "<a href='../BookMe/bookingUp?idBookMe=".$linkid."' style=text-decoration:none;>".($i+1).". ".$nama."</a><button type=Submit; style=float:right;>Edit</button><br>" ;
                //echo "<br>";
             }
        }
    } else {
        //echo "<p>No BOOK ME Schedule available</p>";
        $bm .= "<p>No BOOK ME Schedule available</p>";
    }
    ?>
    <?php
    $mu = '';
    //echo "<h6>Available MEET UP Schedule(s):</h6>";
    $record = Meetup::model()->findAllByAttributes(array('IdProject'=>$model->ID));
    //$record2 =  $record::model()->findByAttributes(array('IdProject'=>17));
    if($record!=null){
        for($i=0; $i<count($record); $i++){
            if($record[$i]->EndDay>=Date('Y-m-d')){
                $linkid = $record[$i]->IdMeetup;
                $nama = $record[$i]->Name;
    //            echo "<a href='../Meetup/meetingUp?IdMeetup=".$linkid."&idp=".$model->ID."'>".($i+1).". ".$nama."</a>";
    //            echo "<br>";
                $mu .= "<a href='../Meetup/meetingUp?IdMeetup=".$linkid."&idp=".$model->ID."' style=text-decoration:none;>".($i+1).". ".$nama."</a><button type=Submit; style=float:right;>Edit</button><br>";
            }
        }
    } else {
        //echo "<p>No MEET UP Schedule available</p>";
        $mu .= "<p>No MEET UP Schedule available</p>";
    }
    ?>
</div>
<br />

<?php

ob_start();
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider2,
	'itemView'=>'/participant/_view',
));
$viewpar = ob_get_contents();
//$progressBar2= ob_get_contents();
ob_end_clean();
$progress = array();
$namatask = array();
$idtask = array();
$modtask = Task::model()->findAll();
foreach($modtask as $task){
    if($task->pID==$model->ID){
        $progress[] = $task->Progress;
        $namatask[] = $task->Name;
        $idtask[] = $task->ID;
    }
}
$html="<html><table style=width:50px>";
$k=30;
for($i=0; $i<sizeof($progress); $i++){
    $html .= '<tr><td><a href=../task/view/'.$idtask[$i].'>'.$namatask[$i].'</href></td><td><progress value='.intval($progress[$i]).' max=100 style=width:500px;height: 30px;></progress></td><td><label>'.$progress[$i].'%</label></td></tr>';
}
$html .="</table></html>";

$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => array(
	        'Timeline' => array(
                    "content" => $html,
                    //'content' => $progressBar2
                ),
                'Participant' => array(
                    "content" => $viewpar,
                ),
                'Book Me' => array(
                    "content" => $bm,
                ),
                'Meet Up' => array(
                    "content" => $mu,
                ),
	    ),
	    // additional javascript options for the tabs plugin
	    'options' => array(
	        'collapsible' => true,
	    ),
	));
?> 
<br />


