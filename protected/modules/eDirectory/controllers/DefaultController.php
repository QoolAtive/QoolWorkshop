<?php

class DefaultController extends Controller {

    public function actionReadingFile($id = null, $type = null) {
        switch ($type) {
            case 'brochure':
                $model = CompanyBrochure::model()->find('company_brochure_id=:company_brochure_id', array(':company_brochure_id' => $id));
                $path = './file/brochure/' . $model->path;
                $filename = $model->path;
                break;
            case 'companyXLS':
//                $model = CompanyBrochure::model()->find('company_brochure_id=:company_brochure_id', array(':company_brochure_id' => $id));
                $filename = 'default_company.xls';
                $path = './file/company/' . $filename;
                break;
            case 'productXLS':
//                $model = CompanyBrochure::model()->find('company_brochure_id=:company_brochure_id', array(':company_brochure_id' => $id));
                $filename = 'default_product.xls';
                $path = './file/company/' . $filename;

                break;
        }
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
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
        $criteria->order = 't.id desc';
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

        // นับจำนวนคนเข้ามาชม
        $num = CompanyCountView::model()->count('company_id = :company_id', array(':company_id' => $id));
        if ($num < 1) {
            $model_count_company = new CompanyCountView();
            $model_count_company->company_id = $id;
            $model_count_company->count_company_view = 1;
            $model_count_company->update_at = date('Y-m-d');
            $model_count_company->save();
        } else {
            $model_count_company = CompanyCountView::model()->find('company_id = :company_id', array(':company_id' => $id));
            $model_count_company->count_company_view = ($model_count_company->count_company_view + 1);
            $model_count_company->update_at = date('Y-m-d');
            $model_count_company->save();
        }

        $create = CompanyMotion::model()->find('company_id = :company_id', array(':company_id' => $id));

        //------

        $this->render('company_detail', array(
            'model' => $model,
            'model_user' => $model_user,
            'type_business_back' => $type,
            'count' => $model_count_company->getDataArray($id),
            'create' => $create,
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

        $criteria->distinct = 't.name, t.name_en';
        $criteria->order = 't.id desc';
        if ($id != null) {
            $criteria->condition = 'ctype.company_type = ' . $id . ' and ct.status_appro = 1 and ct.status_block = 0' . $condition;
        } else {
            $criteria->condition = 'ct.status_appro = 1 and ct.status_block = 0' . $condition;
        }

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

