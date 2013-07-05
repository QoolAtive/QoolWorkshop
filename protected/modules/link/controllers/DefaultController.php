<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
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
            } else {
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
            } else {
//                echo "<pre>";
//                print_r($model->getErrors());
//                echo "</pre>";
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

        if (isset($_GET['LinkGroup'])) {
            $model->attributes = $_GET['LinkGroup'];
            if ($model->save()) {
                Yii::app()->end();
            } else {
                //Stops the request from being sent.
                throw new CHttpException(404, 'Model has not been saved');
            }
        }
        $this->renderPartial('_group_form', array(
            'model' => $model,
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