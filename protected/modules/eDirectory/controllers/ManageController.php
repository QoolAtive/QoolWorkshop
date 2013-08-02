<?php

class ManageController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('@'),
//                'actions' => array(''),
            ),
            array(
                'deny',
            ),
        );
    }

    public function actionIndex() {

        $model = Company::model()->find('user_id=:user_id', array(':user_id' => Yii::app()->user->id));

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionRegisEdirectory($id = null) {

        $permission = Company::model()->count('user_id=:user_id', array(':user_id' => Yii::app()->user->id));
//        if (($permission > 0 && $id != null) || (Yii::app()->user->isMemberType() == 1))
//            $this->redirect('/eDirectory/manage/index');

        if ($id == null) {
            $model = new Company();
            $model->unsetAttributes();

            $model_type = new CompanyType();
            $model_type->unsetAttributes();
        } else {
            $model = Company::model()->find("id = $id");

            $model_type = new CompanyType;
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

            $model->user_id = Yii::app()->user->id; // กำหนดเจ้าของ ธุรกิจ

            $type_id = $model_type->company_type; // เก็บประเภทธุรกิจ 

            $model_type->company_id = 0; // ค่า default
//            echo "<pre>";
//            print_r($type_id);
//            echo "</pre>";
//            die;
            if ($type_id != null)
                $model_type->company_type = 0;

            $file_logo = CUploadedFile::getInstancesByName('logo'); // เช็คว่ามีการอัพโหลดหรือไม่
            if ($file_logo != null) {
                $model->logo = 0;
            }

            $model->validate();
            $model_type->validate();
            if ($model->getErrors() == null && $model_type->getErrors() == null) {
                // ไฟล์ logo
//                $file_logo = CUploadedFile::getInstancesByName('logo');
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
                // ไฟล์ brochure
                $file_brochure = CUploadedFile::getInstancesByName('brochure');
                if ($file_brochure != null) {

                    $dir = './file/brochure/';
                    if ($model->brochure != null && $model->brochure != 'default.jpg') { // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
                        if (fopen($dir . $model->brochure, 'w'))
                            unlink($dir . $model->brochure);
                    }

                    $model->brochure = rand(000, 999) . $file_brochure[0]->name;

                    if (!is_dir($dir))
                        mkdir($dir, 0777, true);

                    $file_brochure[0]->saveAs($dir . $model->brochure);
                }
                if ($model->save()) {
                    CompanyType::model()->deleteAll('company_id=:company_id', array(':company_id' => $id)); // ลบประเภทที่เลือกก่อนหน้า

                    foreach ($type_id as $key => $value) { // เพิ่มประเภทของ Company
                        $type = new CompanyType();
                        $type->company_id = $model->id;
                        $type->company_type = $value;

                        $type->save();
                    }

                    $company_them = CompanyThem::model()->count('main_id=:main_id', array(':main_id' => $model->id));
                    if ($company_them < 1) {
                        $company_them = new CompanyThem();
                        $company_them->main_id = $model->id;
                        $company_them->status_appro = '0';
                        $company_them->date_write = date("Y-m-d H:i:s");
                        $company_them->save();
                    }

                    $file_banner = CUploadedFile::getInstancesByName('banner');
                    if ($file_banner != null) {
                        $dir = './file/banner/';
                        if (!is_dir($dir))
                            mkdir($dir, 0777, true);

                        $banner_old = SpBanner::model()->findAll('com_id=:com_id', array(':com_id' => $id)); //ลบไฟล์เก่า ถ้าหากมีการแก้ไขไฟล์ใหม่เข้ามา
                        foreach ($banner_old as $data) {
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
                        $this->redirect('/serviceProvider/manage/insertProduct/id/' . $model->id);
                    } else {
                        if (Yii::app()->user->getState('default_link_back_to_menu') != null) {
                            $link_back = Yii::app()->user->getState('default_link_back_to_menu');
                            echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='" . $link_back . "';
                            </script>
                            ";
                        } else {
                            echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='/eDirectory/manage/index';
                            </script>
                            ";
                        }
                    }
                } else {
//                    echo "<pre>";
//                    print_r(array($model->getErrors()));
//                    echo "</pre>";
                }
            }

//            echo "<pre>";
//            print_r(array($model->getErrors(), $model_type->getErrors()));
//            echo "</pre>";
            $type_list_data = $type_id;
        }
        $this->render('regis_edirectory', array(
            'model' => $model,
            'model_type' => $model_type,
            'type_list_data' => $type_list_data,
        ));
    }

}