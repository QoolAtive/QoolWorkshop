<?php

class DefaultController extends Controller {

    public function filters() {
        return array(
            'rights'
        );
    }

//    protected function beforeAction($action) {
//        if (Yii::app()->request->isAjaxRequest) {
//            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
//            Yii::app()->clientScript->scriptMap['jquery-2.0.0.js'] = false;
//        }
//
//        return parent::beforeAction($action);
//    }

    public function actionIndex() {
        $feild_name = LanguageHelper::changeDB('name_th', 'name_en');
        $criteria = new CDbCriteria;
        $group = '0';
        if (isset($_POST['group_id']) && $_POST['group_id'] != '0') {
            $group = $_POST['group_id'];
            $criteria->addCondition('group_id = ' . $group);
        }
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $criteria->addCondition($feild_name . ' like "%' . $name . '%"');
        }
        $list = LinkWeb::model()->findAll($criteria);
        $this->render('index', array('list' => $list, 'group' => $group));
    }

    public function actionManageLink() {
        $model = new LinkWeb;
        if (isset($_GET['LinkWeb'])) {
            $model->attributes = $_GET['LinkWeb'];
        }
        $this->render('manage_link', array(
            'model' => $model,
            'dataProvider' => $model->search(),
        ));
    }

    public function actionLinkForm($id = '') {
        if ($id != '') {
            $model = LinkWeb::model()->findByPk($id);
        } else {
            $model = new LinkWeb();
        }
        $model->author = Yii::app()->user->id;
        $model->date_write = date("Y-m-d H:i:s");

        if (isset($_POST['LinkWeb'])) {
            $model->attributes = $_POST['LinkWeb'];
            //for upload pic
            $arr_files = CUploadedFile::getInstancesByName('link_file');
            if ($arr_files != NULL) {
                $path = '/upload/img/link/';

                foreach ($arr_files as $i => $file) {
                    $arr_file_detail = explode('.', $file->getName());
                    $formatName = $arr_file_detail[0] . "-" . time() . $i . '.' . $file->getExtensionName();
                    $file->saveAs('.' . $path . $formatName);
                    $model->img_path = $path . $formatName;
                }
            } else if ($model->img_path == NULL) {
                $model->img_path = '/img/link/Link_icon.png';
            }
            //END for upload pic

            if ($model->validate()) {
                if (!preg_match("~^(?:f|ht)tps?://~i", $model->link)) {
                    $model->link = 'http://' . $model->link;
                }
            }
            if ($model->getErrors() == null) {
                if ($model->save()) {
                    echo "<script language='javascript'>
                                alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "'); 
                                window.location='/link/default/managelink';
                          </script>";
                }
            }
        }//end if (isset($_POST['LinkWeb'])) {

        $this->render('link_form', array(
            'model' => $model,
        ));
    }

    public function actionDeleteLink($id) {
        $model = LinkWeb::model()->findByPk($id);
        if ($model->delete()) {
            $this->redirect("/link/default/managelink");
        }
    }

    public function actionManageGroupLink() {
        $model = new LinkGroup();
        if (isset($_GET['LinkGroup'])) {
            $model->attributes = $_GET['LinkGroup'];
        }

        $this->render('manage_grouplink', array(
            'model' => $model,
            'dataProvider' => $model->search(),
        ));
    }

    public function actionGroupForm($id = '') {
        if ($id != '') {
            $model = LinkGroup::model()->findByPk($id);
        } else {
            $model = new LinkGroup();
        }

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'group-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LinkGroup'])) {
            $model->attributes = $_POST['LinkGroup'];

            if ($model->validate()) {
                $model->save();
                $this->redirect(CHtml::normalizeUrl(array('/link/default/managegrouplink')));
//                echo "<script language='javascript'>
////                                $.fn.yiiGridView.update('link-grid');
//                                $.fancybox.close();
////                                alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
////                                 window.top.location.href = '/link/default/managegrouplink';
//                          </script>";
//            } else {
//                echo "<script language='javascript'>
//                    $(document).ready(function() {
//                        $('#linkgroupbtn').fancybox().trigger('click');
//                    });
//                    </script>";
            }
        }
        $this->render('_group_form', array(
            'model' => $model,
        ));
    }

    public function actionGroupGridview() {
        $model = new LinkGroup;
        if (isset($_GET['LinkGroup'])) {
            $model->attributes = $_GET['LinkGroup'];
        }
        $this->renderPartial('_gridview_grouplink', array(
            'model' => $model,
            'dataProvider' => $model->search(),
        ));
    }

    public function actionDeleteGroupLink($id) {
        $model = LinkGroup::model()->findByPk($id);
        if ($model->delete()) {
            $this->redirect("/link/default/managegrouplink");
        }
    }

}

?>