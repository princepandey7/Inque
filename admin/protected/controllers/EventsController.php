<?php

class EventsController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ChangeStatus'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
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
		ini_set('upload_max_filesize', '40M');
		$model = new Events;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
			$model->event_start_date = date('Y-m-d', strtotime($model->event_start_date));
			
			$sfile = CUploadedFile::getInstancesByName('event_images');

			$ffile = array();
			foreach ($sfile as $i=>$file){
	        	$fileName = "{$sfile[$i]}";
				$formatName=time().$i.'_'.$fileName;
				$file->saveAs('../assets/images/events/'.$formatName);
				$ffile[$i]=$formatName;
         	}
			
         	$model->event_images = implode(",", $ffile);
			if($model->save()){
				$this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		ini_set('upload_max_filesize', '40M');
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->event_title 		= $_POST['Events']['event_title'];
			$model->event_description 	= $_POST['Events']['event_description'];
			$model->event_evenue 		= $_POST['Events']['event_evenue'];
			$model->event_start_date	= date('Y-m-d', strtotime($_POST['Events']['event_start_date']));
			$EventMainImage 		= CUploadedFile::getInstancesByName('event_images');
			if(!empty($EventMainImage)){
				$ffile = array();
				foreach ($EventMainImage as $i=>$file){
		        	$fileName = "{$EventMainImage[$i]}";
					$formatName=time().$i.'_'.$fileName;
					$file->saveAs('../assets/images/events/'.$formatName);
					$ffile[$i]=$formatName;
	         	}
				
	         	$model->event_images = implode(",", $ffile);
			}
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionChangeStatus()
	{
		if (Yii::app()->request->isAjaxRequest) {
            $id = $_POST['id'];
            $status = $_POST['status'];
            $arrEventsList = Events::model()->findByPk($id);
            if( true == !empty( $arrEventsList ) )
            {
                $strStatus = Events::STATUS_INACTIVE;
                $strBtnText = "Disable";
                $strMsg = "Events has been Enabled successfully";
                if( Events::STATUS_INACTIVE == $status )
                {
                    $strStatus = Events::STATUS_ACTIVE;
                    $strMsg = "Events has been Disabled successfully";
                    $strBtnText = "Enable";
                }
                $arrEventsList->event_status = $strStatus;
                $arrEventsList->save();

                $send = array('status' => 'success', 'message' => $strMsg, 'change_status' => $strStatus, 'update' => $strBtnText);
                echo CJSON::encode($send);
                Yii::app()->end();
            }
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		// $dataProvider=new CActiveDataProvider('Events');
		// $criteria=new CDbCriteria();
  // 		$criteria->compare('event_status',Events::STATUS_ACTIVE);
		$objEvents = Events::model()->findAll();

		$this->render('index',array(
			'objEvents'=>$objEvents,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Events']))
			$model->attributes=$_GET['Events'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Events the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Events::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Events $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
