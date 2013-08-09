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

        $c = new CDbCriteria;
        $c->select = 't.*, ct.status_appro as status_appro';
        $c->join = 'left join company_them ct on t.id = ct.main_id';
        $c->condition = 't.user_id=:user_id';
        $c->params = array(':user_id' => Yii::app()->user->id);

        $model = Company::model()->find($c);

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionRegisEdirectory($id = null) {

        $permission = Company::model()->count('user_id=:user_id', array(':user_id' => Yii::app()->user->id));
        if (
                ($permission > 0 && $id == null)
//                || (Yii::app()->user->isMemberType() == 1)
        ) {
            $this->redirect('/eDirectory/manage/index');
        }

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

                    $company_motion = CompanyMotion::model()->find('company_id=:company_id', array(':company_id' => $model->id));
                    echo count($company_motion);
                    if (count($company_motion) < 1) {
                        $company_motion = new CompanyMotion();
                        $company_motion->user_id = Yii::app()->user->id;
                        $company_motion->company_id = $model->id;
                        $company_motion->status = '1';
                        $company_motion->update_at = date('Y-m-d');
                        $company_motion->save();
                    } else {
                        $company_motion->status = '1';
                        $company_motion->update_at = date('Y-m-d');
                        $company_motion->save();
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
                        $this->redirect('/eDirectory/manage/insertProduct/id/' . $model->id);
                    } else {
                        echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='/eDirectory/manage/index';
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

        $this->render('regis_edirectory', array(
            'model' => $model,
            'model_type' => $model_type,
            'type_list_data' => $type_list_data,
        ));
    }

    public function actionProduct() { // id = รหัส พาร์ทเนอร์
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
        $criteria->condition = 'c.user_id = ' . Yii::app()->user->id;

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
        ));
    }

    public function actionInsertProduct($id = null, $pro_id = null) { // $id = รหัสพาร์ทเนอร์ pro_id = รหัสสินค้า
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
                }else {
                    $model->pic = 'default.jpg';
                }
//                echo "<pre>";
//                print_r($model->attributes);
//                echo "</pre>";
                if ($model->save()) {
                    if ($pro_id != null) {
                        echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location=\"/eDirectory/admin/product/id/$id\";
                            </script>
                            ";
                    } else {
//                    if (Yii::app()->user->getState('default_link_back_to_menu') != null) {
//                        $link_back = Yii::app()->user->getState('default_link_back_to_menu');
//                        echo "
//                            <script>
//                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
//                            window.location='" . $link_back . "';
//                            </script>
//                            ";
//                    } else {
                        echo "
                            <script>
                            alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                            window.location='" . $return->getUrl() . "';
                            </script>
                            ";
//                    }
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

}