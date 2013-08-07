<?php

class AdminController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('admin'),
            ),
            array(
                'deny',
            ),
        );
    }

    public function actionIndex() {

        $model = new Company;
        if (isset($_GET['Company'])) {
            $model->attributes = $_GET['Company'];
        }

        $criteria = new CDbCriteria;
        $criteria->join = '
            left join company_product cp on t.id = cp.main_id
            left join company_them ct on t.id = ct.main_id
            ';
        $criteria->distinct = 'name, name_en';
        $criteria->condition = 'ct.status_appro = 1';

        $criteria->compare('name', $model->name, true);
        $criteria->compare('name_en', $model->name_en, true);
        $criteria->compare('infor', $model->infor, true);
        $criteria->compare('infor_en', $model->infor_en, true);
        $criteria->compare('main_business', $model->main_business, true);
        $criteria->compare('main_business_en', $model->main_business_en, true);
        $criteria->compare('sub_business', $model->sub_business, true);
        $criteria->compare('sub_business_en', $model->sub_business_en, true);
        $criteria->compare('address', $model->address, true);
        $criteria->compare('address_en', $model->address_en, true);
        $criteria->compare('contact_name', $model->contact_name, true);
        $criteria->compare('contact_name_en', $model->contact_name_en, true);
        $criteria->compare('contact_tel', $model->contact_tel, true);
        $criteria->compare('contact_fax', $model->contact_fax, true);
        $criteria->compare('contact_email', $model->contact_email, true);
        $criteria->compare('facebook', $model->facebook, true);
        $criteria->compare('twitter', $model->twitter, true);
        $criteria->compare('website', $model->website, true);
        $criteria->compare('banner', $model->banner, true);
        $criteria->compare('brochure', $model->brochure, true);

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionCompanyWaiting() {

        $model = new Company;
        if (isset($_GET['Company'])) {
            $model->attributes = $_GET['Company'];
        }

        $criteria = new CDbCriteria;
        $criteria->join = '
            left join company_product cp on t.id = cp.main_id
            left join company_them ct on t.id = ct.main_id
            ';
        $criteria->distinct = 'name, name_en';
        $criteria->condition = 'ct.status_appro = 0';

        $criteria->compare('name', $model->name, true);
        $criteria->compare('name_en', $model->name_en, true);
        $criteria->compare('infor', $model->infor, true);
        $criteria->compare('infor_en', $model->infor_en, true);
        $criteria->compare('main_business', $model->main_business, true);
        $criteria->compare('main_business_en', $model->main_business_en, true);
        $criteria->compare('sub_business', $model->sub_business, true);
        $criteria->compare('sub_business_en', $model->sub_business_en, true);
        $criteria->compare('address', $model->address, true);
        $criteria->compare('address_en', $model->address_en, true);
        $criteria->compare('contact_name', $model->contact_name, true);
        $criteria->compare('contact_name_en', $model->contact_name_en, true);
        $criteria->compare('contact_tel', $model->contact_tel, true);
        $criteria->compare('contact_fax', $model->contact_fax, true);
        $criteria->compare('contact_email', $model->contact_email, true);
        $criteria->compare('facebook', $model->facebook, true);
        $criteria->compare('twitter', $model->twitter, true);
        $criteria->compare('website', $model->website, true);
        $criteria->compare('banner', $model->banner, true);
        $criteria->compare('brochure', $model->brochure, true);

        $dataProvider = new CActiveDataProvider('Company', array(
            'criteria' => $criteria,
        ));

        $this->render('company_waiting', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionCompanyDetail($id) {
//        $count_company_view = ComanyCountView::model()->count('company_id=:company_id', array(':company_id' => $id));
//        if ($count_company_view < 1) {
//            $model_count = new ComanyCountView();
//            $model_count->company_id = $id;
//            $model_count->count_company_view = 1;
//            $model_count->update_at = date("Y-m-d H:i:s");
//            if ($model_count->save()) {
//                
//            } else {
//                echo "<pre>";
//                print_r($model_count->getErrors());
//                echo "</pre>";
//            }
//        } else {
//            $model_count = ComanyCountView::model()->find('company_id=:company_id', array(':company_id' => $id));
//            $model_count->count_company_view = $model_count->count_company_view + 1;
//            $model_count->update_at = date("Y-m-d H:i:s");
//            $model_count->save();
//        }

        $model = Company::model()->find('id=:id', array(':id' => $id));
        $model_user = MemRegistration::model()->find('id=:id', array(':id' => $model->user_id));

        $this->render('company_detail', array(
            'model' => $model,
            'model_user' => $model_user,
            'type_business_back' => $type,
        ));
    }

}

?>
