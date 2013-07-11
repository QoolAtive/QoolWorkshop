<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->layout = 'main_index';
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (isset(Yii::app()->user->id)) {
                    $id = Yii::app()->user->id;
                    $users = MemUser::model()->find('id = ' . $id);
                    if ($users->type == '3') {
                        echo "
                            <script>
                            alert('" . Yii::t('language', 'ผู้ดูแลระบบ') . "');
                            window.top.location.href='" . Yii::app()->user->returnUrl . "';
                            </script>
                            ";
                    } else {
                        if (Yii::app()->user->isConfirmUser()) {
                            if (Yii::app()->user->isUserType()) {
                                echo "
                                    <script>
                                    alert('" . Yii::t('language', 'รอการยืนยันจากผู้ดูแลระบบ') . "');
                                    window.top.location.href='/site/logout';
                                    </script>
                                    ";
                            } else {
                                echo "
                                    <script>
                                    alert('" . Yii::t('language', 'กรุณายืนยันการสมัครสมาชิก') . "');
                                    window.top.location.href='/member/manage/registerConfirm';
                                    </script>
                                    ";
                            }
                        } else {
                            if (Yii::app()->user->isStatusMember()) {
                                Yii::app()->user->logout();
                                echo "
                                    <script>
                                    alert('" . Yii::t('language', 'คุณถูกยกเลิกออกจากระบบ') . "');
                                    window.top.location.href='" . Yii::app()->user->returnUrl . "';
                                    </script>
                                    ";
                            } else {
                                echo "
                                    <script>
                                    alert('" . Yii::t('language', 'ยินดีต้อนรับเข้าสู่ DBDmart') . "');
                                    window.top.location.href='" . Yii::app()->user->returnUrl . "';
                                    </script>
                                    ";
                            }
                        }
                    }
                }
//                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionProvinceToPrefecture() {
        $data = Prefecture::model()->findAll('province_id=:p_id', array(
            ':p_id' => (int) $_POST['province'])
        );

        $data = CHtml::listData($data, 'id', 'name');

        echo "<option value=''>เลือก</option>";
        foreach ($data as $id => $name)
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($name), true);
    }

    public function actionPrefectureToDistrict() {
        $data = District::model()->findAll('prefecture_id=:p_id', array(
            ':p_id' => (int) $_POST['prefecture'])
        );

        $data = CHtml::listData($data, 'id', 'name');

        echo "<option value=''>เลือก</option>";
        foreach ($data as $id => $name)
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($name), true);
    }

}