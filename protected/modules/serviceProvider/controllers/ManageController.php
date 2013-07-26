<?php

Class ManageController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('admin')
            ),
            array(
                'deny',
            ),
        );
    }

    public function actionIndex() {
        $model = new SpTypeBusiness();
        $model->unsetAttributes();

        if (isset($_GET['SpTypeBusiness'])) {
            $model->attributes = $_GET['SpTypeBusiness'];
        }
        $model_com = new SpCompany();
        $model_com->unsetAttributes();

        if (isset($_GET['SpCompany'])) {
            $model_com->attributes = $_GET['SpCompany'];
        }
        $this->render('index', array(
            'model_com' => $model_com,
            'model' => $model,
        ));
    }

    public function actionTypeBusiness() {
        $model = new SpTypeBusiness();
        $model->unsetAttributes();

        if (isset($_GET['SpTypeBusiness'])) {
            $model->attributes = $_GET['SpTypeBusiness'];
        }

        $this->render('type_business', array(
            'model' => $model,
        ));
    }

    public function actionInsertTypeBusiness($id = null) {
        if ($id == null) {
            $model = new SpTypeBusiness();
            $model->unsetAttributes();

            $alertText = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/serviceProvider/manage/insertTypeBusiness';
        } else {
            $model = SpTypeBusiness::model()->findByPk($id);
            $alertText = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/serviceProvider/manage/index';
        }

        if (isset($_POST['SpTypeBusiness'])) {
            $model->attributes = $_POST['SpTypeBusiness'];
            $model->about_en = $_POST['SpTypeBusiness']['about_en'];

            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {
                    echo "
                       <script>
                       alert('" . Yii::t('language', $alertText) . "');
                       window.location='$link';
                       </script>
                       ";
                }
            }
        }

        $this->render('_insert_type_business', array(
            'model' => $model,
        ));
    }

    public function actionDelTypeBusiness($id = null) {
        $count = SpCompany::model()->count('type_business=:type_id', array(':type_id' => $id));

        if ($count < 1) {
            $model = SpTypeBusiness::model()->findByPk($id);
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ มีข้อมูลอ้างอิงอยู่');
        }
    }

    public function actionCompany() {
        $model = new SpCompany();
        $model->unsetAttributes();

        if (isset($_GET['SpCompany'])) {
            $model->attributes = $_GET['SpCompany'];
        }

        $this->render('company', array(
            'model' => $model,
        ));
    }

    public function actionInsertCompany($id = null) {
        if ($id == null) {
            $model = new SpCompany();
            $model->unsetAttributes();

            $model_type = new SpTypeCom;
            $model_type->unsetAttributes();
        } else {
            $model = SpCompany::model()->find("id = $id");

            $model_type = new SpTypeCom;
            $model_type->unsetAttributes();

            $type_list = SpTypeCom::model()->findAll('com_id=:com_id', array(':com_id' => $id));
            $type_list_data = array(); //เก็บข้อมูลที่เลือก ประเภท Company
            foreach ($type_list as $data) {
                array_push($type_list_data, $data['type_id']);
            }
        }

        if (isset($_POST['SpCompany']) && isset($_POST['SpTypeCom'])) {
            $model->attributes = $_POST['SpCompany'];
            $model_type->attributes = $_POST['SpTypeCom'];
            $type_id = $model_type->type_id;

            $model_type->com_id = 0;
//            echo "<pre>";
//            print_r($type_id);
//            echo "</pre>";
//            
            if ($type_id != null)
                $model_type->type_id = 0;

            $model->validate();
            $model_type->validate();
            if ($model->getErrors() == null && $model_type->getErrors() == null) {
                // ไฟล์ logo
                $file_logo = CUploadedFile::getInstancesByName('logo');
                if ($file_logo != null) {

                    $dir = './file/logo/'; // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
                    if ($model->logo != null) {
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
                    if ($model->brochure != null) { // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
                        if (fopen($dir . $model->brochure, 'w'))
                            unlink($dir . $model->brochure);
                    }

                    $model->brochure = rand(000, 999) . $file_brochure[0]->name;

                    if (!is_dir($dir))
                        mkdir($dir, 0777, true);

                    $file_brochure[0]->saveAs($dir . $model->brochure);
                }
                if ($model->save()) {
                    SpTypeCom::model()->deleteAll('com_id=:com_id', array(':com_id' => $id)); // ลบประเภทที่เลือกก่อนหน้า

                    foreach ($type_id as $key => $value) { // เพิ่มประเภทของ Company
                        $type = new SpTypeCom;
                        $type->com_id = $model->id;
                        $type->type_id = $value;

                        $type->save();
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
                        SpBanner::model()->deleteAll('com_id=:com_id', array(':com_id' => $id));

                        foreach ($file_banner as $file) {
                            $file_name = rand(000, 999) . $file->name;
                            $file->saveAs($dir . $file_name);

                            $banner = new SpBanner();
                            $banner->com_id = $model->id;
                            $banner->path = $file_name;
                            $banner->save();
                        }
                    }
                    if ($id == null) {
                        $this->redirect('/serviceProvider/manage/insertProduct/com_id/' . $model->id);
                    } else {
                        echo "
                            <script>
                            alert('" . Yii::t('language', 'แก้ไขข้อมูลเรียบร้อย') . "');
                            window.location='/';
                            </script>
                            ";
                    }
                } else {
                    echo "<pre>";
                    print_r(array($model->getErrors()));
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_company', array(
            'model' => $model,
            'model_type' => $model_type,
            'type_list_data' => $type_list_data,
        ));
    }

    public function actionDelCompany($id = null) {
        echo "Coming Soon.";
    }

    public function actionProduct($id = null, $pro_id = null) {
        if ($id == null) {
            $this->redirect('/serviceProvider/manage/company');
        }
        $model = new SpProduct();
        $model->unsetAttributes();

        if (isset($_GET['SpProduct'])) {
            $model->attributes = $_GET['SpProduct'];
        }

        $this->render('product', array(
            'model' => $model,
            'id' => $id,
        ));
    }

    public function actionInsertProduct($id = null, $pro_id = null) { // $id = รหัสพาร์ทเนอร์ pro_id = รหัสสินค้า
        if ($id == null) {
            $this->redirect('/serviceProvider/manage/company');
        }
        if ($pro_id == null) {
            $model = new SpProduct();
            $model->unsetAttributes();
        } else {
//            $model = SpProduct::model()->find('condition' => 'main_id=:main_id AND id=:id', array(':main_id' => $id, ':id' => $pro_id));
        }

        $return = new CHttpRequest();

        if (isset($_POST['SpProduct'])) {
            $model->attributes = $_POST['SpProduct'];
            $model->main_id = $id;
            $model->date_write = date('Y-m-d H:i:s');
            $model->validate();
            if ($model->getErrors() == null) {

                $model->image = CUploadedFile::getInstance($model, 'image');
                if ($model->image != null && $model->image != 'default') {
                    $dir = './file/product/';
                    if (!is_dir($dir))
                        mkdir($dir, 0777, true);

                    if ($model->image != null) { // ลบไฟล์เดิม (ถ้ามีการอัพไฟล์ใหม่)
                        if (fopen($dir . $model->image, 'w'))
                            unlink($dir . $model->image);
                    }

                    $file_name = rand(000, 999) . $model->image->name;
                    $model->image->saveAs($dir . $file_name);

                    $model->image = $file_name;
                }else {
                    $model->image = 'default.jpg';
                }

                if ($model->save()) {
                    echo "
                    <script>
                    alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                    window.location='" . $return->getUrl() . "';
                    </script>
                    ";
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            } else {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
            }
        }

        $this->render('_insert_product', array(
            'model' => $model,
            'id' => $id,
        ));
    }

}

?>
