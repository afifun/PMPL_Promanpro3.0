<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            if (!Yii::app()->user->isGuest)
                {
                    $this->redirect('index.php/project/index');
                }
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    /**
         * Displays the register page
         */
        public function actionRegister()
        {
            if (!Yii::app()->user->isGuest)
                            {
                                $this->redirect(Yii::app()->homeUrl);
                            }
            
            $model=new User;
           
            if(isset($_POST['User']))
            {   
                $model->attributes = $_POST['User'];
               
                if($model->save())
                {
                    $this->SendMail($model); 
                }
                
            }
            $this->render('register',array(
                'model'=>$model,
            ));
        }
        public function actionViewSuccess(){
            if (!Yii::app()->user->isGuest)
                            {
                                $this->redirect(Yii::app()->homeUrl);
                            }
            $this->render('success');
        }
        
        public function actionViewActive(){
            if (!Yii::app()->user->isGuest)
                            {
                                $this->redirect(Yii::app()->homeUrl);
                            }
            $this->render('active');
        }
        
        public function actionViewNotActive(){
            if (!Yii::app()->user->isGuest)
                            {
                                $this->redirect(Yii::app()->homeUrl);
                            }
            $this->render('notactive');
        }
        
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
            if (!Yii::app()->user->isGuest)
                            {
                                $this->redirect(Yii::app()->homeUrl);
                            }
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl=array('project/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public function SendMail($model)
        {   
            if (!Yii::app()->user->isGuest)
                            {
                                $this->redirect(Yii::app()->homeUrl);
                            }
            $to = $model->Email;
            $toname = $model->Username;
            $code = crypt('qwerty', $to.$toname);
            $link = 'localhost/PROMANPRO/index.php/site/Activation?username='.$toname.'&code='.$code.'';
            
            $message = new YiiMailMessage();
            $message->setTo(array($to=>$toname));
            $message->setFrom(array(Yii::app()->params['adminEmail']=>'PROMANPRO'));
            $message->setSubject('[promanpro] account verification');
            $message->setBody(
                '<html>' .
                ' <head></head>' .
                ' <body>' .
                ' Hi, ' .$toname.''.
                '<br></br>'.
                ' Click the link below to verify your account:'.
                '<br></br>'.
                '<a href="'.$link.'">'.$link.'</a>'.
                ' </body>' .
                '</html>',
                'text/html' // Mark the content-type as HTML
            );
            $numsent = Yii::app()->mail->send($message);
            $this->redirect(array('ViewSuccess'));
        }
        
        public function actionActivation($username,$code){
            if (!Yii::app()->user->isGuest)
                            {
                                $this->redirect(Yii::app()->homeUrl);
                            }
            $model = User::model()->findAll();
                
             foreach($model as $pro){
                 $name = $pro->Username;
                 $mail = $pro->Email;
                 if($name==$username){
                     $code2 = crypt('qwerty', $mail.$name);
                     if($code2==$code){
                        $pro->isActive=1;
                        $pro->save();
                        $this->redirect(array('ViewActive'));
                     }
                    else{
                        $this->redirect(array('ViewNotActive'));
                    }
                 }
             }
            //if($a==4) {echo 'b';die();}
            //$this->render('success');
        }
}