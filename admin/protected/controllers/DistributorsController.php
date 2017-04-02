<?php

class DistributorsController extends Controller
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
				'actions'=>array('create','update','ChangeStatus','GetStateDetails','GetCityDetails'),
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
		$model=new Distributors;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Distributors']))
		{
			$model->attributes=$_POST['Distributors'];
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
		// $this->performAjaxValidation($model);
		if(isset($_POST['Distributors']))
		{
			$model->attributes=$_POST['Distributors'];
			if($model->save()) {
				$this->redirect(array('index'));
			}
		}
		$this->render('update',array('model'=>$model));
	}

	public function actionChangeStatus()
	{
		if (Yii::app()->request->isAjaxRequest) {
            $id = $_POST['id'];
            $status = $_POST['status'];
            $arrDistributorsList = Distributors::model()->findByPk($id);
            if( true == !empty( $arrDistributorsList ) )
            {
                $strStatus = Distributors::STATUS_INACTIVE;
                $strBtnText = "Disable";
                $strMsg = "Distributors has been Enabled successfully";
                if( Distributors::STATUS_INACTIVE == $status )
                {
                    $strStatus = Distributors::STATUS_ACTIVE;
                    $strMsg = "Distributors has been Disabled successfully";
                    $strBtnText = "Enable";
                }
                $arrDistributorsList->distributor_status = $strStatus;
                $arrDistributorsList->save();

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
		$objDistributors = Distributors::model()->findAll();
		$this->render('index',array(
			'objDistributors'=>$objDistributors ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Distributors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Distributors']))
			$model->attributes=$_GET['Distributors'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionGetStateDetails(){
		if( !empty($_POST['country_id'])){
			$objState = Yii::app()->db->createCommand('SELECT id,name FROM states WHERE country_id = '. $_POST['country_id'] )->queryAll();
			echo CJSON::encode(array(
                                  'status' => "success",
                                  'update' => $objState,
                                  ));
            Yii::app()->end();
		}

	}

	public function actionGetCityDetails(){
		if( !empty($_POST['state_id'])){
			$objCity = Yii::app()->db->createCommand('SELECT id,name FROM cities WHERE state_id	 = '. $_POST['state_id'] )->queryAll();
			echo CJSON::encode(array(
                                  'status' => "success",
                                  'update' => $objCity,
                                  ));
            Yii::app()->end();
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Distributors the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Distributors::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Distributors $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='distributors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
