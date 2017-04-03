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
				'actions'=>array('create','update','ChangeStatus','GetSubCatDetails','RemovePdf'),
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

			$letterUpload 			= CUploadedFile::getInstance($model,'upload_product_pdf');
			$uploadedMainFile		=	CUploadedFile::getInstance($model,'product_main_image');
			$uploadedThumFile		=	CUploadedFile::getInstance($model,'product_thum_image');
			$uploadedKitPackFile	=	CUploadedFile::getInstance($model,'kit_package_image');
			$uploadedPlanningFile	=	CUploadedFile::getInstance($model,'planning_image');
			
			if(!empty($letterUpload))
			{
				$pdfUniqueName = time()."_".$letterUpload->name;
				$rootPath = "../assets/pdfProduct/product/".$pdfUniqueName;
				$letterUpload->saveAs($rootPath);
				$model->upload_product_pdf = $pdfUniqueName;
			}

			if(!empty($uploadedMainFile)){
				$uniqueName = rand(1000,9999) . time()."_". $uploadedMainFile->name;
				$rootPath = "../assets/images/products/".$uniqueName;
				$uploadedMainFile->saveAs($rootPath);
				$model->product_main_image = $uniqueName;
			}


			if(!empty($uploadedThumFile)){
				$uniqueName1 = rand(1000,9999) . time()."_". $uploadedThumFile->name;
				$rootPath1 = "../assets/images/products/thum/".$uniqueName1;
				$uploadedThumFile->saveAs($rootPath1);
				$model->product_thum_image = $uniqueName1;
			}

			if(!empty($uploadedKitPackFile)){
				$uniqueName2 = rand(1000,9999) . time()."_". $uploadedKitPackFile->name;
				$rootPath2 = "../assets/images/products/kit-package/".$uniqueName2;
				$uploadedKitPackFile->saveAs($rootPath2);
				$model->kit_package_image = $uniqueName2;
			}

			if(!empty($uploadedPlanningFile)){
				$uniqueName3 = rand(1000,9999) . time()."_". $uploadedPlanningFile->name;
				$rootPath3 = "../assets/images/products/planning/".$uniqueName3;
				$uploadedPlanningFile->saveAs($rootPath3);
				$model->planning_image = $uniqueName3;
			}

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
		$model=$this->loadModel($id);
		$removePro = str_replace('protected', '', Yii::app()->basePath);
		$changeBaseUrl = str_replace('admin', 'assets', $removePro);

		$oldProductPdf 	= $model->upload_product_pdf;
		$oldMainImg 	= $model->product_main_image;
		$oldThumImg 	= $model->product_thum_image;
		$oldKitPackImg 	= $model->kit_package_image;
		$oldPlanImg 	= $model->planning_image;

		if(isset($_POST['Products']))
		{
			$model->title 				= $_POST['Products']['title'];
			$model->categories_id 		= $_POST['Products']['categories_id'];
			$model->subcategories_id 	= $_POST['Products']['subcategories_id'];
			$model->ebds 				= $_POST['Products']['ebds'];
			$model->size 				= $_POST['Products']['size'];
			$model->finish 				= $_POST['Products']['finish'];
			$model->height 				= $_POST['Products']['height'];
			$model->material 			= $_POST['Products']['material'];
			$model->features 			= $_POST['Products']['features'];

			$letterUpload 			= 	CUploadedFile::getInstance($model,'upload_product_pdf');
			$uploadedMainFile		=	CUploadedFile::getInstance($model,'product_main_image');
			$uploadedThumFile		=	CUploadedFile::getInstance($model,'product_thum_image');
			$uploadedKitPackFile	=	CUploadedFile::getInstance($model,'kit_package_image');
			$uploadedPlanningFile	=	CUploadedFile::getInstance($model,'planning_image');

			if(!empty($letterUpload))
			{
				if( !empty( $oldProductPdf ) &&  file_exists($changeBaseUrl."/pdfProduct/product/". $oldProductPdf)){
					unlink($changeBaseUrl."/pdfProduct/product/". $oldProductPdf );
				}
				$pdfUniqueName = time()."_".$letterUpload->name;
				$rootPath = "../assets/pdfProduct/product/".$pdfUniqueName;
				$letterUpload->saveAs($rootPath);
				$model->upload_product_pdf = $pdfUniqueName;
			}

			if(!empty($uploadedMainFile)){
				if(!empty( $oldMainImg ) &&  file_exists($changeBaseUrl."/images/products/". $oldMainImg)){
					unlink($changeBaseUrl."/images/products/". $oldMainImg );
				}
				$uniqueName = rand(1000,9999) . time()."_". $uploadedMainFile->name;
				$rootPath = "../assets/images/products/".$uniqueName;
				$uploadedMainFile->saveAs($rootPath);
				$model->product_main_image = $uniqueName;
			}

			if(!empty($uploadedThumFile)){
				if( !empty( $oldThumImg ) && file_exists($changeBaseUrl."/images/products/thum/". $oldThumImg)){
					unlink($changeBaseUrl."/images/products/thum/". $oldThumImg );
				}
				$uniqueName1 = rand(1000,9999) . time()."_". $uploadedThumFile->name;
				$rootPath1 = "../assets/images/products/thum/".$uniqueName1;
				$uploadedThumFile->saveAs($rootPath1);
				$model->product_thum_image = $uniqueName1;
			}

			if(!empty($uploadedKitPackFile)){
				if( !empty( $oldKitPackImg ) && file_exists($changeBaseUrl."/images/products/kit-package/". $oldKitPackImg)){
					unlink($changeBaseUrl."/images/products/kit-package/". $oldKitPackImg );
				}
				$uniqueName2 = rand(1000,9999) . time()."_". $uploadedKitPackFile->name;
				$rootPath2 = "../assets/images/products/kit-package/".$uniqueName2;
				$uploadedKitPackFile->saveAs($rootPath2);
				$model->kit_package_image = $uniqueName2;
			}

			if(!empty($uploadedPlanningFile)){
				if( !empty( $oldPlanImg ) && file_exists($changeBaseUrl."/images/products/planning/". $oldPlanImg)){
					unlink($changeBaseUrl."/images/products/planning/". $oldPlanImg );
				}
				$uniqueName3 = rand(1000,9999) . time()."_". $uploadedPlanningFile->name;
				$rootPath3 = "../assets/images/products/planning/".$uniqueName3;
				$uploadedPlanningFile->saveAs($rootPath3);
				$model->planning_image = $uniqueName3;
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
                $arrProductsList->product_status = $strStatus;
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
			$objSubCategories = Subcategories::getActiveSubCategory($_POST['cat_id']);
			echo CJSON::encode(array(
                                  'status' => "success",
                                  'update' => $objSubCategories,
                                  ));
               Yii::app()->end();
		}
	}


	public function actionRemovePdf(){
		$strProductId 		= $_POST['product_id'];
		$strProductStatus 	= $_POST['product_status'];
		$model=$this->loadModel($strProductId);

		if( !empty( $model ) ){
			$removePro = str_replace('protected', '', Yii::app()->basePath);
			$changeBaseUrl = str_replace('admin', 'assets', $removePro);

			if( $strProductStatus == 'pdf'){
				$oldProductPdf 	= $model->upload_product_pdf;
				unlink($changeBaseUrl."pdfProduct/product/". $oldProductPdf );
				$model->upload_product_pdf = '';
			} elseif (  $strProductStatus == 'main_img' ) {
				$oldMainImg 	= $model->product_main_image;
				unlink($changeBaseUrl."/images/products/". $oldMainImg );
				$model->product_main_image = '';
			} elseif (  $strProductStatus == 'thum_img' ) {
				$oldThumImg 	= $model->product_thum_image;
				unlink($changeBaseUrl."/images/products/thum/". $oldThumImg );
				$model->product_thum_image = '';
			} elseif (  $strProductStatus == 'kit_img' ) {
				$oldKitPackImg 	= $model->kit_package_image;
				unlink($changeBaseUrl."/images/products/kit-package/". $oldKitPackImg );
				$model->kit_package_image = '';
			} elseif (  $strProductStatus == 'plan_img' ) {
				$oldPlanImg 	= $model->planning_image;
				unlink($changeBaseUrl."/images/products/planning/". $oldPlanImg );
				$model->planning_image = '';
			}

			$model->save();
			$send = array('status' => 'success');
            echo CJSON::encode($send);
            Yii::app()->end();
		}
	}
}
