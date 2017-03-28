<?php

class UserController extends Controller
{
	 public $defaultAction = 'login';
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
			// page action renders "static" pages stored under 'protected/views/dashboard/pages'
			// They can be accessed via: index.php?r=dashboard/page&view=FileName
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
		echo "<pre>"; print_r($_POST); echo "</pre>". __LINE__ . ".\n"; exit(); 

		// renders the view file 'protected/views/dashboard/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->render('index');
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
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = '//layouts/loginbox';
		echo Yii::app()->user->id;
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
				Yii::app()->controller->redirect(array('/dashboard'));
		}

		$user = Users::model()->findByPk(Yii::app()->user->id);
		if ( true == !empty( $user ) )
        {
            Yii::app()->controller->redirect(array('/dashboard'));
        }
        // $this->redirect(Yii::app()->user->getReturnUrl());
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

	private function lastVisit() {
        $lastVisit = User::model()->findByPk(Yii::app()->user->id);
        $lastVisit->lastvisit = time();
        $lastVisit->save();
    }
}