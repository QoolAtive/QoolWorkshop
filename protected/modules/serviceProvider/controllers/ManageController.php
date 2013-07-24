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

            $alertText = 'เพิ่มข้อมูลเรียบร้อย';
            $link = '/serviceProvider/manage/insertTypeBusiness';
        } else {
            $model = SpTypeBusiness::model()->findByPk($id);
            $alertText = 'แก้ไขข้อมูลเรียบร้อย';
            $link = '/serviceProvider/manage/index#view7';
        }

        if (isset($_POST['SpTypeBusiness'])) {
            $model->attributes = $_POST['SpTypeBusiness'];

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
            $model_type = SpTypeCom::model()->findAll('com_id=:com_id', array(':com_id' => $id));
            $type_list = array();
            foreach ($model_type as $data) {
                $type_list[] = $data['type_id'];
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
                    $model->logo = rand(000, 999) . $file_logo[0]->name;
                    $dir = './file/logo/';
                    if (!is_dir($dir))
                        mkdir($dir, 0777, true);

                    $file_logo[0]->saveAs($dir . $model->logo);
                }
                // ไฟล์ brochure
                $file_brochure = CUploadedFile::getInstancesByName('brochure');
                if ($file_brochure != null) {
                    $model->brochure = rand(000, 999) . $file_brochure[0]->name;
                    $dir = './file/brochure/';
                    if (!is_dir($dir))
                        mkdir($dir, 0777, true);

                    $file_brochure[0]->saveAs($dir . $model->brochure);
                }
                if ($model->save()) {

                    foreach ($type_id as $key => $value) {
                        $type = new SpTypeCom;
                        $type->com_id = $model->id;
                        $type->type_id = $value;

                        $type->save();
                    }

                    $file_banner = CUploadedFile::getInstancesByName('banner');
                    if (isset($file_banner)) {
                        $dir = './file/banner/';
                        if (!is_dir($dir))
                            mkdir($dir, 0777, true);

                        foreach ($file_banner as $file) {
                            $file_name = rand(000, 999) . $file->name;
                            $file->saveAs($dir . $file_name);

                            $banner = new SpBanner();
                            $banner->com_id = $model->id;
                            $banner->path = $file_name;
                            $banner->save();
                        }
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
            'type_list' => $type_list,
        ));
    }

}

?>
