<?php

class ProductsController extends Controller
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
				'actions'=>array('create','update','ChangeStatus','GetSubCatDetails'),
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
		$model=new Products;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			$model->product_main_image=CUploadedFile::getInstance($model,'product_main_image');
			$model->product_thum_image=CUploadedFile::getInstance($model,'product_thum_image');
			$model->kit_package_image=CUploadedFile::getInstance($model,'kit_package_image');
			$model->planning_image=CUploadedFile::getInstance($model,'planning_image');

			if($model->save()){
				// $path1 = "../assets/images/gallery/".$uniqueName;
				if( !empty($_FILES['Products']['name']['product_main_image'])){
					$uniqueName1 	= $model->id ."_". time()."_".$model->product_main_image;
					$path1 = "../assets/images/products/".$uniqueName1;
					$model->product_main_image->saveAs($path1);
					$model->product_main_image = $uniqueName1;
				}
				if( !empty($_FILES['Products']['name']['product_thum_image'])){
					$uniqueName2 	= $model->id ."_". time()."_".$model->product_thum_image;
					$path2 = "../assets/images/products/thum/".$uniqueName2;
					$model->product_thum_image->saveAs($path2);
					$model->product_thum_image = $uniqueName2;
				}
				if( !empty($_FILES['Products']['name']['kit_package_image'])){
					$uniqueName3 	= $model->id ."_". time()."_".$model->kit_package_image;
					$path3 = "../assets/images/products/kit-package/".$uniqueName3;
					$model->kit_package_image->saveAs($path3);
					$model->kit_package_image = $uniqueName3;
				}
				if( !empty($_FILES['Products']['name']['planning_image'])){
					$uniqueName4 	= $model->id ."_". time()."_".$model->planning_image;
					$path4 = "../assets/images/products/kit-package/".$uniqueName4;
					$model->planning_image->saveAs($path4);
					$model->planning_image = $uniqueName4;
				}
				if( !empty($_FILES) ){
					$model->save();
				}

				$this->redirect(array('view','id'=>$model->id));
			}
			// else {
			// 	echo "<pre>"; print_r($model->getErrors()); echo "</pre>". __LINE__ . ".\n"; exit(); 
			// }

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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			$uploadedMainFile		=	CUploadedFile::getInstance($model,'product_main_image');
			$uploadedThumFile		=	CUploadedFile::getInstance($model,'product_thum_image');
			$uploadedKitPackFile	=	CUploadedFile::getInstance($model,'kit_package_image');

			if($model->save())
				// if( !empty($_FILES['Products']['name']['product_main_image'])){
				if( !empty($uploadedMainFile ) ){
					$uniqueName1 	= $model->id ."_". time()."_".$model->product_main_image;
					$path1 = "../assets/images/products/".$uniqueName1;
					$uploadedMainFile->saveAs($path1);
					$model->product_main_image = $uniqueName1;
				}
				// if( !empty($_FILES['Products']['name']['product_thum_image'])){
				if( !empty($uploadedThumFile ) ){
					$uniqueName2 	= $model->id ."_". time()."_".$model->product_thum_image;
					$path2 = "../assets/images/products/thum/".$uniqueName2;
					$uploadedThumFile->saveAs($path2);
					$model->product_thum_image = $uniqueName2;
				}
				// if( !empty($_FILES['Products']['name']['kit_package_image'])){
				if( !empty($uploadedKitPackFile ) ){
					$uniqueName3 	= $model->id ."_". time()."_".$model->kit_package_image;
					$path3 = "../assets/images/products/kit-package/".$uniqueName3;
					$uploadedKitPackFile->saveAs($path3);
					$model->kit_package_image = $uniqueName3;
				}
				if( !empty($_FILES) ){
					$model->save();
				}
				$this->redirect(array('view','id'=>$model->id));
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
            $arrProductsList = Products::model()->findByPk($id);
            if( true == !empty( $arrProductsList ) )
            {
                $strStatus = Products::STATUS_INACTIVE;
                $strBtnText = "Disable";
                $strMsg = "Products has been Enabled successfully";
                if( Products::STATUS_INACTIVE == $status )
                {
                    $strStatus = Products::STATUS_ACTIVE;
                    $strMsg = "Products has been Disabled successfully";
                    $strBtnText = "Enable";
                }
                $arrProductsList->Products_status = $strStatus;
                $arrProductsList->save();

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
		// $dataProvider=new CActiveDataProvider('Products');
		$objProducts = Products::model()->findAll();
		$this->render('index',array(
			'objProducts'=>$objProducts,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Products the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Products $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGetSubCatDetails(){
		if( !empty($_POST['cat_id'])){
			$objSubCategories = SubCategories::getActiveSubCategory($_POST['cat_id']);
			echo CJSON::encode(array(
                                  'status' => "success",
                                  'update' => $objSubCategories,
                                  ));
               Yii::app()->end();
		}

	}
}
