<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $model = new LinkWeb;
        $criteria = new CDbCriteria;
        $group = '0';
        if(isset($_POST['group_id']) && $_POST['group_id'] != '0'){
            $group = $_POST['group_id'];
            $criteria->addCondition('group_id = '.$group); 
        }
        if (isset($_POST['LinkWeb'])) {
            $model->attributes = $_POST['LinkWeb'];
        }
        $list = LinkWeb::model()->findAll($criteria);
        $this->render('index', array('model' => $model, 'list' => $list, 'group' => $group));
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
        $model_g = new LinkGroup;
        $model->author = Yii::app()->user->id;
        $model->date_write = date("Y-m-d H:i:s");

        if (isset($_POST['LinkWeb'])) {
            $model->attributes = $_POST['LinkWeb'];
            $arr_files = CUploadedFile::getInstancesByName('link_file');
            if ($arr_files != NULL) {
                $path = '/upload/link/';

                foreach ($arr_files as $i => $file) {
                    //                    echo "<pre>";
                    //                    print_r($file);
                    //                    echo "</pre>";
                    $arr_file_detail = explode('.', $file->getName());
                    $formatName = $arr_file_detail[0] . "-" . time() . $i . '.' . $file->getExtensionName();
                    $file->saveAs('.' . $path . $formatName);
                    $model->img_path = $path . $formatName;
                }
            } else if ($model->img_path == NULL) {
                $model->img_path = '/img/link/Link_icon.png';
            }

            if (!preg_match("~^(?:f|ht)tps?://~i", $model->link)) {
                $model->link = 'http://' . $model->link;
            }

            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {
                    echo "<script language='javascript'>
                                alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "'); 
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
        } else if ($_POST['id'] != '') {
            $model = LinkGroup::model()->findByPk($_POST['id']);
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
            if ($model->save()) {
                echo "<script language='javascript'>
                                alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                                window.top.location.href = '/link/default/managegrouplink';
                          </script>";
            } else {
                echo "<script language='javascript'>
                                alert('" . Yii::t('language', 'ข้อมูลไม่ถูกต้อง') . "');
                                window.top.location.href = '/link/default/managegrouplink';
                          </script>";
            }
        }
//        else {
        $this->renderPartial('_group_form', array(
            'model' => $model,
        ));
//        }
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