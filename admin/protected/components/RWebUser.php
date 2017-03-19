<?php
class RWebUser extends CWebUser {

    private $_model;

    public function getUserId() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->attributes['id'];
    }
    public function getUserEmailId() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->attributes['email'];
    }
    public function getUserFullName() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->attributes['firstname'] . " " . $user->attributes['lastname'];
    }
    public function getUserCreatedDate() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->attributes['created'];
    }

    // public static function uploadPath() {
    //     $tenantId = Yii::app()->user->getTenantId();
    //     return Yii::app()->request->hostInfo . '/upload/' . $tenantId . "/";
    // }

    protected function loadUser($id = null) {
        if ($this->_model === null) {
            if ($id !== null)
                $this->_model = User::model()->findByPk($id);
        }
        return $this->_model;
    }

    
}
