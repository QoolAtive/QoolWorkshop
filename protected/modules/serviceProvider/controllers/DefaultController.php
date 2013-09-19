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

        $cHot = new CDbCriteria;
        $cHot->join = '
                        inner join sp_count_comany_view sccv on t.id = sccv.sp_company_id
                        inner join sp_type_com spct on t.id = spct.com_id
                       ';

        if ($id != null) {
            $cHot->condition = 'type_id = ' . $id;
        }

        $cHot->order = 'sccv.count_company_view desc, t.id desc';
        $cHot->distinct = 't.id';

        $dataHotshop = new CActiveDataProvider('SpCompany', array(
            'criteria' => $cHot,
            'pagination' => array(
                'pageSize' => 4,
            )
        ));

        $feild_name = LanguageHelper::changeDB('name', 'name_en');
        $c = new CDbCriteria;
        $c->order = $feild_name . ' ASC';
        $c->distinct = 't.id';

//        if (isset($_POST['type_id']) && $_POST['type_id'] != '0') {
//            $type_id = $_POST['type_id'];
//            $c->join = "LEFT JOIN sp_type_com AS type ON type.com_id=t.id";
//            $c->addCondition('type.type_id = ' . $type_id);
//        }
//        if (isset($_POST['name'])) {
//            $name = $_POST['name'];
//            $c->addCondition($feild_name . ' like "%' . $name . '%"');
//        }
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
            'dataHotshop' => $dataHotshop,
        ));
    }

    public function actionSearch() {
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
            if ($name != null) {
                $autoAdd = SpAuto::model()->find('name = :name', array(':name' => $name));
                if (count($autoAdd) > 0) {
                    $autoAdd->name = $name;
                    if (!$autoAdd->save()) {
                        echo "<pre>";
                        print_r($autoAdd->getErrors());
                    }
                } else {
                    $autoAdd = new SpAuto();
                    $autoAdd->name = $name;
                    if (!$autoAdd->save()) {
                        echo "<pre>";
                        print_r($autoAdd->getErrors());
                    }
                }
            }

            $c->addCondition($feild_name . ' like "%' . $name . '%"');
        }

        $model = new CActiveDataProvider('SpCompany', array(
            'criteria' => $c,
        ));

        $this->renderPartial('search', array(
            'model' => $model,
        ));
    }

    public function actionPartnerGroup($id = null, $sp_type_business_sub_id = null) {

        Yii::app()->googleAnalytics->_setCustomVar(1, 'serviceProvider', 'PartnerGroup', 3);

        $link = new CHttpRequest();
        Yii::app()->user->setState('default_link_back_to_menu', '');
        Yii::app()->user->setState('default_link_back_to_menu', str_replace('/index.php', '', $link->getUrl()));

        $model = SpTypeBusiness::model()->find('id=:id', array(':id' => $id));
        
        $model_sub = null;
        if ($sp_type_business_sub_id != null)
            $model_sub = SpTypeBusinessSub::model()->find('sp_type_business_sub_id = :id', array(':id' => $sp_type_business_sub_id));

        $this->render('partner_group', array(
            'model' => $model,
            'model_sub' => $model_sub,
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
        $model = new SpCompany();

        if (isset($_GET['SpCompany'])) {
            $model->attributes = $_GET['SpCompany'];
        }

        $criteria = new CDbCriteria;
        $criteria->select = "t.*, spl.sp_log_id as sp_log_id";
        $criteria->join = "inner join sp_log spl on t.id = spl.service_company_id";
        $criteria->condition = "spl.user_id = " . Yii::app()->user->id;

        $criteria->compare('name', $model->name, true);
        $criteria->compare('name_en', $model->name_en, true);

        $dataProvider = new CActiveDataProvider('SpCompany', array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id desc',
                'attributes' => array(
                    'name',
                    'name_en',
                ),
            ),
        ));

        $this->render('sp_log', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
//            'dataProvider' => $model->getData(),
        ));
    }

    public function actionInsertLog() {
        if (isset($_POST['sp_id'])) {
            $model = SpLog::model()->find('service_company_id = :service_company_id AND user_id = :user_id', array(
                ':service_company_id' => $_POST['sp_id'],
                ':user_id' => Yii::app()->user->id,
            ));
            if (count($model) > 0) {
                
            } else {
                $model = new SpLog();
                $model->user_id = Yii::app()->user->id;
                $model->service_company_id = $_POST['sp_id'];
                if ($model->save()) {
                    echo Yii::t('language', 'เก็บเข้าบริการโปรดเรียบร้อย');
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                }
            }
        }

//        $this->renderPartial('_select');
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
