<?php

class DefaultController extends Controller {

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

        $this->render('index');
    }

    public function actionHighEducation() {
        $model = new HighEducation();
        $model->unsetAttributes();

        if (isset($_GET['HighEducation'])) {
            $model->attributes = $_GET['HighEducation'];
        }

        $this->render('high_education', array(
            'model' => $model,
        ));
    }

    public function actionInsertHighEducation($id = '') {
        if ($id == '') {
            $model = new HighEducation();
            $alert = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/insertHighEducation';
        } else {
            $model = HighEducation::model()->findByPk($id);
            $alert = 'แก้ไขข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/highEducation';
        }

        if (isset($_POST['HighEducation'])) {
            $model->attributes = $_POST['HighEducation'];
            if ($model->validate()) {
                if ($model->save()) {
                    echo "
                        <script>
                        alert('$alert');
                        window.location='$link';
                        </script>
                        ";
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_high_education', array(
            'model' => $model,
        ));
    }

    public function actionDelHighEducation($id) {
        $con1 = MemPerson::model()->count('high_education = ' . $id);
        $con2 = MemRegistration::model()->count('high_education = ' . $id);
        if (($con1 + $con2) < 1) {
            $model = HighEducation::model()->findByPk($id);
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ มีข้อมูลอ้างอิงอยู่');
        }
    }

    public function actionCompanyTypeBusiness() {
        $model = new CompanyTypeBusiness();
        $model->unsetAttributes();

        if (isset($_GET['CompanyTypeBusiness'])) {
            $model->attributes = $_GET['CompanyTypeBusiness'];
        }

        $this->render('company_type_business', array(
            'model' => $model,
        ));
    }

    public function actionInsertCompanyTypeBusiness($id = '') {
        if ($id == '') {
            $model = new CompanyTypeBusiness();
            $alert = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/insertCompanyTypeBusiness';
        } else {
            $model = CompanyTypeBusiness::model()->findByPk($id);
            $alert = 'แก้ไขข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/companyTypeBusiness';
        }

        if (isset($_POST['CompanyTypeBusiness'])) {
            $model->attributes = $_POST['CompanyTypeBusiness'];
            if ($model->validate()) {
                if ($model->save()) {
                    echo "
                        <script>
                        alert('$alert');
                        window.location='$link';
                        </script>
                        ";
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_company_type_business', array(
            'model' => $model,
        ));
    }

    public function actionDelCompanyTypeBusiness($id) {
        $con1 = MemPerson::model()->count('high_education = ' . $id);
        $con2 = MemRegistration::model()->count('high_education = ' . $id);
        if (($con1 + $con2) < 1) {
            $model = HighEducation::model()->findByPk($id);
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ มีข้อมูลอ้างอิงอยู่');
        }
    }

    public function actionSex() {
        $model = new MemSex();
        $model->unsetAttributes();

        if (isset($_GET['MemSex'])) {
            $model->attributes = $_GET['MemSex'];
        }

        $this->render('sex', array(
            'model' => $model,
        ));
    }

    public function actionInsertSex($id = '') {
        if ($id == '') {
            $model = new MemSex();
            $alert = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/insertSex';
        } else {
            $model = MemSex::model()->findByPk($id);
            $alert = 'แก้ไขข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/sex';
        }

        if (isset($_POST['MemSex'])) {
            $model->attributes = $_POST['MemSex'];
            if ($model->validate()) {
                if ($model->save()) {
                    echo "
                        <script>
                        alert('$alert');
                        window.location='$link';
                        </script>
                        ";
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_sex', array(
            'model' => $model,
        ));
    }

    public function actionDelSex($id) {
        $con1 = MemPerson::model()->count('sex = ' . $id);
        $con2 = MemRegistration::model()->count('sex = ' . $id);
        if (($con1 + $con2) < 1) {
            $model = MemSex::model()->findByPk($id);
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ มีข้อมูลอ้างอิงอยู่');
        }
    }

    public function actionTitleName() {
        $model = new TitleName();
        $model->unsetAttributes();

        if (isset($_GET['TitleName'])) {
            $model->attributes = $_GET['TitleName'];
        }

        $this->render('title_name', array(
            'model' => $model,
        ));
    }

    public function actionInsertTitleName($id = '') {
        if ($id == '') {
            $model = new TitleName();
            $alert = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/insertTitleName';
        } else {
            $model = TitleName::model()->findByPk($id);
            $alert = 'แก้ไขข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/titleName';
        }

        if (isset($_POST['TitleName'])) {
            $model->attributes = $_POST['TitleName'];
//
//            echo "<pre>";
//            print_r($model->attributes);
//            echo "</pre>";
            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {
                    echo "
                        <script>
                        alert('$alert');
                        window.location='$link';
                        </script>
                        ";
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_title_name', array(
            'model' => $model,
        ));
    }

    public function actionDelTitleName($id) {
        $con1 = MemPerson::model()->count('tname = ' . $id);
        $con2 = MemRegistration::model()->count('etname = ' . $id);
        $con3 = MemPerson::model()->count('tname = ' . $id);
        $con4 = MemRegistration::model()->count('etname = ' . $id);
        if (($con1 + $con2 + $con3 + $con4) < 1) {
            $model = TitleName::model()->findByPk($id);
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ มีข้อมูลอ้างอิงอยู่');
        }
    }

}