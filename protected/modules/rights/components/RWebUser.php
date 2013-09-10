<?php

/**
 * Rights web user class file.
 *
 * @author Christoffer Niska <cniska@live.com>
 * @copyright Copyright &copy; 2010 Christoffer Niska
 * @since 0.5
 */
class RWebUser extends CWebUser {

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
            $user = AuthAssignment::model()->count('userid = :userid', array('userid' => Yii::app()->user->id));
            if ($user > 0) {
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

    /**
     * Actions to be taken after logging in.
     * Overloads the parent method in order to mark superusers.
     * @param boolean $fromCookie whether the login is based on cookie.
     */
    public function afterLogin($fromCookie) {
        parent::afterLogin($fromCookie);

        // Mark the user as a superuser if necessary.
        if (Rights::getAuthorizer()->isSuperuser($this->getId()) === true)
            $this->isSuperuser = true;
    }

    /**
     * Performs access check for this user.
     * Overloads the parent method in order to allow superusers access implicitly.
     * @param string $operation the name of the operation that need access check.
     * @param array $params name-value pairs that would be passed to business rules associated
     * with the tasks and roles assigned to the user.
     * @param boolean $allowCaching whether to allow caching the result of access checki.
     * This parameter has been available since version 1.0.5. When this parameter
     * is true (default), if the access check of an operation was performed before,
     * its result will be directly returned when calling this method to check the same operation.
     * If this parameter is false, this method will always call {@link CAuthManager::checkAccess}
     * to obtain the up-to-date access result. Note that this caching is effective
     * only within the same request.
     * @return boolean whether the operations can be performed by this user.
     */
    public function checkAccess($operation, $params = array(), $allowCaching = true) {
        // Allow superusers access implicitly and do CWebUser::checkAccess for others.
        return $this->isSuperuser === true ? true : parent::checkAccess($operation, $params, $allowCaching);
    }

    /**
     * @param boolean $value whether the user is a superuser.
     */
    public function setIsSuperuser($value) {
        $this->setState('Rights_isSuperuser', $value);
    }

    /**
     * @return boolean whether the user is a superuser.
     */
    public function getIsSuperuser() {
        return $this->getState('Rights_isSuperuser');
    }

    /**
     * @param array $value return url.
     */
    public function setRightsReturnUrl($value) {
        $this->setState('Rights_returnUrl', $value);
    }

    /**
     * Returns the URL that the user should be redirected to 
     * after updating an authorization item.
     * @param string $defaultUrl the default return URL in case it was not set previously. If this is null,
     * the application entry URL will be considered as the default return URL.
     * @return string the URL that the user should be redirected to 
     * after updating an authorization item.
     */
    public function getRightsReturnUrl($defaultUrl = null) {
        if (($returnUrl = $this->getState('Rights_returnUrl')) !== null)
            $this->returnUrl = null;

        return $returnUrl !== null ? CHtml::normalizeUrl($returnUrl) : CHtml::normalizeUrl($defaultUrl);
    }

}
