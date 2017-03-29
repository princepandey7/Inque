<?php

class GalleryController extends Controller
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
		$model=new Gallery;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			$model->gallery_main_image=CUploadedFile::getInstance($model,'gallery_main_image');
			$model->gallery_thumnail_image=CUploadedFile::getInstance($model,'gallery_thumnail_image');

			if($model->save()){
				$uniqueName 	= rand(1000,9999) . time()."_".$model->gallery_main_image;
				$uniqueThumName = rand(1000,9999) . time()."_".$model->gallery_thumnail_image;
				$path1 = "../assets/images/gallery/".$uniqueName;
				$path2 = "../assets/images/gallery/thumbnail/".$uniqueThumName;
				$model->gallery_main_image->saveAs($path1);
				$model->gallery_thumnail_image->saveAs($path2);
				$model->gallery_main_image 		= $uniqueName;
				$model->gallery_thumnail_image 	= $uniqueThumName;
    			$model->save();
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
		$model=$this->loadModel($id);
		$removePro = str_replace('protected', '', Yii::app()->basePath);
		$changeBaseUrl = str_replace('admin', 'assets', $removePro);
		$oldMainImg = $model->gallery_main_image;
		$oldThumImg = $model->gallery_thumnail_image;

		if(isset($_POST['Gallery']))
		{
			$getUrl = explode('/', Yii::app()->baseUrl);
			$model->gallery_title 		= $_POST['Gallery']['gallery_title'];
			$model->gallery_description = $_POST['Gallery']['gallery_description'];
			$GalleryMainImage 		= CUploadedFile::getInstance($model,'gallery_main_image');
			if(!empty($GalleryMainImage)){
				if( !empty( $oldMainImg ) && file_exists($changeBaseUrl."/images/gallery/". $oldMainImg)){
					unlink($changeBaseUrl."/images/gallery/". $oldMainImg );
				}
				$uniqueName = rand(1000,9999) . time()."_". $GalleryMainImage->name;
				$rootPath = "../assets/images/gallery/".$uniqueName;
				$GalleryMainImage->saveAs($rootPath);
				$model->gallery_main_image = $uniqueName;
			}

			$GalleryThumnailImage 	= CUploadedFile::getInstance($model,'gallery_thumnail_image');
			if(!empty($GalleryThumnailImage)){
				if( !empty( $oldThumImg ) && file_exists($changeBaseUrl."/images/gallery/thumbnail/". $oldThumImg)){
					unlink($changeBaseUrl."/images/gallery/thumbnail/". $oldThumImg);
				}
				
				$uniqueThumName = rand(1000,9999) . time()."_". $GalleryThumnailImage->name;
				$rootPath1 = "../assets/images/gallery/thumbnail/".$uniqueThumName;
				$GalleryThumnailImage->saveAs($rootPath1);
				$model->gallery_thumnail_image = $uniqueThumName;
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
            $arrGalleryList = Gallery::model()->findByPk($id);
            if( true == !empty( $arrGalleryList ) )
            {
                $strStatus = Gallery::STATUS_INACTIVE;
                $strBtnText = "Disable";
                $strMsg = "Gallery has been Enabled successfully";
                if( Gallery::STATUS_INACTIVE == $status )
                {
                    $strStatus = Gallery::STATUS_ACTIVE;
                    $strMsg = "Gallery has been Disabled successfully";
                    $strBtnText = "Enable";
                }
                $arrGalleryList->gallery_status = $strStatus;
                $arrGalleryList->save();

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
		// $dataProvider=new CActiveDataProvider('Gallery');
		$objGallerys = Gallery::model()->findAll(array('order'=>'gallery_id DESC'));
		$this->render('index',array(
			'objGallerys'=>$objGallerys,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gallery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Gallery $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
