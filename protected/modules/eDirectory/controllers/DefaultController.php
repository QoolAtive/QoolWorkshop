<?php

class DefaultController extends Controller {

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

    public function actionIndex($id = null) {

        $criteria = new CDbCriteria();
        $criteria->join = '
            inner join company_type ctype on t.id = ctype.company_id
            inner join company_them ct on t.id = ct.main_id
            ';
        $criteria->distinct = 't.name, t.name_en';
        if ($id != null) {
            $criteria->condition = 'ctype.company_type = ' . $id . ' and ct.status_appro = 1 and ct.status_block = 0';
        } else {
            $criteria->condition = 'ct.status_appro = 1 and ct.status_block = 0';
        }

//        echo "<pre>";
//        print_r(array($criteria));
//        echo "</pre>";

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'id' => $id,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionCompanyDetail($id) {

        $model = Company::model()->find('id=:id', array(':id' => $id));
        $model_user = MemRegistration::model()->find('id=:id', array(':id' => $model->user_id));

        $this->render('company_detail', array(
            'model' => $model,
            'model_user' => $model_user,
            'type_business_back' => $type,
        ));
    }

    public function actionSearch($id = null) {
        $name = $_POST['name'];
        $address = $_POST['address'];

        $criteria = new CDbCriteria;
        $criteria->join = '
            inner join company_them ct on t.id = ct.main_id
            inner join company_type ctype on t.id = ctype.company_id
            left join company_product cp on t.id = cp.main_id
            ';
        if ($name != null || $address != null) {
            $condition = ' and (';
            $or = null;
            if ($name != null) {

                if ($address != null)
                    $or = 'or';

                $condition .= '(t.name like "%' . $name . '%") or (t.name_en like "%' . $name . '%") or (t.main_business like "%' . $name . '%") or (t.main_business_en like "%' . $name . '%") or ';
                $condition .= '(t.sub_business like "%' . $name . '%") or (t.sub_business_en like "%' . $name . '%") or (cp.name like "%' . $name . '%") or (cp.name_en like "%' . $name . '%") ' . $or;
            }

            if ($address != null) {
                $condition .= '(t.address like "%' . $address . '%") or (t.address_en like "%' . $address . '%")';
            }
            $condition .= ')';
        }

        $criteria->distinct = 'name, name_en';
        if ($id != null) {
            $criteria->condition = 'ctype.company_type = ' . $id . ' and ct.status_appro = 1 and ct.status_block = 0' . $condition;
        } else {
            $criteria->condition = 'ct.status_appro = 1 and ct.status_block = 0' . $condition;
        }

//        $criteria->compare('t.name', $name, true, 'and');
//        $criteria->compare('t.name_en', $name, true, 'or');
//        $criteria->compare('t.main_business', $name, true);
//        $criteria->compare('t.main_business_en', $name, true);
//        $criteria->compare('t.sub_business', $name, true);
//        $criteria->compare('t.sub_business_en', $name, true);
//        $criteria->compare('cp.name', $name, true); // ค้นหาจาก ตารางสินค้า
//        $criteria->compare('cp.name_en', $name, true); // ค้นหาจาก ตารางสินค้า
//
//
//        $criteria->compare('t.address', $address, true, 'and');
//        $criteria->compare('t.address_en', $address, true, 'or');
//        echo "<pre>";
//        print_r($criteria);
//        echo "</pre>";

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
        ));

        $this->renderPartial('search', array(
            'dataProvider' => $dataProvider,
            'name' => $name,
            'address' => $address,
        ));
    }

}

