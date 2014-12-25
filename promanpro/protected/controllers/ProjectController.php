<?php

class ProjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        //public $i=0;

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
				'actions'=>array('setting','create','update','delete','index','view','createInvitation'),
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
	public function actionCreate()
	{
            $model=new Project;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                if(isset($_POST['Project']))
		{
                        $model->attributes=$_POST['Project'];
                        $model->adminProject=Yii::app()->user->id;
                        $model->Status='open';
                        
			if($model->save()){
                            $modelPart=new Participant;
                            $modelPart->idUser=Yii::app()->user->id;
                            $modelPart->isAdmin=1;
                            $modelPart->idProject=$model->ID;
                            $modelPart->save();
                            $this->redirect(array('view','id'=>$model->ID));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        public function actionCreateInvitation($id)
	{
            $model=new invitation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

           if(isset($_POST['invitation']))
		{
                   
			$model->attributes=$_POST['invitation'];
                        $model->idProject=$id;
                        $model->Status='open';
                        $model->idUser=$id;
                        if($model->save()){
                            
                            $this->redirect(array('invitation/view','id'=>$model->id));
                        }
                }
                $Nama = array();
                $modelNama = User::model()->findAll();
                
                foreach($modelNama as $user){
                    $Nama[] = $user->Username;
                }
		$this->render('create_i',array(
			'model'=>$model,
                        'Nama'=>$Nama,
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
            if($model->adminProject!=Yii::app()->user->id){
                $this->render('message',array('message'=>'you are not admin of this project'));
            }
            else{
                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
                    'id'=>$id
		));
            }
        }
        
        public function actionSetting($id){
            $model=$this->loadModel($id);
            if($model->adminProject!=Yii::app()->user->id){
                $this->render('message',array('message'=>'you are not admin of this project'));
            }
            else{
                if(isset($_POST['statusProject']))
		{
                    if($_POST['statusProject']==2){
                        $model->Status='closed';
                    }
                    elseif($_POST['statusProject']==1){
                        $model->Status='open';
                    }
                    else{
                        $model->delete();
                        $modelPro = Participant::model()->findAll();
                        $modelTask = Task::model()->findAll();

                        foreach($modelPro as $pro){
                            $idu = $pro->idProject;
                            if($idu==$id){
                                $pro->delete();
                            }
                        }
                        foreach($modelTask as $prot){
                            $idu = $prot->idProject;
                            if($idu==$id){
                                $prot->delete();
                            }
                        }
                        if(!isset($_GET['ajax']))
                        $this->redirect(Yii::app()->user->returnUrl=array('index'));
                    }
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('setting',array(
			'model'=>$model,
                    'id'=>$id
		));
            }
        }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            $this->loadModel($id)->delete();
            //$listP = array();
             $modelPro = Participant::model()->findAll();
             $modelTask = Task::model()->findAll();
                
             foreach($modelPro as $pro){
                 $idu = $pro->idProject;
                 if($idu==$id){
                     $pro->delete();
                 }
             }
             foreach($modelTask as $prot){
                 $idu = $prot->idProject;
                 if($idu==$id){
                     $prot->delete();
                 }
             }
        
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		$this->redirect(Yii::app()->user->returnUrl=array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
             $listP = array();
             $modelPro = Participant::model()->findAll();
                
             foreach($modelPro as $pro){
                 $idu = $pro->idUser;
                 if($idu==Yii::app()->user->id){
                     $listP[] = $pro->idProject;
                 }
             }
             
             $criteria=new CDbCriteria;
             $criteria->addInCondition('id', $listP);
            $dataProvider=new CActiveDataProvider('Project',array(
                    'criteria'=>$criteria
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
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Project the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
                if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Project $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
