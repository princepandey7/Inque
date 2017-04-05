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
				'actions'=>array('create','update','ChangeStatus','RemovePdf'),
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

		// $this->performAjaxValidation($model);
		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
			$model->event_start_date = date('Y-m-d', strtotime($model->event_start_date));
			$model->event_images=CUploadedFile::getInstance($model,'event_images');
			$model->event_images1=CUploadedFile::getInstance($model,'event_images1');
			$model->event_images2=CUploadedFile::getInstance($model,'event_images2');

			$uploadedEventImg1	=	CUploadedFile::getInstance($model,'event_images');
			$uploadedEventImg2	=	CUploadedFile::getInstance($model,'event_images1');
			$uploadedEventImg3	=	CUploadedFile::getInstance($model,'event_images2');

			if( $model->validate() ){
				if(!empty($uploadedEventImg1)){
					$uniqueName = rand(1000,9999) . time()."_". $uploadedEventImg1->name;
					$rootPath = "../assets/images/events/".$uniqueName;
					$uploadedEventImg1->saveAs($rootPath);
					$model->event_images = $uniqueName;
				}

				if(!empty($uploadedEventImg2)){
					$uniqueName1 = rand(1000,9999) . time()."_". $uploadedEventImg2->name;
					$rootPath1 = "../assets/images/events/".$uniqueName1;
					$uploadedEventImg2->saveAs($rootPath1);
					$model->event_images1 = $uniqueName1;
				}
				
				if(!empty($uploadedEventImg3)){
					$uniqueName2 = rand(1000,9999) . time()."_". $uploadedEventImg3->name;
					$rootPath2 = "../assets/images/events/".$uniqueName2;
					$uploadedEventImg3->saveAs($rootPath2);
					$model->event_images2 = $uniqueName2;
				}

				if($model->save()){
					$this->redirect(array('index'));
				}
			}else {
				$model->event_images = '';
				$model->event_images1 = '';
				$model->event_images2 = '';
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
		$removePro = str_replace('protected', '', Yii::app()->basePath);
		$changeBaseUrl = str_replace('admin', 'assets', $removePro);
		$oldMainImg 	= $model->event_images;
		$oldMainImg1 	= $model->event_images1;
		$oldMainImg2 	= $model->event_images2;

		if(isset($_POST['Events']))
		{
			$model->event_title 		= $_POST['Events']['event_title'];
			$model->event_description 	= $_POST['Events']['event_description'];
			$model->event_evenue 		= $_POST['Events']['event_evenue'];
			$model->event_start_date	= date('Y-m-d', strtotime($_POST['Events']['event_start_date']));

			$uploadedMainFile1 			= 	CUploadedFile::getInstance($model,'event_images');
			$uploadedMainFile2		=	CUploadedFile::getInstance($model,'event_images1');
			$uploadedMainFile3		=	CUploadedFile::getInstance($model,'event_images2');

			if(!empty($uploadedMainFile1))
			{
				if( !empty( $oldMainImg ) &&  file_exists($changeBaseUrl."/images/events/". $oldMainImg)){
					unlink($changeBaseUrl."/images/events/". $oldMainImg );
				}
				$UniqueName = time()."_".$uploadedMainFile1->name;
				$rootPath = "../assets/images/events/".$UniqueName;
				$uploadedMainFile1->saveAs($rootPath);
				$model->event_images = $UniqueName;
			}

			if(!empty($uploadedMainFile2))
			{
				if( !empty( $oldMainImg1 ) &&  file_exists($changeBaseUrl."/images/events/". $oldMainImg1)){
					unlink($changeBaseUrl."/images/events/". $oldMainImg1 );
				}
				$UniqueName1 = time()."_".$uploadedMainFile2->name;
				$rootPath1 = "../assets/images/events/".$UniqueName1;
				$uploadedMainFile2->saveAs($rootPath1);
				$model->event_images1 = $UniqueName1;
			}

			if(!empty($uploadedMainFile3))
			{
				if( !empty( $oldMainImg2 ) &&  file_exists($changeBaseUrl."/images/events/". $oldMainImg2)){
					unlink($changeBaseUrl."/images/events/". $oldMainImg2 );
				}
				$UniqueName2 = time()."_".$uploadedMainFile3->name;
				$rootPath2 = "../assets/images/events/".$UniqueName2;
				$uploadedMainFile3->saveAs($rootPath2);
				$model->event_images2 = $UniqueName2;
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

	public function actionRemovePdf(){
		$strEventId 		= $_POST['event_id'];
		$strEventStatus 	= $_POST['event_status'];
		$model=$this->loadModel($strEventId);

		if( !empty( $model ) ){
			$removePro = str_replace('protected', '', Yii::app()->basePath);
			$changeBaseUrl = str_replace('admin', 'assets', $removePro);

			if( $strEventStatus == 'main_img1'){
				$oldProductPdf 	= $model->event_images;
				unlink($changeBaseUrl."/images/events/". $oldProductPdf );
				$model->event_images = '';
			} elseif (  $strEventStatus == 'main_img2' ) {
				$oldMainImg 	= $model->event_images1;
				unlink($changeBaseUrl."/images/events/". $oldMainImg );
				$model->event_images1 = '';
			} elseif (  $strEventStatus == 'main_img3' ) {
				$oldThumImg 	= $model->event_images2;
				unlink($changeBaseUrl."/images/events/". $oldThumImg );
				$model->event_images2 = '';
			}

			$model->save();
			$send = array('status' => 'success');
            echo CJSON::encode($send);
            Yii::app()->end();
		}
	}
}
