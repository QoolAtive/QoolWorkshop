<?php

class AdminController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('admin'),
            ),
            array(
                'deny',
            ),
        );
    }

    public function actionIndex() {

        $model = new Company;
        if (isset($_GET['Company'])) {
            $model->attributes = $_GET['Company'];
        }

        $criteria = new CDbCriteria;
        $criteria->join = '
            inner join mem_user mu on t.user_id = mu.id
            left join company_product cp on t.id = cp.main_id
            left join company_them ct on t.id = ct.main_id
            ';
        $criteria->distinct = 't.name, t.name_en';
        $criteria->condition = 'ct.status_appro = 1 and ct.status_block = 0 and mu.type = 3';
//        $criteria->order = 't.id desc';

        $criteria->compare('t.name', $model->name, true);
        $criteria->compare('t.name_en', $model->name_en, true);
        $criteria->compare('t.main_business', $model->main_business, true);
        $criteria->compare('t.main_business_en', $model->main_business_en, true);
        $criteria->compare('t.sub_business', $model->sub_business, true);
        $criteria->compare('t.sub_business_en', $model->sub_business_en, true);

        $criteria2 = new CDbCriteria;
        $criteria2->join = '
            inner join mem_user mu on t.user_id = mu.id
            left join company_product cp on t.id = cp.main_id
            left join company_them ct on t.id = ct.main_id
            ';
        $criteria2->distinct = 'name, name_en';
        $criteria2->condition = 'ct.status_appro = 1 and ct.status_block = 0 and mu.id != 3';
//        $criteria->order = 't.id desc';

        $criteria2->compare('t.name', $model->name, true);
        $criteria2->compare('t.name_en', $model->name_en, true);
        $criteria2->compare('t.main_business', $model->main_business, true);
        $criteria2->compare('t.main_business_en', $model->main_business_en, true);
        $criteria2->compare('t.sub_business', $model->sub_business, true);
        $criteria2->compare('t.sub_business_en', $model->sub_business_en, true);

        $dataProviderAdmin = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id desc',
                'attributes' => array(
                    'name',
                    'name_en',
                    'main_business',
                    'main_business_en',
                    'sub_business',
                    'sub_business_en',
                ),
            ),
        ));

        $dataProviderUser = new CActiveDataProvider('Company', array(
            'criteria' => $criteria2,
            'sort' => array(
                'defaultOrder' => 'id desc',
                'attributes' => array(
                    'name',
                    'name_en',
                    'main_business',
                    'main_business_en',
                    'sub_business',
                    'sub_business_en',
                ),
            ),
        ));

        $this->render('index', array(
            'dataProviderAdmin' => $dataProviderAdmin,
            'dataProviderUser' => $dataProviderUser,
            'modelAdmin' => $model,
            'modelUser' => $model,
        ));
    }

    public function actionCompanyWaiting() {

        $model = new Company;
        if (isset($_GET['Company'])) {
            $model->attributes = $_GET['Company'];
        }

        $criteria = new CDbCriteria;
        $criteria->join = '
            left join company_product cp on t.id = cp.main_id
            left join company_them ct on t.id = ct.main_id
            ';
        $criteria->distinct = 'name, name_en';
        $criteria->condition = 'ct.status_appro = 0';

        $criteria->compare('name', $model->name, true);
        $criteria->compare('name_en', $model->name_en, true);
        $criteria->compare('main_business', $model->main_business, true);
        $criteria->compare('main_business_en', $model->main_business_en, true);
        $criteria->compare('sub_business', $model->sub_business, true);
        $criteria->compare('sub_business_en', $model->sub_business_en, true);

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id desc',
                'attributes' => array(
                    'name',
                    'name_en',
                    'main_business',
                    'main_business_en',
                    'sub_business',
                    'sub_business_en',
                ),
            ),
        ));

        $this->render('company_waiting', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionMotionSetting() {

        $model = new CompanyMotionSetting();
        if (isset($_GET['CompanyMotionSetting'])) {
            $model->attributes = $_GET['CompanyMotionSetting'];
        }

        $criteria = new CDbCriteria;
//        $criteria->order = '`use` = 1 desc, company_motion_setting_id desc';

        $criteria->compare('amount', $model->amount, true);
        $criteria->compare('type', $model->type, true);

        $dataProvider = new CActiveDataProvider('CompanyMotionSetting', array(
            'criteria' => $criteria,
            'sort' => array(
//                'defaultOrder' => '`use` = 1 desc, company_motion_setting_id desc',
                'defaultOrder' => 'company_motion_setting_id desc',
                'attributes' => array(
                    'amount' => array(
                        'asc' => 'amount, type',
                        'desc' => 'amount desc, type',
                    ),
                    'type' => array(
                        'asc' => 'type, amount',
                        'desc' => 'type desc, amount',
                    ),
                    '*',
                ),
            ),
        ));


        $this->render('motion_setting', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionCompanyComfirm($id = null) {
        $model = CompanyThem::model()->find('main_id = :main_id', array(':main_id' => $id));

        $model->status_appro = 1;
        if ($model->save()) {
            echo '
                <script>
                <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                alert("' . Yii::t('language', 'ยืนยันร้านค้าเรียบร้อย') . '");
                window.location="/eDirectory/admin/companyWaiting";
                </script>
                ';
        }
    }

    public function actionSetMotion($company_motion_setting_id = null) {
        $model_old = CompanyMotionSetting::model()->findAll();
        foreach ($model_old as $data) {
            $model_old_edit = CompanyMotionSetting::model()->findByPk($data['company_motion_setting_id']);
            $model_old_edit->use = 0;
            $model_old_edit->save();
        }

        if ($company_motion_setting_id != null) {
            $model = CompanyMotionSetting::model()->findByPk($company_motion_setting_id);

            if ($model->use == 0) {
                $model->use = 1;
            } else {
                $model->use = 0;
            }

            if ($model->save()) {
                $this->redirect('/eDirectory/admin/motionSetting');
            }
        }
    }

    public function actionMotionSettingInsert($company_motion_setting_id = null) {

        if ($company_motion_setting_id == null) {
            $model = new CompanyMotionSetting();
        } else {
            $model = CompanyMotionSetting::model()->findByPk($company_motion_setting_id);
        }

        if (isset($_POST['CompanyMotionSetting'])) {
            $model->attributes = $_POST['CompanyMotionSetting'];

            if ($model->use == 1) {
                $model_old = CompanyMotionSetting::model()->findAll();
                foreach ($model_old as $data) {
                    $model_old_edit = CompanyMotionSetting::model()->findByPk($data['company_motion_setting_id']);
                    $model_old_edit->use = 0;
                    $model_old_edit->save();
                }
            }

//            echo "<pre>";
//            print_r($model->attributes);
//            echo "</pre>";die;

            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {
                    echo "
                        <script>
                        alert('" . Yii::t('language', 'บันทึกเรียบร้อย') . "');
                        window.location='/eDirectory/admin/motionSetting';
                        </script>
                        ";
                }
            }
        }

        $this->render('motion_setting_insert', array(
            'model' => $model,
        ));
    }

    public function actionMotionSettingDel($company_motion_setting_id = null) {

        if ($company_motion_setting_id != null) {
            $model = CompanyMotionSetting::model()->find('company_motion_setting_id = :company_motion_setting_id', array(
                ':company_motion_setting_id' => $company_motion_setting_id,
            ));

            if ($model->use == 1) {
                echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากข้อมูลมีการใช้งานอยู่');
            } else {
                if ($model->delete())
                    echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        }
    }

    public function actionCompanyMotion() {

        $model = new Company;
        if (isset($_GET['Company'])) {
            $model->attributes = $_GET['Company'];
            $model->update_at = $_GET['Company']['update_at'];
            $model->motion_status = $_GET['Company']['motion_status'];
        }

        $date_motion = CompanyMotionSetting::model()->find('`use`=:use', array(':use' => 1));
        $data_motion = $date_motion->amount . ' ' . $date_motion->type;
        $date = date('Y-m-d');
        $strtime = strtotime($date);
        $caltime = strtotime("-$data_motion", $strtime);
        $update_at = date('Y-m-d', $caltime);

//        if ($update_at < date('Y-m-d')) {
//            echo "ข้อมูลไม่ได้อัพเดตมานานละนะ";
//        }
        $criteria = new CDbCriteria;
        $criteria->select = 't.*, cm.update_at as update_at, cm.status as motion_status, ct.status_block as status_block, ct.date_warning as date_warning';
        $criteria->join = '
            left join company_them ct on t.id = ct.main_id
            inner join company_motion cm on t.id = cm.company_id
            ';
        $criteria->distinct = 'name, name_en';
//        $criteria->order = 'cm.company_motion_id desc';
        $criteria->condition = "(ct.status_block = 1) or (ct.status_appro = 1 and cm.update_at < '" . $update_at . "')";

        $criteria->compare('name', $model->name, true);
        $criteria->compare('name_en', $model->name_en, true);
        $criteria->compare('cm.update_at', $model->update_at, true);
        $criteria->compare('cm.status', $model->motion_status, true);
        $criteria->compare('ct.status_appro', $model->status_block, true);

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'cm.company_motion_id desc',
                'attributes' => array(
                    'name',
                    'name_en',
                    'update_at' => array(
                        'asc' => 'cm.update_at',
                        'desc' => 'cm.update_at desc',
                    ),
                    'cm.status' => array(
                        'asc' => 'cm.status',
                        'desc' => 'cm.status desc',
                    ),
                    'status_block' => array(
                        'asc' => 'ct.status_appro',
                        'desc' => 'ct.status_appro desc',
                    ),
                ),
            ),
        ));

        $this->render('company_motion', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionCompanyMotionAlert() {
        if (isset($_POST['company'])) {
            $company = $_POST['company'];

            foreach ($company as $data) {
                $model = CompanyThem::model()->find('main_id = :main_id', array(':main_id' => $data));
                $model_company = Company::model()->findByPk($data);
                $model_profile_user = MemRegistration::model()->find('user_id=:user_id', array(':user_id' => $model_company->user_id));

                $name = $model_profile_user->ftname . ' ' . $model_profile_user->ltname;

                $model->status_block = 1;
                $model->date_warning = date('Y-m-d');
                $model->save();

                $message = '
                <strong>' . Yii::t('language', 'เรียน') . ' ' . Yii::t('language', 'คุณ') . $name . '</strong>
                <p>
                ร้านค้าของคุณไม่ได้รับการอัพเดทข้อมูลเป็นระยะเวลานาน<br />
                คุณจำเป็นต้องทำการอัพเดทข้อมูลของร้าน เพื่อที่จะให้ร้านค้าของคุณอยู่ในระบบต่อไป
                </p>
                <p>
                ผู้ดูแลระบบ
                </p>
                ';

                $sendEmail = array(
                    'subject' => Yii::t('language', 'รายการแจ้งเตือน'),
                    'message' => $message,
                    'to' => $model_profile_user->email,
                );
                Tool::mailsend($sendEmail);
            }

            $message = Yii::t('language', 'แจ้งไปยังร้านค้าเรียบร้อยแล้ว');

            echo "
                <script>
                alert('" . $message . "');
                window.location='/eDirectory/admin/companyMotion';
                </script>
                ";
        } else {
            $message = Yii::t('language', 'คุณยังไม่ได้เลือกร้านค้าที่กำหนด');

            echo "
                <script>
                alert('" . $message . "');
                window.location='/eDirectory/admin/companyMotion';
                </script>
                ";
        }

//        $this->renderPartial('company_motion_alert', array(
//            'message' => $message,
//        ));
    }

    public function actionInsertCompany($id = null) {
        if ($id == null) {
            $model = new Company();
            $model->unsetAttributes();

            $model_type = new CompanyType();
            $model_type->unsetAttributes();
        } else {
            $model = Company::model()->find("id = $id");

            $model_type = new CompanyType();
            $model_type->unsetAttributes();

            $type_list = CompanyType::model()->findAll('company_id=:company_id', array(':company_id' => $id));
            $type_list_data = array(); //เก็บข้อมูลที่เลือก ประเภท Company
            foreach ($type_list as $data) {
                array_push($type_list_data, $data['company_type']);
            }
        }

        if (isset($_POST['Company']) && isset($_POST['CompanyType'])) {
            $model->attributes = $_POST['Company'];
            $model_type->attributes = $_POST['CompanyType'];
            $type_id = $model_type->company_type;

            $model->user_id = Yii::app()->user->id; // กำหนดเจ้าของ ธุรกิจ

            $model_type->company_id = 0;
//            echo "<pre>";
//            print_r($type_id);
//            echo "</pre>";
//            
            if ($type_id != null)
                $model_type->company_type = 0;

            $model->validate();
            $model_type->validate();

//            echo "<pre>";
//            print_r(array($model->getErrors(), array($model_type->getErrors())));
//            echo "</pre>";

            if ($model->getErrors() == null && $model_type->getErrors() == null) {
                // ไฟล์ logo
                $file_logo = CUploadedFile::getInstancesByName('logo');
                if ($file_logo != null) {

                    $dir = './file/logo/'; // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
                    if ($model->logo != null && $model->logo != 'default.jpg') {
                        if (fopen($dir . $model->logo, 'w'))
                            unlink($dir . $model->logo);
                    }

                    $model->logo = rand(000, 999) . $file_logo[0]->name;

                    if (!is_dir($dir))
                        mkdir($dir, 0777, true);

                    $file_logo[0]->saveAs($dir . $model->logo);
                }

                if ($model->save()) {

                    $company_them = CompanyThem::model()->count('main_id=:main_id', array(':main_id' => $model->id)); // เพิ่มสถานะการการยอมรับ
                    if ($company_them < 1) {
                        $company_them = new CompanyThem();
                        $company_them->main_id = $model->id;
                        $company_them->status_appro = '1';
                        $company_them->date_write = date("Y-m-d H:i:s");
                        $company_them->save();
                    }

                    CompanyType::model()->deleteAll('company_id=:company_id', array(':company_id' => $id)); // ลบประเภทที่เลือกก่อนหน้า

                    foreach ($type_id as $key => $value) { // เพิ่มประเภทของ Company
                        $type = new CompanyType();
                        $type->company_id = $model->id;
                        $type->company_type = $value;

                        $type->save();
                    }

                    // ไฟล์ brochure
                    $file_brochure = CUploadedFile::getInstancesByName('brochure');
                    if ($file_brochure != null) {

                        $dir = './file/brochure/';

                        $brochure_old = CompanyBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $id)); //ลบไฟล์เก่า ถ้าหากมีการแก้ไขไฟล์ใหม่เข้ามา
                        foreach ($brochure_old as $data) {
                            if (fopen($dir . $data['path'], 'w')) {
                                unlink($dir . $data['path']);
                            }
                        }
                        CompanyBrochure::model()->deleteAll('com_id=:com_id', array(':com_id' => $id));


                        foreach ($file_brochure as $file) {
                            $file_name = rand(000, 999) . $file->name;
                            $file->saveAs($dir . $file_name);

                            $banner = new CompanyBrochure();
                            $banner->com_id = $model->id;
                            $banner->path = $file_name;
                            $banner->save();
                        }
                    }

                    $file_banner = CUploadedFile::getInstancesByName('banner');
                    if ($file_banner != null) {
                        $dir = './file/banner/';
                        if (!is_dir($dir))
                            mkdir($dir, 0777, true);

                        $banner_old = CompanyBanner::model()->findAll('com_id=:com_id', array(':com_id' => $id)); //ลบไฟล์เก่า ถ้าหากมีการแก้ไขไฟล์ใหม่เข้ามา
                        foreach
                        ($banner_old as $data) {
                            if (fopen($dir . $data['path'], 'w')) {
                                unlink($dir . $data['path']);
                            }
                        }
                        CompanyBanner::model()->deleteAll('com_id=:com_id', array(':com_id' => $id));

                        foreach ($file_banner as $file) {
                            $file_name = rand(000, 999) . $file->name;
                            $file->saveAs($dir . $file_name);

                            $banner = new CompanyBanner();
                            $banner->com_id = $model->id;
                            $banner->path = $file_name;
                            $banner->save();
                        }
                    }
                    if ($id == null) {
                        $this->redirect('/eDirectory/admin/insertProduct/id/' . $model->id);
                    } else {
                        echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='/eDirectory/admin/index';
                            </script>
                            ";
                    }
                } else {
//                    echo "<pre>";
//                    print_r(array($model->getErrors(), array($model_type->getErrors())));
//                    echo "</pre>";
                }
            } else {
                $type_list_data = $type_id;
            }
        } else {
//            echo "<pre>";
//            print_r(array($model->getErrors(), array($model_type->getErrors())));
//            echo "</pre>";
        }

        $this->render('_insert_company', array('model' => $model,
            'model_type' => $model_type,
            'type_list_data' => $type_list_data,
        ));
    }

    public function actionDelCompany($id = null) {
        $model = Company::model()->find('id=:id', array('id' => $id));

        $dir = './file/logo/'; // ลบไฟล์ logo
        if ($model->logo != null && $model->logo != 'default.jpg') {
            if (fopen($dir . $model->logo, 'w'))
                unlink($dir . $model->logo);
        }

        $dir = './file/brochure/';
        $brochure_old = CompanyBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $id)); //ลบไฟล์เก่า ถ้าหากมีการแก้ไขไฟล์ใหม่เข้ามา
        foreach ($brochure_old as $data) {
            if (fopen($dir . $data['path'], 'w')) {
                unlink($dir . $data['path']);
            }
        }
        CompanyBrochure::model()->deleteAll('com_id=:com_id', array(':com_id' => $id));

        $dir = './file/banner/';
        $banner_old = CompanyBanner::model()->findAll('com_id=:com_id', array(':com_id' => $id)); //ลบไฟล์เก่า ถ้าหากมีการแก้ไขไฟล์ใหม่เข้ามา
        foreach ($banner_old as $data) {
            if (fopen($dir . $data['path'], 'w')) {
                unlink($dir . $data['path']);
            }
        }
        CompanyBanner::model()->deleteAll('com_id=:com_id', array(':com_id' => $id));

        if ($model->delete()) {

            echo "ลบข้อมูลเรียบร้อย";
        }
    }

    public function actionProduct($id = null) { // id = รหัส พาร์ทเนอร์
        $model = new CompanyProduct;
        if (isset($_GET['CompanyProduct'])) {
            $model->attributes = $_GET['CompanyProduct'];
            $model->guide = $_GET['CompanyProduct']['guide'];
        }

        $criteria = new CDbCriteria;
        $criteria->join = "
            left join company c on t.main_id = c.id
            left join mem_user mu on c.user_id = mu.id
            ";
        $criteria->condition = 't.main_id = ' . $id;
        $criteria->order = 't.guide = 2 desc, t.guide = 1 desc, t.id desc';

        $criteria->compare('id', $model->id);
        $criteria->compare('main_id', $model->main_id);
        $criteria->compare('pic', $model->pic, true);
        $criteria->compare('t.name', $model->name, true);
        $criteria->compare('t.name_en', $model->name_en, true);
        $criteria->compare('t.detail', $model->detail, true);
        $criteria->compare('t.detail_en', $model->detail_en, true);
        $criteria->compare('t.date_write', $model->date_write, true);
        $criteria->compare('t.guide', $model->guide, true);

        $dataProvider = new CActiveDataProvider('CompanyProduct', array(
            'criteria' => $criteria,
        ));

        $this->render('product', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
            'id' => $id,
        ));
    }

    public function actionInsertProduct($id = null, $pro_id = null, $page = null) { // $id = รหัสพาร์ทเนอร์ pro_id = รหัสสินค้า
        if ($id == null) {
            $this->redirect('/eDirectory/admin/index');
        }
        if ($pro_id == null) {
            $model = new CompanyProduct();
            $model->unsetAttributes();

//            Yii::app()->user->setState('product_link_back_to_menu', '');
        } else {
            $model = CompanyProduct::model()->find(array('condition' => 'main_id=:main_id AND id=:id', 'params' => array(':main_id' => $id, ':id' => $pro_id)));
        }

        $return = new CHttpRequest();

        if (isset($_POST['CompanyProduct'])) {
            $model->attributes = $_POST['CompanyProduct'];
            $model->main_id = $id;
            $model->date_write = date('Y-m-d H:i:s');
            $model->validate();
            if ($model->getErrors() == null) {

                $model->pic = CUploadedFile::getInstance($model, 'pic');
                if ($model->pic != null && $model->pic != 'default') {
                    $dir = './file/product/';
                    if (!is_dir($dir))
                        mkdir($dir, 0777, true);

                    if ($model->pic != null) { // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
                        if (fopen($dir . $model->pic, 'w'))
                            unlink($dir . $model->pic);
                    }

                    $file_name = rand(000, 999) . $model->pic->name;
                    $model->pic->saveAs($dir . $file_name);

                    $model->pic = $file_name;
                } else {
                    $model->pic = 'default.jpg';
                }
//                echo "<pre>";
//                print_r($model->attributes);
//                echo "</pre>";
                if ($model->save()) {
                    if ($pro_id != null) {
                        if ($page == 'detail') {
                            echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='/eDirectory/default/companyDetail/id/$id';
                            </script>
                            ";
                            
                        } else {
                            echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location=\"/eDirectory/admin/product/id/$id\";
                            </script>
                            ";
                        }
                    } else {

                        echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='" . $return->getUrl() . "';
                            </script>
                            ";
                    }
                } else {
//                    echo "<pre>";
//                    print_r($model->getErrors());
//                    echo "</pre>";
                }
            } else {
//                echo "<pre>";
//                print_r($model->getErrors());
//                echo "</pre>";
            }
        }

        $this->render('_insert_product', array(
            'model' => $model,
            'id' => $id,
        ));
    }

    public function actionDelProduct($id = null, $pro_id = null) {

        $model = CompanyProduct::model()->find('main_id=:main_id and id=:id', array(':main_id' => $id, ':id' => $pro_id)); // id = รหัสร้านค้า pro_id = รหัสสินค้า

        $dir = './file/product/';
        if ($model->pic != null && $model->pic != 'default.jpg') {
            if (fopen($dir . $model->pic, 'w'))
                unlink($dir . $model->pic);
        }

        if ($model->delete()) {
            echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
        }
    }

    public function actionDelBanner() {
        $banner_id = $_POST['banner_id'];
        $company_id = $_POST['company_id'];
        $model_banner = CompanyBanner::model()->find('company_banner_id=:company_banner_id', array(':company_banner_id' => $banner_id));

        $dir = './file/banner/';
        if ($model_banner->path != null && $model_banner->path != 'default.jpg') { // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
            if (fopen($dir . $model_banner->path, 'w'))
                unlink($dir . $model_banner->path);
        }
        if ($model_banner != null) {
            $model_banner->delete();
        }

        $banner = CompanyBanner::model()->findAll('com_id=:com_id', array(':com_id' => $company_id));
        if ($banner != null) {
            $this->renderPartial('banner', array(
                'banner' => $banner,
                'company_id' => $company_id,
            ));
        }
    }

    public function actionDelBrochure() {
        $brochure_id = $_POST['brochure_id'];
        $company_id = $_POST['company_id'];

        $dir = './file/brochure/';
        $model_brochure = CompanyBrochure::model()->find('company_brochure_id=:company_brochure_id', array(':company_brochure_id' => $brochure_id));
        if ($model_brochure->path != null && $model_brochure->path != 'default.jpg') { // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
            if (fopen($dir . $model_brochure->path, 'w'))
                unlink($dir . $model_brochure->path);
        }

        if ($model_brochure != null) {
            $model_brochure->delete();
        }
        $brochure = CompanyBrochure::model()->findAll('com_id=:com_id', array(':com_id' => $company_id));
        if ($brochure != null) {
            $this->renderPartial('brochure', array(
                'brochure' => $brochure,
                'company_id' => $company_id,
            ));
        }
    }

    public function getDataFromExcel($file_path) {
        Yii::import('ext.PHPExcel.Classes.PHPExcel.IOFactory');
        Yii::import('ext.PHPExcel.Classes.PHPExcel.PHPExcel_IOFactory');
        Yii::import('ext.PHPExcel.Classes.PHPExcel.Cell.PHPExcel_Cell_DataType');

        $inputFileName = $file_path; // $inputFileName = './upload/file/' . $model->_file;
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($inputFileName);

        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();

        $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
        $headingsArray = $headingsArray[1];

        $r = -1;

        $row_old = '';
        $namedDataArray = array();
        for ($row = 1; $row <= $highestRow; ++$row) {

            $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
//                    if ((isset($dataRow[$row])['A']))) && ($dataRow[$row])['A']) > '')) {
            $c = -1;
            ++$r;

            foreach ($headingsArray as $columnKey => $columnHeading) {
                ++$c;
                $namedDataArray[$r][$c] = $dataRow[$row][$columnKey];
            }
//                    }
        }
//        echo "<pre>";
//        print_r($namedDataArray);
//        echo "</pre>";

        return $namedDataArray;
    }

    public function actionCompanyUpload() {

        $model = new CompanyUpload();

        $path = './file/company/';

        if (isset($_POST['CompanyUpload'])) {
            $model->file = CUploadedFile::getInstance($model, 'file');
            $model->validate();
            if ($model->getErrors() == null) {


                $file_name = time() . '_' . $model->file->getName();
                $model->file->saveAs($path . $file_name);

                $data_array = $this->getDataFromExcel($path . $file_name);

//            echo "<pre>";
//            print_r($data_array);
//            echo "</pre>";
//            die;

                $n = 0;
                $error = '';
                $errorTable = '';
                foreach ($data_array as $data) {
                    if ($n >= 2) {
                        $modelCompany = new Company();
                        $typeBusiness = explode(',', $data[1]);

                        $modelCompany->user_id = Yii::app()->user->id;

                        $messageError = Company::model()->getAttributeLabel('name');
                        $stError = CheckErrorCompany::haveErrorNull($data[2], $messageError);
                        if ($stError == null) {
                            $stError = CheckErrorCompany::haveErrorDup('name', $data[2], $messageError);
                            if ($stError == null) {
                                $modelCompany->name = $data[2];
                            } else {
                                $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                            }
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = Company::model()->getAttributeLabel('name_en');
                        $stError = CheckErrorCompany::haveErrorNull($data[2], $messageError);
                        if ($stError == null) {
                            $stError = CheckErrorCompany::haveErrorDup('name_en', $data[6], $messageError);
                            if ($stError == null) {
                                $modelCompany->name_en = $data[6];
                            } else {
                                $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                            }
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }


                        $messageError = Company::model()->getAttributeLabel('infor');
                        $stError = CheckErrorCompany::haveErrorNull($data[3], $messageError);
                        if ($stError == null) {
                            $modelCompany->infor = $data[3];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = Company::model()->getAttributeLabel('infor_en');
                        $stError = CheckErrorCompany::haveErrorNull($data[7], $messageError);
                        if ($stError == null) {
                            $modelCompany->infor_en = $data[7];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = Company::model()->getAttributeLabel('address');
                        $stError = CheckErrorCompany::haveErrorNull($data[4], $messageError);
                        if ($stError == null) {
                            $modelCompany->address = $data[4];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = Company::model()->getAttributeLabel('address_en');
                        $stError = CheckErrorCompany::haveErrorNull($data[8], $messageError);
                        if ($stError == null) {
                            $modelCompany->address_en = $data[8];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = Company::model()->getAttributeLabel('contact_name');
                        $stError = CheckErrorCompany::haveErrorNull($data[5], $messageError);
                        if ($stError == null) {
                            $modelCompany->contact_name = $data[5];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = Company::model()->getAttributeLabel('contact_name_en');
                        $stError = CheckErrorCompany::haveErrorNull($data[9], $messageError);
                        if ($stError == null) {
                            $modelCompany->contact_name_en = $data[9];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = Company::model()->getAttributeLabel('contact_tel');
                        $stError = CheckErrorCompany::haveErrorNull($data[10], $messageError);
                        if ($stError == null) {
                            $modelCompany->contact_tel = $data[10];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

//                    $messageError = Company::model()->getAttributeLabel('contact_fax') . ' ' . Yii::t('language', 'ไม่ควรเป็นค่าว่าง');
//                    $stError = CheckErrorCompany::haveErrorNull($data[5], $messageError);
//                    if ($stError == null) {
                        $modelCompany->contact_fax = $data[11];
//                    } else {
//                        $error .= CheckErrorCompany::errorTableDetail($n, $stError);
//                    }

                        $messageError = Company::model()->getAttributeLabel('contact_email');
                        $stError = CheckErrorCompany::haveErrorNull($data[12], $messageError);
                        if ($stError == null) {
                            $stError = CheckErrorCompany::verify_email($data[12], $messageError);
                            if ($stError == null) {
                                $modelCompany->contact_email = $data[12];
                            } else {
                                $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                            }
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }
//                    echo $data[16]. " : Email<br />";

                        $messageError = Company::model()->getAttributeLabel('website');
                        $stError = CheckErrorCompany::haveErrorNull($data[13], $messageError);
                        if ($stError == null) {
                            $modelCompany->website = $data[13];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }
//                    $messageError = Company::model()->getAttributeLabel('facebook') . ' ' . Yii::t('language', 'ไม่ควรเป็นค่าว่าง');
//                    $stError = CheckErrorCompany::haveErrorNull($data[5], $messageError);
//                    if ($stError == null) {
                        $modelCompany->facebook = $data[14];
//                    } else {
//                        $error .= CheckErrorCompany::errorTableDetail($n, $stError);
//                    }
//                    $messageError = Company::model()->getAttributeLabel('twitter') . ' ' . Yii::t('language', 'ไม่ควรเป็นค่าว่าง');
//                    $stError = CheckErrorCompany::haveErrorNull($data[5], $messageError);
//                    if ($stError == null) {
                        $modelCompany->twitter = $data[15];
//                    } else {
//                        $error .= CheckErrorCompany::errorTableDetail($n, $stError);
//                    }
//                    echo "<pre>";
//                    print_r($modelCompany->attributes);
//                    echo "</pre>";
                        $errorTypeBusiness = null;
                        $stError = CheckErrorCompany::haveErrorNull($data[1], 'ประเภทธุรกิจ');
                        if ($stError == null) {
                            foreach ($typeBusiness as $dataType) {
                                $stError = CheckErrorCompany::haveBusiness($dataType);
                                if ($stError != null) {
                                    if ($errorTypeBusiness == null) {
                                        $errorTypeBusiness .= $stError;
                                    } else {
                                        $errorTypeBusiness .= ', ' . $stError;
                                    }
                                }
                            }
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        if ($errorTypeBusiness != null) {
                            $error .= CheckErrorCompany::errorTableDetail($n, $errorTypeBusiness);
                        }

                        if (!empty($error)) {
//                        $errorTable = CheckErrorCompany::errorTableBegin() . $error . CheckErrorCompany::errorTableEnd();
                            $t_detail .= $error;
                            $error = '';
                        } else {
                            if ($modelCompany->save()) {

                                $company_them = CompanyThem::model()->count('main_id=:main_id', array(':main_id' => $modelCompany->id)); // เพิ่มสถานะการการยอมรับ
                                if ($company_them < 1) {
                                    $company_them = new CompanyThem();
                                    $company_them->main_id = $modelCompany->id;
                                    $company_them->status_appro = '1';
                                    $company_them->date_write = date("Y-m-d H:i:s");
                                    $company_them->save();
                                }

                                foreach ($typeBusiness as $dataType) {
                                    $modelTypeBusiness = new CompanyType();
                                    $modelTypeBusiness->company_id = $modelCompany->id;
                                    $modelTypeBusiness->company_type = $dataType;
                                    $modelTypeBusiness->save();
                                }
                            } else {
                                echo "<pre>";
                                print_r($modelCompany->getErrors());
                                echo "</pre>";
                            }

                            $error .= CheckErrorCompany::errorTableDetail($n, '', true);
                            $t_detail .= $error;
//                        $errorTable = CheckErrorCompany::errorTableBegin() . $error . CheckErrorCompany::errorTableEnd();
                            $error = '';
                        }
                    }
                    $n++;
                }
                if ($t_detail != null) {
                    $errorTable = CheckErrorCompany::errorTableBegin() . $t_detail . CheckErrorCompany::errorTableEnd();
                } else if ($n == 2) {
                    $error .= CheckErrorCompany::errorTableDetail($n, 'ข้อมูลไม่ถูกต้อง กรุณาตรวจสอบ');
                    $errorTable = CheckErrorCompany::errorTableBegin() . $error . CheckErrorCompany::errorTableEnd();
                }
            }
        }

        $this->render('company_upload_form', array(
            'model' => $model,
            'errorTable' => $errorTable,
        ));
    }

    public function actionCompanyProductUpload($company_id = null) {
        $model = new CompanyUpload();

        $path = './file/company/';

        if (isset($_POST['CompanyUpload'])) {
            $model->file = CUploadedFile::getInstance($model, 'file');
            $model->validate();
            if ($model->getErrors() == null) {

                $model->file = CUploadedFile::getInstance($model, 'file');
                $file_name = time() . '_' . $model->file->getName();
                $model->file->saveAs($path . $file_name);

                $data_array = $this->getDataFromExcel($path . $file_name);

//                echo "<pre>";
//                print_r($data_array);
//                echo "</pre>";

                $n = 0;
                $error = null;
                $errorTable = null;
                $t_detail = null;
                foreach ($data_array as $data) {
                    if ($n >= 4) {
                        $modelProduct = new CompanyProduct();
                        $modelProduct->main_id = $company_id;
                        $modelProduct->date_write = Date("Y-m-d H:i:s");

                        $messageError = CompanyProduct::model()->getAttributeLabel('name');
                        $stError = CheckErrorCompany::haveErrorNull($data[3], $messageError);
                        if ($stError == null) {
                            $stError = CheckErrorCompany::haveErrorDupProduct(array('main_id', 'name'), array($company_id, $data[3]), $messageError);
                            if ($stError == null) {
                                $modelProduct->name = $data[3];
                            } else {
                                $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                            }
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = CompanyProduct::model()->getAttributeLabel('name_en');
                        $stError = CheckErrorCompany::haveErrorNull($data[5], $messageError);
                        if ($stError == null) {
                            $stError = CheckErrorCompany::haveErrorDupProduct(array('main_id', 'name_en'), array($company_id, $data[5]), $messageError);
                            if ($stError == null) {
                                $modelProduct->name_en = $data[5];
                            } else {
                                $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                            }
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = CompanyProduct::model()->getAttributeLabel('detail');
                        $stError = CheckErrorCompany::haveErrorNull($data[4], $messageError);
                        if ($stError == null) {
                            $modelProduct->detail = $data[4];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = CompanyProduct::model()->getAttributeLabel('detail_en');
                        $stError = CheckErrorCompany::haveErrorNull($data[6], $messageError);
                        if ($stError == null) {
                            $modelProduct->detail_en = $data[6];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }

                        $messageError = CompanyProduct::model()->getAttributeLabel('guide');
                        $stError = CheckErrorCompany::haveErrorNull($data[2], $messageError);
                        if ($stError == null) {
                            $modelProduct->guide = $data[2];
                        } else {
                            $error .= CheckErrorCompany::errorTableDetail($n, $stError);
                        }
                        if ($error != null) {
                            $t_detail .= $error;
                            $error = null;
                        } else {
                            if ($modelProduct->save()) {
                                $t_detail .= CheckErrorCompany::errorTableDetail($n, '');
                                $error = null;
                            }
                        }
//                        echo "<pre>";
//                        print_r($modelProduct->attributes);
//                        echo "</pre>";
                    }
                    $n++;
                }

                $errorTable = CheckErrorCompany::errorTableBegin() . $t_detail . CheckErrorCompany::errorTableEnd();
            }
        }

        $this->render('company_product_upload_form', array(
            'model' => $model,
            'errorTable' => $errorTable,
            'id' => $company_id,
        ));
    }

}

?>
