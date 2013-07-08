<?php

Class ManageController extends Controller {

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('@')
            ),
            array(
                'allow',
                'actions' => array('admin'),
                'users' => array('admin')
            ),
            array(
                'allow',
                'actions' => array('registerPerson', 'registerRegistration', 'captcha'),
                'users' => array('*')
            ),
            array(
                'deny',
            ),
        );
    }

    public function actionIndex() {
        
    }

    public function actionRegisterPerson() {
//        if (Yii::app()->user->id)
//            $this->redirect(array('/site/index'));

        $model = new MemPerson();
        $model_user = new MemUser();
        $model_confirm = new MemConfirm();


        if (isset($_POST['MemPerson']) && isset($_POST['MemUser'])) {
            $model->attributes = $_POST['MemPerson'];
            $model->career = '0';
            $model->skill_com = '0';
            $model->receive_news = '0';
            $model->facebook = '-';
            $model->twitter = '-';
            $model->user_id = '0';
            if ($model->mem_type == 1) { //เพราะประเภทของสมาชิกไม่ใช้ผู้ประกอบธุรกิจ
                $model->panit = '0';
            }
            $RndPass = Tool::GenPass(4);

            $model_user->attributes = $_POST['MemUser'];
            $model_user->type = '1';

            $model_user->username = Tool::Encrypted($model_user->username);
            $model_user->password = Tool::Encrypted($model_user->password);
            $model_user->password_confirm = Tool::Encrypted($model_user->password_confirm);

            $model_user->validate();
            $model->validate();


            if ($model->getErrors() == NULL && $model_user->getErrors() == NULL) {
                if ($model_user->save()) {
                    $model->user_id = $model_user->id;
                    $model_confirm->user_id = $model_user->id;
                    $model_confirm->password = $RndPass;

                    if ($model->save()) {
                        if ($model_confirm->save()) {
                            $sendEmail = array(
                                'subject' => 'ยืนยันการสมัครสมาชิก',
                                'message' => Tool::messageEmail(array('name' => $model->ftname . ' ' . $model->ltname, 'password' => $model_confirm->password), 'confirm_email'),
                                'to' => $model->email,
                            );
                            Tool::mailsend($sendEmail);
                            echo "
                                <script>
                                alert('กรุณาตรวจสอบอีเมล์ เพื่อรับรหัสยืนยันตัวตนเข้าสู่ระบบ');
                                window.location='/site/index';
                                </script>
                                ";
                        }
                    }
                }
            } else {
                $model_user->username = Tool::Decrypted($model_user->username);
                $model_user->password = Tool::Decrypted($model_user->password);
                $model_user->password_confirm = Tool::Decrypted($model_user->password_confirm);
            }
        }

        $this->render('_register_person', array(
            'model' => $model,
            'model_user' => $model_user,
        ));
    }

    public function actionRegisterRegistration() {
//        if (Yii::app()->user->id)
//            $this->redirect(array('/site/index'));

        $model = new MemRegistration;
        $model_user = new MemUser();
        $model_confirm = new MemConfirm();

        if (isset($_POST['MemRegistration']) && isset($_POST['MemUser'])) {
            $model->attributes = $_POST['MemRegistration'];
            $model_user->attributes = $_POST['MemUser'];
            //กำหนดค่าที่ไม่ต้องการใช้
            $model->career = 0;
            $model->skill_com = 0;
            $model->receive_news = 0;
            //กำหนดค่าเริ่มต้นให้กับ user_id 
            $model->user_id = 0;
            $model_user->type = '2';
            $rndPass = Tool::GenPass(4);

            $model_user->username = Tool::Encrypted($model_user->username);
            $model_user->password = Tool::Encrypted($model_user->password);
            $model_user->password_confirm = Tool::Encrypted($model_user->password_confirm);

            $model->validate();
            $model_user->validate();

            if ($model->getErrors() == NULL && $model_user->getErrors() == NULL) {
                if ($model_user->save()) {
                    $model->user_id = $model_user->id;
                    $model_confirm->password = $rndPass;
                    $model_confirm->user_id = $model_user->id;
                    if ($model->save()) {
                        if ($model_confirm->save()) {
//                            $sendEmail = array(
//                                'subject' => 'ยืนยันการสมัครสมาชิก',
//                                'message' => Tool::messageEmail(array('name' => $model->ftname . ' ' . $model->ltname, 'password' => $model_confirm->password), 'confirm_email'),
//                                'to' => $model->email,
//                            );
//                            Tool::mailsend($sendEmail);
                            echo "
                                <script>
                                alert('".Yii::t('language', 'กรุณารอการยืนยันจากผู้ดูแลระบบ')."');
                                window.location='/site/index';
                                </script>
                                "; 
                        }
                    }
                } else {
                    echo "<pre>";
                    print_r(array($model_user->getErrors()));
                    echo "</pre>";
                }
            } else {
                $model_user->username = Tool::Decrypted($model_user->username);
                $model_user->password = Tool::Decrypted($model_user->password);
                $model_user->password_confirm = Tool::Decrypted($model_user->password_confirm);
            }
        }

        $this->render('_register_registration', array(
            'model' => $model,
            'model_user' => $model_user,
        ));
    }

    public function actionRegisterConfirm() {
        if (!Yii::app()->user->isConfirmUser())
            $this->redirect(array('/site/index'));

        $model = new RegisterConfirm;
        $id = Yii::app()->user->isConfirmUser();
        if ($id) {
            $users = MemConfirm::model()->find('user_id = ' . $id);
        }
        if (isset($_POST['RegisterConfirm'])) {
            $model->attributes = $_POST['RegisterConfirm'];
            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->register_confirm == $users->password) {
                    $users->status = 1;
                    if ($users->save()) {
                        echo "
                        <script>
                        alert('" . Yii::t('language', 'ยืนยันการสมัครเรียบร้อย') . "');
                        window.location='/site/index';
                        </script>
                        ";
                    }
                } else {
                    echo "
                    <script>
                    alert('" . Yii::t('langguage', 'รหัสยืนยันไม่ถูกต้อง กรุณาตรวจสอบ') . "');
                    window.location='/member/manage/registerConfirm';
                    </script>
                    ";
                }
            }
        }

        $this->render('_register_confirm', array(
            'model' => $model,
        ));
    }

    public function actionProfile() {
        if (Yii::app()->user->isAdmin()) {
            $profile = array();
        } else {
            if (Yii::app()->user->isMemberType() == 1) {
                
            } else if (Yii::app()->user->isMemberType() == 2) {
                
            }
            $profile = array();
        }


        $this->render('profile', array(
            'profile' => $profile,
        ));
    }

    public function actionAdmin() {
        $model = new MemUser;
        $model->unsetAttributes();
        if (isset($_GET['MemUser'])) {
            $model->attributes = $_GET['MemUser'];
            $model->member_name = $_GET['MemUser']['member_name'];
            $model->member_lname = $_GET['MemUser']['member_lname'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionViewAllowMember($id = null) {
        $type = MemUser::model()->findByPk($id);
//        $c = new CDbCriteria;

        if ($type->type == '1') {
//            $c->join = "left join member_person p on t.id";
            $model = MemPerson::model()->find('user_id = ' . $id);
            $type = MemPersonType::model()->findByPk($model->mem_type)->name;
            $businessType = CompanyTypeBusiness::model()->findByPk($model->business_type)->name;
            $panit = $model->panit; //มีเฉะพาะ สมาชิกธรรมดาที่เป็นประเภท ธุรกิจ
            $facebook = $model->facebook;
            $twitter = $model->twitter;
            $commerce_registration = '';
            $corporation_registration = '';
        } else {
//            $c->join = "left join member_registration r on t.id = r.user_id";
            $type = '';
            $model = MemRegistration::model()->find('user_id = ' . $id);
            $confirm = MemConfirm::model()->find('user_id = ' . $id . ' and status = 0');
            $businessType = CompanyTypeBusiness::model()->findByPk($model->type_business)->name;
            $panit = '';
            $facebook = '';
            $twitter = '';
            $commerce_registration = $model->commerce_registration;
            $corporation_registration = $model->corporation_registration;
        }
        $data = array(
            'name' => $model->ftname . ' ' . $model->ltname,
            'member_type' => $type,
            'address' => $model->address . ' ต.' . District::model()->findByPk($model->district)->name . ' อ.' . Prefecture::model()->findByPk($model->prefecture)->name . ' จ.' . Province::model()->findByPk($model->province)->name . ' ' . $model->postcode,
            'businessType' => $businessType,
            'productName' => $model->product_name,
            'panit' => $panit,
            'sex' => MemSex::model()->findByPk($model->sex)->name,
            'birth' => $model->birth,
            'email' => $model->email,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'commerce_registration' => $commerce_registration,
            'corporation_registration' => $corporation_registration,
            'tel' => $model->tel,
            'fax' => $model->fax,
            'mobile' => $model->mobile,
            'high_education' => HighEducation::model()->findByPk($model->high_education)->name,
        );

        $this->render('_view_allow_member', array(
            'data' => $data,
            'confirm' => $confirm,
        ));
    }

    public function actionAllowMember($id = null) {
        if ($id != null) {
            $model = MemConfirm::model()->find('user_id = ' . $id);
            if (!empty($model)) {
                $model->status = 1;
                if ($model->save()) {
                    echo "
                        <script>
                        alert('" . Yii::t('language', 'ยืนยันการเป็นสมาชิกเรียบร้อยแล้ว') . "');
                        window.location='/member/manage/admin';
                        </script>
                        ";
                }
            }
        }
    }

}

?>
