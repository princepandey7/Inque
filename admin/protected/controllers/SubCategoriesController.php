<?php

class SubcategoriesController extends Controller
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
		$model = new Subcategories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Subcategories']))
		{
			$letterUpload = CUploadedFile::getInstance($model,'upload_pdf');
			if(!empty($letterUpload))
			{
				$uniqueName = time()."_".$letterUpload->name;
				$rootPath = "../assets/pdfProduct/sub-category/".$uniqueName;
				$letterUpload->saveAs($rootPath);
				$model->upload_pdf = $uniqueName;
			}
			$model->attributes=$_POST['Subcategories'];
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
		$removePro = str_replace('protected', '', Yii::app()->basePath);
		$changeBaseUrl = str_replace('admin', 'assets', $removePro);
		$oldProductPdf 	= $model->upload_pdf;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Subcategories']))
		{
			// $model->attributes=$_POST['Subcategories'];
			$model->categories_id 				= $_POST['Subcategories']['categories_id'];
			$model->sub_categories_name 		= $_POST['Subcategories']['sub_categories_name'];
			$model->sub_categories_slug 		= $_POST['Subcategories']['sub_categories_slug'];
			$model->sub_categories_description 	= $_POST['Subcategories']['sub_categories_description'];

			$letterUpload = CUploadedFile::getInstance($model,'upload_pdf');
			if(!empty($letterUpload))
			{
				if( !empty( $oldProductPdf ) &&  file_exists($changeBaseUrl."/pdfProduct/product/sub-category/". $oldProductPdf)){
					unlink($changeBaseUrl."/pdfProduct/product/sub-category/". $oldProductPdf );
				}

				$uniqueName = time()."_".$letterUpload->name;
				$rootPath = "../assets/pdfProduct/sub-category/".$uniqueName;
				$letterUpload->saveAs($rootPath);
				$model->upload_pdf = $uniqueName;
			}


			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$objSubcategories = Subcategories::model()->findAll();
		$this->render('index',array(
			'objSubcategories'=>$objSubcategories,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Subcategories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Subcategories']))
			$model->attributes=$_GET['Subcategories'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Subcategories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Subcategories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Subcategories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sub-categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionChangeStatus()
	{

		if (Yii::app()->request->isAjaxRequest) {
            $id = $_POST['id'];
            $status = $_POST['status'];
            $arrSubcategoriesList = Subcategories::model()->findByPk($id);

            if(!empty( $arrSubcategoriesList ) )
            {
                $strStatus = Subcategories::STATUS_INACTIVE;
                $strBtnText = "Disable";
                $strMsg = "Sub-Categories has been Enabled successfully";
                if( Subcategories::STATUS_INACTIVE == $status )
                {
                    $strStatus = Subcategories::STATUS_ACTIVE;
                    $strMsg = "Sub-Categories has been Disabled successfully";
                    $strBtnText = "Enable";
                }
                $arrSubcategoriesList->sub_categories_status = $strStatus;
                $arrSubcategoriesList->save();

                $send = array('status' => 'success', 'message' => $strMsg, 'change_status' => $strStatus, 'update' => $strBtnText);
                echo CJSON::encode($send);
                Yii::app()->end();
            }
        }
	}
}