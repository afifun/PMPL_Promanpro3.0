<?php

class BookMeController extends Controller {
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
				'actions'=>array('create','update','delete','index','view','bookingUp','busyTime'),
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
        $model = new Bookme;

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='bookme-Create-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */
       

        if (isset($_POST['Bookme'])) {
            $model->attributes = $_POST['Bookme'];
            $model->IdProject = $idProject;
            if ($model->validate()) {
                $model->save();
                //return;
                $this->redirect(array('busyTime', 'idBookMe' => $model->IdBookMe));
            }
        }
        $this->render('Create', array('model' => $model, 'idp' => $idProject));
    }
    
    public function actionBookingUp($idBookMe){
        $row = Bookme::model()->findByAttributes(array('IdBookMe'=>$idBookMe));
            $noProject = $row->IdProject;
        if(!empty($_POST)){
            $tanggalAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->StartDate);
            $tanggalAkhir = strtoTime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->EndDate);
            $detik = $tanggalAkhir - $tanggalAwal;
            $hari = ($detik / 86400) + 1;            
            $jamAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->StartTime);
            $jamAkhir = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->EndTime);
            $nama = Blockjam::model()->findByAttributes(array('Pemesan'=>Yii::app()->user->name, 'Status'=>'Booked', 'idBookMe'=>$idBookMe));
            if($nama!=null){
                Blockjam::model()->deleteAllByAttributes(array('Pemesan'=>Yii::app()->user->name, 'Status'=>'Booked', 'idBookMe'=>$idBookMe));
            }
            $detik2 = ($jamAkhir - $jamAwal)/3600;
            for ($i = 0; $i < $detik2; $i++) {
                for ($j = 0; $j < $hari; $j++) {
//                    if(isset($_POST['koordinat['.$i.']['.$j.']'])){
                    if(isset($_POST['posisi'][$i][$j])){
                        $model = new Blockjam;
                        $model->idBookMe = $idBookMe;
                        $model->KoorX = $j;
                        $model->KoorY = $i;
                        $model->Pemesan = Yii::app()->user->name;
                        $model->Status = "Booked";
                        $model->save();
                    }
                }
            }
            
            //$this->redirect(array('project/'.$noProject));
            $this->refresh();
        }
        $this->render('bookingUp',array('idBookMe'=>$idBookMe, 'id'=>$row->IdProject));
    }
    
    public function actionBusyTime($idBookMe) {  
        $row = Bookme::model()->findByAttributes(array('IdBookMe'=>$idBookMe));
            $noProject = $row->IdProject;
        if (isset($_POST['busyTime'])) {
            $tanggalAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->StartDate);
            $tanggalAkhir = strtoTime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->EndDate);
            $detik = $tanggalAkhir - $tanggalAwal;
            $hari = ($detik / 86400) + 1;            
            $jamAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->StartTime);
            $jamAkhir = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->EndTime);
            $detik2 = ($jamAkhir - $jamAwal)/3600;
            for ($i = 0; $i < $detik2; $i++) {
                for ($j = 0; $j < $hari; $j++) {
//                    if(isset($_POST['koordinat['.$i.']['.$j.']'])){
                    if(isset($_POST['koordinat'][$i][$j])){
                        $model = new Blockjam;
                        $model->idBookMe = $idBookMe;
                        $model->KoorX = $j;
                        $model->KoorY = $i;
                        $model->Pemesan = Yii::app()->user->name;
                        $model->Status = "BUSY";
                        $model->save();
                    }
                }
            }
            
            $this->redirect(array('project/'.$noProject));
            //$this->refresh();
            //echo "Data berhasil disimpan";
        }
        $this->render('busyTime',array('idBookMe'=>$idBookMe, 'idp'=>$row->IdProject));
    }

}