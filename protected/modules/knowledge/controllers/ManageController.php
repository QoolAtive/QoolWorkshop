<?php

class ManageController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('admin'),
            ),
            array('deny'),
        );
    }

    public function actionIndex() {
        
    }

    public function actionKnowledge() {
        $model = new Knowledge('search');
        $model->unsetAttributes();
        if (isset($_GET['Knowledge'])) {
            $model->attributes = $_GET['Knowledge'];
        }

        // ปุ่มย้อนกลับ
        Yii::app()->user->setState('link_back', '/knowledge/manage/knowledge');
        Yii::app()->user->setState('insert', 'knowledge'); // ลิ้งหน้าเพิ่มบทความ
        $this->render('knowledge', array(
            'model' => $model,
        ));
    }

    public function actionInsert($id = '', $new = '') {
        if ($id == NULL) {
            Yii::app()->user->setState('message_review', 'เพิ่มบทความเรียบร้อย');
            $model = new Knowledge();
            $model2 = new KnowledgeThem();
            $file = new Upload();

            $model->_old = '';
            $model->type_id = '1';
            $model->guide_status = '0';
            $model->date_write = date("Y-m-d H:i:s");
            $model->position = '1';

//            $new = true;
//            $alertText = 'เพิ่มบทความเรียบร้อย';
//            $link_location = '/knowledge/manage/insert';
        } else {
            Yii::app()->user->setState('message_review', 'แก้ไขบทความเรียบร้อย');

            $model = Knowledge::model()->find("id = " . $id);
            $model->_old = $model->subject;
            $model->date_write = date("Y-m-d H:i:s");

            $file = new Upload();

//            $alertText = 'แก้ไขบทความเรียบร้อย';
//            if ($new != '1') {
//                if (Yii::app()->user->getState('insert') == 'view') {
//                    $link_location = '/knowledge/default/view/id/' . $id;
//                } else if (Yii::app()->user->getState('insert') == 'knowledge') {
//                    $link_location = '/knowledge/manage/knowledge';
//                }
//            }
        }

        if (isset($_POST['Knowledge'])) {
            $model->attributes = $_POST['Knowledge'];
            $file->image = $_POST['Upload']['image'];
            $file->image = CUploadedFile::getInstance($file, 'image');
            if ($file->image != NULL) {
                $model->image = $file->image;
            } else {
                if ($model->image == NULL)
                    $model->image = 'default.jpg';
            }
            if ($model->validate()) {
                if ($model->save()) {
                    if (empty($id)) {
                        $model2->main_id = $model->id;
                        $model2->appro_status = '0';
                        $model2->save();
                    }
                    if ($file->image != NULL) {
                        $dir = './file/knowledge/';
                        if (!file_exists($dir))
                            mkdir($dir, 0777);

                        $image = $dir . '/' . $file->image;

                        $file->image->saveAs($image);
                    }
                    $this->redirect('/knowledge/manage/review/id/' . $model->id);
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert', array(
            'model' => $model,
            'file' => $file,
        ));
    }

    public function actionDel($id) {
        $model = Knowledge::model()->findByPk($id);
        if ($model->image != 'default.jpg') {
            $file_paht = './file/knowledge';
            if (!file_exists($file_paht))
                mkdir($file_paht, 0777);

            unlink($file_paht . '/' . $model->image);
        }

        if ($model->delete())
            echo "ลบข้อมูลเรียบร้อย";
    }

    public function actionDelReview($id) {
        $model = Knowledge::model()->findByPk($id);
        if ($model->image != 'default.jpg') {
            $file_paht = './file/knowledge/';
            if (!file_exists($file_paht))
                mkdir($file_paht, 0777);

            unlink($file_paht . '/' . $model->image);
        }

        if ($model->delete())
            $this->redirect('/knowledge/manage/insert');
    }

    public function actionReview($id) {
        $model = Knowledge::model()->find('id = ' . $id);

        $this->render('_review', array(
            'model' => $model,
        ));
    }

    public function actionAddAlert($con) {
        if ($con == '1')
            $link_location = '/knowledge/manage/insert';
        if ($con == '2')
            $link_location = '/knowledge/manage/knowledge';

        $message = Yii::app()->user->getState('message_review');
        echo "
            <meta http-equiv='content-type' content='text/html; charset=UTF-8'></meta>
            <script>
                alert('$message');
                window.location='$link_location';
            </script>
            ";
    }

}

?>
