<?php

class InvitationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','index','view'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
            $model=new invitation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

            if(isset($_POST['invitation']))
		{
                    if(empty($_POST['invitation']['idUser'])){
                        $this->redirect(array('invitation/create','id'=>$id));
                    }
                    
                   
			$namauser=$_POST['invitation']['idUser'];
                        $modelN = User::model()->findByAttributes(array('Username'=>$namauser));
                        if($modelN==null || $modelN->isActive==0){
                            $model->addError('idUser', 'user is not available');
                        }
                        else{
                            $iduser = $modelN->ID;
                            $userPar = Participant::model()->findAllByAttributes(array('idUser'=>$iduser));
                            $modPar=NULL;
                            foreach($userPar as $user){
                                if($user->idUser==$iduser&&$user->idProject==$id){
                                    $modPar=$user;
                                }
                            }
                            if($modPar==null){
                                $model->idProject=$id;
                                $model->idUser=$iduser;
                                $model->status=1;
                                if($model->save()){
                                    $this->redirect(array('project/view','id'=>$id));
                                }
                            }
                            else{
                                $model->addError('idUser', 'user is already a member');
                            }
                        }
                }
                $Nama = array();
                $modelNama = User::model()->findAll();
                
                foreach($modelNama as $user){
                    $Nama[] = $user->Username;
                }
                $this->render('create',array(
			'model'=>$model,
                        'Nama'=>$Nama,
                    'id'=>$id
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $model=$this->loadModel($id);
//            echo "";die();
//            $Nama = array();
//                $modelNama = User::model()->findAll();
//                
//                foreach($modelNama as $user){
//                    $Nama[] = $user->Username;
//                }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['status']))
		{
//                    echo "";die();
//			$model->attributes=$_POST['invitation'];
                        //$model->status=$_POST['status'];
                        $s = $_POST['status'];
//                        echo $s;die();
////                        $g = $_POST['invintation']['idUser'];
//                        echo $model->status; $model->save();$this->redirect(array('index'));
//                        
                        $model->status=$s;
			if($model->save() && $s==2){
                            $modelPart=new Participant;
                            $modelPart->idUser=$model->idUser;
                            $modelPart->isAdmin=0;
                            $modelPart->idProject=$model->idProject;
                            $modelPart->save();
                            $this->loadModel($id)->delete();
                            $this->redirect(array('index'));
                        }
                        elseif($s==3){
                            $this->loadModel($id)->delete();
                            $this->redirect(array('index'));
                        }
		}

               $this->render('update',array(
			'model'=>$model,
                        //'Nama'=>$Nama,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
           $this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                     $this->redirect(Yii::app()->user->returnUrl=array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
             $criteria=new CDbCriteria;
             $criteria->addCondition('idUser='.Yii::app()->user->id);
             $criteria->addCondition('status=1');
            $dataProvider=new CActiveDataProvider('invitation',array(
                    'criteria'=>$criteria,
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new invitation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['invitation']))
			$model->attributes=$_GET['invitation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return invitation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=invitation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param invitation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invitation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
