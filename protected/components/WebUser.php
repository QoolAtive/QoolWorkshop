<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

    // Store model to not repeat query.
    private $_model;
    private $_idUser;
    private $_userType;
    private $_MemberType;
    private $_statusMember;

    // Return first name.
    // access it by Yii::app()->user->first_name
    function getFirst_Name() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->first_name;
    }

    // This is a function that checks the field 'role'
    // in the User model to be equal to 1, that means it's admin
    // access it by Yii::app()->user->isAdmin()
    function isAdmin() {
        if (Yii::app()->user->id) {
            $user = MemUser::model()->findByPk(Yii::app()->user->id);
            if ($user->type == 3) {
                return true;
            }
        }
//        return intval($user->type) == 3;
    }

    // Load user model.
    protected function loadUser($id = null) {
        if ($this->_model === null) {
            if ($id !== null)
                $this->_model = MemUser::model()->findByPk($id);
        }
        return $this->_model;
    }

    function isConfirmUser() {
        if (Yii::app()->user->id !== null) {
            $ConfirmUser = MemConfirm::model()->find('user_id = ' . Yii::app()->user->id);
            if ($ConfirmUser->status == 0)
                $this->_idUser = $ConfirmUser->user_id;
        }
        return $this->_idUser;
    }

    function isUserType() {
        if (Yii::app()->user->id !== null) {
            $userType = MemUser::model()->findByPk(Yii::app()->user->id);
            if ($userType->type == 2)
                $this->_userType = $userType->type;
        }
        return $this->_userType;
    }

    function isMemberType() {
        if (Yii::app()->user->id !== null) {
            $memberType = MemUser::model()->findByPk(Yii::app()->user->id);
            $this->_MemberType = $memberType->type;
        }
        return $this->_MemberType;
    }

    function isStatusMember() {
        if (Yii::app()->user->id !== null) {
            $member = MemUser::model()->findByPk(Yii::app()->user->id);
            if ($member->status == 1) {
                $this->_statusMember = $member->status;
            }
        }
        return $this->_statusMember;
    }

}

?>