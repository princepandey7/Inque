<?php
class ErrorPageController extends Controller {
    
    public function actionError() {
        $this->layout = 'full-page';
        // if(Yii::app()->user->isGuest) {
        //     $this->redirect(array("user/login"));
        // } 

        $data = Yii::app()->errorHandler->error;
        $requested_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 

        echo "GONE";
        echo "<pre>"; print_r($data); echo "</pre>". __LINE__ . ".\n"; exit(); 
        // if (isset($data)) {
            // if (Yii::app()->request->isAjaxRequest)
            //  echo $data['message'];
            // else
            // $this->renderPartial('error',  array('data' => $data));
        // }
    }

}