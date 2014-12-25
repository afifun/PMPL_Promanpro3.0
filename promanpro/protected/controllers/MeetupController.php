<?php

class MeetupController extends Controller {
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
    public function accessRules()
	{
		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','index','view','meetingUp'),
				'users'=>array('@'),
			),
			//array('allow', // allow admin user to perform 'admin' and 'delete' actions
				//'actions'=>array('admin','delete'),
				//'users'=>array('admin'),
			//),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionCreate($idProject) {
        $model = new Meetup;
        if (isset($_POST['Meetup'])) {
            $model->attributes = $_POST['Meetup'];
            $model->IdProject = $idProject;
            if ($model->validate()) {
                $model->save();
                //return;
                $this->redirect(array('project/'.$idProject));
            }
        }
        $this->render('Create', array('model' => $model, 'idp' => $idProject));
    }
    
    public function actionMeetingUp($IdMeetup){
        $row = Meetup::model()->findByAttributes(array('IdMeetup'=>$IdMeetup));
            $noProject = $row->IdProject;
        if (isset($_POST['meetingUp'])) {
            $tanggalAwal = strtotime(Meetup::model()->findByAttributes(array('IdMeetup' => $IdMeetup))->StartDay);
            $tanggalAkhir = strtoTime(Meetup::model()->findByAttributes(array('IdMeetup' => $IdMeetup))->EndDay);
            $detik = $tanggalAkhir - $tanggalAwal;
            $hari = ($detik / 86400) + 1;            
            $jamAwal = strtotime(Meetup::model()->findByAttributes(array('IdMeetup' => $IdMeetup))->StartTime);
            $jamAkhir = strtotime(Meetup::model()->findByAttributes(array('IdMeetup' => $IdMeetup))->EndTime);
            $nama = Blockmeetup::model()->findAllByAttributes(array('Pemesan'=>Yii::app()->user->name, 'IdMeetUp'=>$IdMeetup));
            if($nama!=null){
                Blockmeetup::model()->deleteAllByAttributes(array('Pemesan'=>Yii::app()->user->name, 'IdMeetUp'=>$IdMeetup));
            }
            $detik2 = ($jamAkhir - $jamAwal)/3600;
            for ($i = 0; $i < $detik2; $i++) {
                for ($j = 0; $j < $hari; $j++) {
//                    if(isset($_POST['koordinat['.$i.']['.$j.']'])){
                    if(isset($_POST['koordinat'][$i][$j])){
                        $model = new Blockmeetup;
                        $model->IdMeetUp = $IdMeetup;
                        $model->KoorX = $j;
                        $model->KoorY = $i;
                        $model->Pemesan = Yii::app()->user->name;
                        $model->save();
                    }
                }
            }
            
            //$this->redirect(array('project/'.$noProject));
            $this->refresh();
        }
        $this->render('meetingUp',array('IdMeetup'=>$IdMeetup, 'id'=>$row->IdProject));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}