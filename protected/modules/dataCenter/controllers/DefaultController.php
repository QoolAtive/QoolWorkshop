<?php

class DefaultController extends Controller {

    public function filters() {
        return array(
            'rights'
        );
    }

//    public function accessRules() {
//        return array(
//            array(
//                'allow',
//                'users' => array('admin')
//            ),
//            array(
//                'deny',
//            ),
//        );
//    }

    public function actionIndex() {
//        Tool::AutoMotionWarning();
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
            $alert = 'บันทึกข้อมูลเรียบร้อย';
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

        $modelSubType = new CompanySubTypeBusiness();
        $modelSubType->unsetAttributes();

        if (isset($_GET['CompanySubTypeBusiness'])) {
            $modelSubType->attributes = $_GET['CompanySubTypeBusiness'];
        }

        if (isset($_GET['CompanyTypeBusiness'])) {
            $model->attributes = $_GET['CompanyTypeBusiness'];
        }

        $this->render('company_type_business', array(
            'model' => $model,
            'modelSubType' => $modelSubType,
            'dataProvider' => $modelSubType->getData(),
        ));
    }

    public function actionInsertCompanyTypeBusiness($id = '') {
        if ($id == '') {
            $model = new CompanyTypeBusiness();
            $alert = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/insertCompanyTypeBusiness';
        } else {
            $model = CompanyTypeBusiness::model()->findByPk($id);
            $alert = 'บันทึกข้อมูลเรียบร้อย';
            $link = '/dataCenter/default/companyTypeBusiness';
        }

        if (isset($_POST['CompanyTypeBusiness'])) {
            $model->attributes = $_POST['CompanyTypeBusiness'];
            if ($model->validate()) {
                if ($model->save()) {

                    //เพิ่มลง site map
                    $dataSiteMap = array(
                        'id_code' => $model->id,
                        'sub_id' => null,
                        'name' => $model->name,
                        'name_en' => $model->name_en,
                        'link' => '/eDirectory/default/index/id/' . $model->id,
                    );
                    Tool::addSiteMap(4, $dataSiteMap);
                    // - - - - -- 

                    echo "
                        <meta charset='UTF-8'></meta>
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

    public function actionCompanySubTypeBusinessInsert($company_sub_type_business_id = null) {
        if ($company_sub_type_business_id == null) {
            $model = new CompanySubTypeBusiness();
            $model->unsetAttributes();
        } else {
            $model = CompanySubTypeBusiness::model()->find('company_sub_type_business_id = :id', array(':id' => $company_sub_type_business_id));
        }

        if (isset($_POST['CompanySubTypeBusiness'])) {
            $model->attributes = $_POST['CompanySubTypeBusiness'];
            if ($model->validate()) {
                if ($model->save()) {
                    echo "
                        <meta charset='UTF-8'></meta>
                        <script>
                        alert('" . Yii::t('language', 'บันทึกเรียบข้อมูลเรียบร้อย') . "');
                        window.location='/dataCenter/default/companySubTypeBusinessInsert';
                        </script>
                        ";
                }
            }
        }

        $this->render('company_sub_type_business_insert', array(
            'model' => $model,
        ));
    }
    
    public function actionUpDateNo(){
        if(isset($_POST['type_id'])){
            $model = CompanySubTypeBusiness::model()->find('company_sub_type_business_id = :id', array(':id' => $_POST['type_id']));
            $model->no = $_POST['value'];
            if(!$model->save()){
                echo '<pre>';
                print_r($model->getErrors()); 
            }
        }
    } 
    
    public function actionCompanySubTypeBusinessDel($company_sub_type_business_id = null) {
        $count1 = CompanyType::model()->count('company_sub_type_id = :id', array(
            ':id' => $company_sub_type_business_id,
        ));

        if ($count1 < 1) {
            $model = CompanySubTypeBusiness::model()->find('company_sub_type_business_id = :id', array(
                ':id' => $company_sub_type_business_id,
            ));
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            } else {
                echo "<pre>";
                print_r($model->getErrors());
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
        }
    }

    public function actionDelCompanyTypeBusiness($id) {
        $con1 = MemPerson::model()->count('high_education = ' . $id);
        $con2 = MemRegistration::model()->count('high_education = ' . $id);
        if (($con1 + $con2) < 1) {
            $model = CompanyTypeBusiness::model()->findByPk($id);
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
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
            $alert = 'บันทึกข้อมูลเรียบร้อย';
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
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
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
            $alert = 'บันทึกข้อมูลเรียบร้อย';
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
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
        }
    }

    public function actionTitleWeb() {

        $model = new TitleWeb();
        if (isset($_GET['TitleWeb'])) {
            $model->attributes = $_GET['TitleWeb'];
        }

        $criteria = new CDbCriteria;
        $criteria->order = 't.title_web_id desc';
        $criteria->compare('detail', $model->detail, true);
        $criteria->compare('detail_en', $model->detail_en, true);

        $dataProvider = new CActiveDataProvider('TitleWeb', array(
            'criteria' => $criteria,
        ));

        $this->render('title_web', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionTitleWebInsert($title_web_id = null) {
        if ($title_web_id == null) {
            $model = new TitleWeb();
        } else {
            $model = TitleWeb::model()->findByPk($title_web_id);
        }
        if (isset($_POST['TitleWeb'])) {
            $model->attributes = $_POST['TitleWeb'];
            $model->validate();
            if ($model->getErrors() == null) {

                if ($model->status == 1) {
                    $setDefault = TitleWeb::model()->findAll();
                    foreach ($setDefault as $dataSet) {
                        $set = TitleWeb::model()->find('title_web_id = :title_web_id', array(':title_web_id' => $dataSet['title_web_id']));
                        $set->status = 0;
                        $set->save();
                    }
                }

                if ($model->save()) {
                    echo "
                        <meta charset='UTF-8'></meta>
                        <script>
                        alert('" . Yii::t('language', 'บันทึกเรียบข้อมูลเรียบร้อย') . "');
                        window.location='/dataCenter/default/titleWeb';
                        </script>
                        ";
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                }
            }
        }

        $this->render('title_web_insert', array(
            'model' => $model,
        ));
    }

    public function actionTitleWebSet($title_web_id = null) {
        if ($title_web_id != null) {
            $setDefault = TitleWeb::model()->findAll();
            foreach ($setDefault as $dataSet) {
                $set = TitleWeb::model()->find('title_web_id = :title_web_id', array(':title_web_id' => $dataSet['title_web_id']));
                $set->status = 0;
                $set->save();
            }

            $model = TitleWeb::model()->find('title_web_id = :title_web_id', array(':title_web_id' => $title_web_id));
            $model->status = 1;
            if ($model->save()) {
                echo "
                    <meta charset='UTF-8'></meta>
                    <script>
                    alert('" . Yii::t('language', 'ตั้งค่าเรียบร้อย') . "');
                    window.location='/dataCenter/default/titleWeb';
                    </script>
                    ";
            }
        }
    }

    public function actionTitleWebDel($title_web_id = null) {
        if ($title_web_id != null) {
            $model = TitleWeb::model()->find('title_web_id = :title_web_id', array(':title_web_id' => $title_web_id));
            if ($model->status == 1) {
                echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
            } else {
                if ($model->delete()) {
                    echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
                }
            }
        }
    }

    public function actionDescription() {
        $model = new Description();
        if (isset($_GET['Description'])) {
            $model->attributes = $_GET['Description'];
        }

        $criteria = new CDbCriteria;

        $criteria->compare('description_id', $model->description_id);
        $criteria->compare('detail', $model->detail, true);
        $criteria->compare('detail', $model->detail_en, true);
        $criteria->compare('status', $model->status);

        $dataProvider = new CActiveDataProvider('Description', array(
            'criteria' => $criteria,
        ));

        $this->render('description', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionDescriptionInsert($description_id = null) {
        if ($description_id == null) {
            $model = new Description();
        } else {
            $model = Description::model()->find('description_id = :description_id', array(':description_id' => $description_id));
        }

        if (isset($_POST['Description'])) {
            $model->attributes = $_POST['Description'];

            $model->validate();

            if ($model->getErrors() == null) {

                if ($model->save()) {
                    echo "
                    <meta charset='UTF-8'></meta>
                    <script>
                    alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                    window.location='/dataCenter/default/description';
                    </script>
                    ";
                } else {
                    
                }
            }
        }

        $this->render('description_insert', array(
            'model' => $model,
        ));
    }

    public function actionDescriptionSet($description_id = null) {
        if ($description_id != null) {
            $setDefault = Description::model()->findAll();
            foreach ($setDefault as $dataSet) {
                $set = Description::model()->find('description_id = :description_id', array(':description_id' => $dataSet['description_id']));
                $set->status = 0;
                $set->save();
            }

            $model = Description::model()->find('description_id = :description_id', array(':description_id' => $description_id));
            $model->status = 1;
            if ($model->save()) {
                echo "
                    <meta charset='UTF-8'></meta>
                    <script>
                    alert('" . Yii::t('language', 'ตั้งค่าเรียบร้อย') . "');
                    window.location='/dataCenter/default/description';
                    </script>
                    ";
            }
        }
    }

    public function actionDescriptionDel($description_id = null) {
        if ($description_id != null) {
            $model = Description::model()->find('description_id = :description_id', array(':description_id' => $description_id));
            if ($model->status == 1) {
                echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
            } else {
                if ($model->delete()) {
                    echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
                }
            }
        }
    }

    public function actionKeyword() {
        $model = new Keyword();
        if ($_GET['Keyword']) {
            $model->attributes = $_GET['Keyword'];
        }

        $criteria = new CDbCriteria;
        $criteria->order = 't.keyword_id desc';

        $criteria->compare('name', $model->name, true);

        $dataProvider = new CActiveDataProvider('Keyword', array(
            'criteria' => $criteria,
        ));

        $this->render('keyword', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionKeywordInsert($keyword_id = null) {
        if ($keyword_id == null) {
            $model = new Keyword();
        } else {
            $model = Keyword::model()->find('keyword_id = :keyword_id', array(':keyword_id' => $keyword_id));
        }

        if ($_POST['Keyword']) {
            $model->attributes = $_POST['Keyword'];

            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {
                    echo "
                        <meta charset='UTF-8'></meta>
                        <script>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.location='/dataCenter/default/keyword';
                        </script>
                        ";
                }
            }
        }

        $this->render('keyword_insert', array(
            'model' => $model,
        ));
    }

    public function actionKeywordDel($keyword_id = null) {
        if ($keyword_id != null) {
            $model = Keyword::model()->find('keyword_id = :keyword_id', array(':keyword_id' => $keyword_id));
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        }
    }

    public function actionSiteMap() {
        $modelSiteMap = new SiteMap();
        $modelSiteMapSub = new SiteMapSub();

        if (isset($_GET['SiteMap']) || $_GET['SiteMapSub']) {
            $modelSiteMap->attributes = $_GET['SiteMap'];
            $modelSiteMapSub->attributes = $_GET['SiteMapSub'];
        }

        $this->render('site_map', array(
            'modelSiteMap' => $modelSiteMap,
            'dataProvider' => $modelSiteMap->getData(),
            'modelSiteMapSub' => $modelSiteMapSub,
            'dataProviderSub' => $modelSiteMapSub->getData(),
        ));
    }

    public function actionSiteMapInsert($site_map_id = null) {
        if ($site_map_id == null) {
            $model = new SiteMap();
        } else {
            $model = SiteMap::model()->find('site_map_id = :site_map_id', array(':site_map_id' => $site_map_id));
        }

        if (isset($_POST['SiteMap'])) {
            $model->attributes = $_POST['SiteMap'];

            $model->validate();
            if ($model->getErrors() == null) {

//                echo "<pre>";
//                print_r($model->attributes);die;

                if ($model->save()) {
                    echo "
                        <meta charset='UTF-8'></meta>
                        <script>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.location='/dataCenter/default/siteMap';
                        </script>
                        ";
                }
            } else {
//                echo "<pre>";
//                print_r($model->getErrors());
            }
        }



        $this->render('site_map_insert', array(
            'model' => $model,
        ));
    }

    public function actionSiteMapDel($site_map_id = null) {
        $count = SiteMapSub::model()->count('main_id = :main_id', array(':main_id' => $site_map_id));
        if ($count < 1) {
            $model = SiteMap::model()->find('site_map_id = :site_map_id', array(':site_map_id' => $site_map_id));
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        } else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
        }
    }

    public function actionSiteMapSubInsert($site_map_sub_id = null) {
        if ($site_map_sub_id == null) {
            $model = new SiteMapSub();
        } else {
            $model = SiteMapSub::model()->find('site_map_sub_id = :site_map_sub_id', array(':site_map_sub_id' => $site_map_sub_id));
        }

        if (isset($_POST['SiteMapSub'])) {
            $model->attributes = $_POST['SiteMapSub'];

            $model->validate();
            if ($model->getErrors() == null) {

//                echo "<pre>";
//                print_r($model->attributes);die;

                if ($model->save()) {
                    echo "
                        <meta charset='UTF-8'></meta>
                        <script>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.location='/dataCenter/default/siteMap';
                        </script>
                        ";
                }
            } else {
//                echo "<pre>";
//                print_r($model->getErrors());
            }
        }

        $this->render('site_map_sub_insert', array(
            'model' => $model,
        ));
    }

    public function actionSiteMapSubDel($site_map_sub_id = null) {
        $model = SiteMapSub::model()->find('site_map_sub_id = :site_map_sub_id', array(':site_map_sub_id' => $site_map_sub_id));
        if ($model->delete()) {
            echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
        }
    }

    public function actionCompanySubTypeBusiness() {
        $model = new CompanySubTypeBusiness();
        $model->unsetAttributes();

        if (isset($_GET['CompanySubTypeBusiness'])) {
            $model->attributes = $_GET['CompanySubTypeBusiness'];
        }

        $this->render('company_sub_type_business', array(
            'model' => $model,
            'dataProvider' => $model->getData(),
        ));
    }

}