<?php

class DefaultController extends Controller {

    public function actionReadingFile($id, $type) {

        Yii::app()->googleAnalytics->_setCustomVar(1, 'serviceProvider', 'ReadingFile', 3);

        switch ($type) {
            case 'brochure':
                $model = SpBrochure::model()->find('brochure_id=:brochure_id', array(':brochure_id' => $id));
                $path = './file/brochure/' . $model->path;
                break;
        }
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $model->path . '";');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        Yii::app()->end();
    }

    public function actionIndex($id = null) {
//        Yii::app()->googleAnalytics->_setCustomVar(1, 'Section', 'Life & Style', 3);
        Yii::app()->googleAnalytics->_setCustomVar(1, 'serviceProvider', 'Index', 3);

        $link = new CHttpRequest();
        Yii::app()->user->setState('default_link_back_to_menu', '');
        Yii::app()->user->setState('default_link_back_to_menu', str_replace('/index.php', '', $link->getUrl()));
//        $model = new SpCompany();
//        $model->unsetAttributes();
//        $model_type = SpTypeBusiness::model()->find('id=:id', array(':id' => $id));


        $feild_name = LanguageHelper::changeDB('name', 'name_en');
        $c = new CDbCriteria;
        $c->order = $feild_name . ' ASC';

        if (isset($_POST['type_id']) && $_POST['type_id'] != '0') {
            $type_id = $_POST['type_id'];
            $c->join = "LEFT JOIN sp_type_com AS type ON type.com_id=t.id";
            $c->addCondition('type.type_id = ' . $type_id);
        }
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $c->addCondition($feild_name . ' like "%' . $name . '%"');
        }

//        $model = SpCompany::model()->findAll($c);
        $model = new CActiveDataProvider('SpCompany', array(
            'criteria' => $c,
        ));

        $this->render('index', array(
            'model' => $model,
            'model_type' => $model_type,
            'id' => $id,
            'type_id' => $type_id,
            'name' => $name,
        ));
    }

    public function actionPartnerGroup($id = null) {

        Yii::app()->googleAnalytics->_setCustomVar(1, 'serviceProvider', 'PartnerGroup', 3);

        $link = new CHttpRequest();
        Yii::app()->user->setState('default_link_back_to_menu', '');
        Yii::app()->user->setState('default_link_back_to_menu', str_replace('/index.php', '', $link->getUrl()));

        $model = SpTypeBusiness::model()->find('id=:id', array(':id' => $id));

        $this->render('partner_group', array(
            'model' => $model,
        ));
    }

    public function actionDetail($id = null, $type = null) {

        Yii::app()->googleAnalytics->_setCustomVar(1, 'serviceProvider', 'Detail', 3);

        $link = new CHttpRequest();
        Yii::app()->user->setState('default_link_back_to_menu', '');
        Yii::app()->user->setState('default_link_back_to_menu', str_replace('/index.php', '', $link->getUrl()));

        $count_company_view = SpCountComanyView::model()->count('sp_company_id=:sp_company_id', array(':sp_company_id' => $id));
        if ($count_company_view < 1) {
            $model_count = new SpCountComanyView();
            $model_count->sp_company_id = $id;
            $model_count->count_company_view = 1;
            $model_count->update_at = date("Y-m-d H:i:s");
            if ($model_count->save()) {
                
            } else {
                echo "<pre>";
                print_r($model_count->getErrors());
                echo "</pre>";
            }
        } else {
            $model_count = SpCountComanyView::model()->find('sp_company_id=:sp_company_id', array(':sp_company_id' => $id));
            $model_count->count_company_view = $model_count->count_company_view + 1;
            $model_count->update_at = date("Y-m-d H:i:s");
            $model_count->save();
        }

        $model = SpCompany::model()->find('id=:id', array(':id' => $id));

        $this->render('_detail', array(
            'model' => $model,
            'model_count' => $model_count,
            'type_business_back' => $type,
        ));
    }

    public function actionReadingPdf($id) {

        Yii::app()->googleAnalytics->_setCustomVar(1, 'serviceProvider', 'ReadingPdf', 3);

        $model = SpCompany::model()->find('id=:id', array(':id' => $id));
        $path = './file/brochure/' . $model->brochure;
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $model->brochure . '";');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        Yii::app()->end();
    }

    public function actionSpLog() {
        $model = new SpLog();

        if (isset($_GET['SpLog'])) {
            $model->attributes = $_GET['SpLog'];
//            $model->companyName = $_GET['SpLog']['companyNmae'];
//            $model->companyName_en = $_GET['SpLog']['companyNmae_en'];
        }

//        $criteria = new CDbCriteria;
//        $criteria->select = "t.*,spc.*, spc.name as companyName, spc.name_en as companyName_en";
//        $criteria->join = "inner join sp_company spc on t.service_company_id = spc.id";
//        $criteria->condition = "t.user_id = " . Yii::app()->user->id;
//
//        $criteria->compare('spc.name', $model->companyName, true);
//        $criteria->compare('service_company_id', $model->service_company_id, true);
//        $criteria->compare('spc.name_en', $model->companyName_en, true);
//
//        $dataProvider = new CActiveDataProvider('SpLog', array(
//            'criteria' => $criteria,
//            'sort' => array(
//                'defaultOrder' => 'id desc',
//                'attributes' => array(
//                    't.companyNmae' => array(
//                        'asc' => 'spc.name, t.id',
//                        'desc' => 'spc.name desc, t.id',
//                    ),
//                    't.companyNmae_en' => array(
//                        'asc' => 'spc.name, t.id',
//                        'desc' => 'spc.name_en desc, t.id',
//                    ),
//                ),
//            ),
//        ));

        $this->render('sp_log', array(
            'model' => $model,
//            'dataProvider' => $dataProvider,
            'dataProvider' => $model->getData(),
        ));
    }

    public function actionInsertLog() {
        if (isset($_POST['sp_id'])) {
            $model = SpLog::model()->find('service_company_id = :service_company_id', array(':service_company_id' => $_POST['sp_id']));
            if (count($model) > 0) {
                
            } else {
                $model = new SpLog();
                $model->user_id = Yii::app()->user->id;
                $model->service_company_id = $_POST['sp_id'];
                if ($model->save()) {
                    echo Yii::t('language', 'เก็บเข้ารายการโปรดเรียบร้อย');
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                }
            }
        }
    }

    public function actionSpLogDel($sp_log_id = null) {
        if ($sp_log_id != null) {
            $model = SpLog::model()->find('sp_log_id = :sp_log_id', array(':sp_log_id' => $sp_log_id));
            if ($model->delete()) {
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
            }
        }
    }

}
