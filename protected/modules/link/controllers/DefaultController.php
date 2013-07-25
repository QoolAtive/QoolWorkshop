<?php

class DefaultController extends Controller {

<<<<<<< HEAD
=======
    protected function beforeAction($action) {
        if (Yii::app()->request->isAjaxRequest) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery-2.0.0.js'] = false;
        }

        return parent::beforeAction($action);
    }

>>>>>>> origin/yo's
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

            if (!preg_match("~^(?:f|ht)tps?://~i", $model->link)) {
                $model->link = 'http://' . $model->link;
            }

            $model->validate();
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

        if (isset($_POST['LinkGroup'])) {
            if (Yii::app()->getRequest()->getIsAjaxRequest()) {
//            echo CActiveForm::validate(array($model));
//            Yii::app()->end();
                $errors = CActiveForm::validate(array($model));
                if ($errors !== '[]') {
                    echo $errors;
                    Yii::app()->end();
                }
            }
            $model->attributes = $_POST['LinkGroup'];
<<<<<<< HEAD
            if ($model->save()) {
                echo "<script language='javascript'>
                                alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                                // window.top.location.href = '/link/default/managegrouplink';
                          </script>";
            }
        }
        $this->renderPartial('_group_form', array(
            'model' => $model,
        ));
=======
<<<<<<< HEAD
            if ($model->validate()) {
                $model->save();
//                echo "<script language='javascript'>
//                                alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
//                                window.top.location.href = '/link/default/managegrouplink';
//                          </script>";
//            } else {
//                echo "<script language='javascript'>
//                                alert('" . Yii::t('language', 'ข้อมูลไม่ถูกต้อง') . "');
//                                window.top.location.href = '/link/default/managegrouplink';
//                          </script>";
            }
        }
            $this->renderPartial('_group_form', array(
                'model' => $model,
                    ), false, true);
=======
            if ($model->save()) {
                echo "<script language='javascript'>
                                alert('" . Yii::t('language', 'บันทึก') . Yii::t('language', 'ข้อมูล') . Yii::t('language', 'เรียบร้อย') . "');
                                // window.top.location.href = '/link/default/managegrouplink';
                          </script>";
            }
        }
        $this->renderPartial('_group_form', array(
            'model' => $model,
        ));
>>>>>>> 4fb66994a4db8636ebd7f8b3d3f443d2438f75f8
>>>>>>> origin/yo's
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