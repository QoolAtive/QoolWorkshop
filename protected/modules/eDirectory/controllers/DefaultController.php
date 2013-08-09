<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionReadingFile($id, $type) {
        switch ($type) {
            case 'brochure':
                $model = CompanyBrochure::model()->find('company_brochure_id=:company_brochure_id', array(':company_brochure_id' => $id));
                $path = './file/brochure/' . $model->path;
                break;
        }
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $model->path . '";');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        Yii::app()->end();
    }

    public function actionSearch() {
//        if (isset($_POST['name'])) {
        $name = $_POST['name'];
//            Yii::app()->user->setState('name', $name);
//        } else {
//            $name = Yii::app()->user->getState('name');
//        }
//        if (isset($_POST['address'])) {
        $address = $_POST['address'];
//            Yii::app()->user->setState('address', $address);
//        } else {
//            $address = Yii::app()->user->getState('address');
//        }
        if (isset($_POST['type'])) {
            $type = $_POST['type'];
            Yii::app()->user->setState('type', $type);
        } else {
            $type = Yii::app()->user->getState('type');
        }

        $type_name = SpTypeBusiness::model()->find('id=:id', array(':id' => $type))->name;

        $criteria = new CDbCriteria;
        $criteria->join = '
            left join company_product cp on t.id = cp.main_id
            left join company_them ct on t.id = ct.main_id
            ';
        $criteria->distinct = 'name, name_en';
        $criteria->condition = 'ct.status_appro = 1';

        $criteria->compare('t.main_business', $name, true, 'or');
        $criteria->compare('t.main_business_en', $name, true, 'or');
        $criteria->compare('t.sub_business', $name, true, 'or');
        $criteria->compare('t.sub_business_en', $name, true, 'or');
        $criteria->compare('t.name', $name, true, 'or');
        $criteria->compare('t.name_en', $name, true, 'or');
        $criteria->compare('cp.name', $name, true, 'or'); // ค้นหาจาก ตารางสินค้า
        $criteria->compare('cp.name_en', $name, true, 'or'); // ค้นหาจาก ตารางสินค้า
        $criteria->compare('t.address', $address, true, 'or');
        $criteria->compare('t.address_en', $address, true, 'or');
        $criteria->compare('ct.id', $type, 'and');

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
        ));

        $this->renderPartial('search', array(
            'dataProvider' => $dataProvider,
            'name' => $name,
            'address' => $address,
            'type_name' => $type_name,
        ));
    }

    public function actionSearchLink() {
        
    }

}

