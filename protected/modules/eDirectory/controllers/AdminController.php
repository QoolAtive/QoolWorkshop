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
            left join company_product cp on t.id = cp.main_id
            left join company_them ct on t.id = ct.main_id
            ';
        $criteria->distinct = 'name, name_en';
        $criteria->condition = 'ct.status_appro = 1';

        $criteria->compare('name', $model->name, true);
        $criteria->compare('name_en', $model->name_en, true);
        $criteria->compare('infor', $model->infor, true);
        $criteria->compare('infor_en', $model->infor_en, true);
        $criteria->compare('main_business', $model->main_business, true);
        $criteria->compare('main_business_en', $model->main_business_en, true);
        $criteria->compare('sub_business', $model->sub_business, true);
        $criteria->compare('sub_business_en', $model->sub_business_en, true);
        $criteria->compare('address', $model->address, true);
        $criteria->compare('address_en', $model->address_en, true);
        $criteria->compare('contact_name', $model->contact_name, true);
        $criteria->compare('contact_name_en', $model->contact_name_en, true);
        $criteria->compare('contact_tel', $model->contact_tel, true);
        $criteria->compare('contact_fax', $model->contact_fax, true);
        $criteria->compare('contact_email', $model->contact_email, true);
        $criteria->compare('facebook', $model->facebook, true);
        $criteria->compare('twitter', $model->twitter, true);
        $criteria->compare('website', $model->website, true);
        $criteria->compare('banner', $model->banner, true);
        $criteria->compare('brochure', $model->brochure, true);

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
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
        $criteria->compare('infor', $model->infor, true);
        $criteria->compare('infor_en', $model->infor_en, true);
        $criteria->compare('main_business', $model->main_business, true);
        $criteria->compare('main_business_en', $model->main_business_en, true);
        $criteria->compare('sub_business', $model->sub_business, true);
        $criteria->compare('sub_business_en', $model->sub_business_en, true);
        $criteria->compare('address', $model->address, true);
        $criteria->compare('address_en', $model->address_en, true);
        $criteria->compare('contact_name', $model->contact_name, true);
        $criteria->compare('contact_name_en', $model->contact_name_en, true);
        $criteria->compare('contact_tel', $model->contact_tel, true);
        $criteria->compare('contact_fax', $model->contact_fax, true);
        $criteria->compare('contact_email', $model->contact_email, true);
        $criteria->compare('facebook', $model->facebook, true);
        $criteria->compare('twitter', $model->twitter, true);
        $criteria->compare('website', $model->website, true);
        $criteria->compare('banner', $model->banner, true);
        $criteria->compare('brochure', $model->brochure, true);

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
        ));

        $this->render('company_waiting', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionCompanyDetail($id) {
//        $count_company_view = ComanyCountView::model()->count('company_id=:company_id', array(':company_id' => $id));
//        if ($count_company_view < 1) {
//            $model_count = new ComanyCountView();
//            $model_count->company_id = $id;
//            $model_count->count_company_view = 1;
//            $model_count->update_at = date("Y-m-d H:i:s");
//            if ($model_count->save()) {
//                
//            } else {
//                echo "<pre>";
//                print_r($model_count->getErrors());
//                echo "</pre>";
//            }
//        } else {
//            $model_count = ComanyCountView::model()->find('company_id=:company_id', array(':company_id' => $id));
//            $model_count->count_company_view = $model_count->count_company_view + 1;
//            $model_count->update_at = date("Y-m-d H:i:s");
//            $model_count->save();
//        }

        $model = Company::model()->find('id=:id', array(':id' => $id));
        $model_user = MemRegistration::model()->find('id=:id', array(':id' => $model->user_id));

        $this->render('company_detail', array(
            'model' => $model,
            'model_user' => $model_user,
            'type_business_back' => $type,
        ));
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

            $type_list = CompanyType::model()->findAll('com_id=:com_id', array(':com_id' => $id));
            $type_list_data = array(); //เก็บข้อมูลที่เลือก ประเภท Company
            foreach ($type_list as $data) {
                array_push($type_list_data, $data['company_type']);
            }
        }

        if (isset($_POST['Company']) && isset($_POST['CompanyType'])) {
            $model->attributes = $_POST['Company'];
            $model_type->attributes = $_POST['CompanyType'];
            $type_id = $model_type->type_id;

            $model_type->com_id = 0;
//            echo "<pre>";
//            print_r($type_id);
//            echo "</pre>";
//            
            if ($type_id != null)
                $model_type->company_type = 0;

            $model->validate();
            $model_type->validate();
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
                    CompanyType::model()->deleteAll('com_id=:com_id', array(':com_id' => $id)); // ลบประเภทที่เลือกก่อนหน้า

                    foreach ($type_id as $key => $value) { // เพิ่มประเภทของ Company
                        $type = new CompanyType();
                        $type->com_id = $model->id;
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
                        $this->redirect('/eDirectory/admin/insertProduct/id/' . $model->id);
                    } else {
                        echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='/eDirectory/admin/company';
                            </script>
                            ";
                    }
                } else {
//                    echo "<pre>";
//                    print_r(array($model->getErrors()));
//                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_company', array(
            'model' => $model,
            'model_type' => $model_type,
            'type_list_data' => $type_list_data,
        ));
    }

}

?>
