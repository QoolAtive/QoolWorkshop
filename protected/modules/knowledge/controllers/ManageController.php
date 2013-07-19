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
        // ยกเลิกเวลาเพิ่มบทความให้กลับไปไหน ดูรายละเอียดบทความหรือ กลับไปหน้าจัดการบทความ
//        Yii::app()->user->setState('cancel', '/knowledge/manage/knowledge');

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
            $alertText = 'เพิ่มบทความเรียบร้อย';
//            $link_location = '/knowledge/manage/insert';
        } else {
            Yii::app()->user->setState('message_review', 'แก้ไขบทความเรียบร้อย');

            $model = Knowledge::model()->find("id = " . $id);
            $model->_old = $model->subject;
            $model->date_write = date("Y-m-d H:i:s");

            $file = new Upload();

            $alertText = 'แก้ไขบทความเรียบร้อย';
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
            $model->detail_en = $_POST['Knowledge']['detail_en'];
//            $file->image = $_POST['Upload']['image'];
            $fileSave = CUploadedFile::getInstance($file, 'image');
//            
//            echo "<pre>";
//            print_r($file);
//            echo "</pre>";
            if ($fileSave != NULL) {
                $dir = './file/knowledge/';
                if (isset($model->image)) {// ถ้ามีไฟล์อัพมาใหม่ ต้องลบไฟลเก่าก่อน แล้วค่อยอัพไฟล์ใหม่กลับเข้าไป
                    if (fopen($dir . $model->image, 'w'))
                        if (unlink($dir . $model->image)) {
                            
                        }
                }

                $filename = rand('000', '999') . $fileSave->name;
                $model->image = $filename;
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
                    if ($fileSave != NULL) {
                        $dir = './file/knowledge/';
                        if (!is_dir($dir))
                            mkdir($dir, 0777, true);

                        $image = $dir . $filename;

                        $fileSave->saveAs($image);
                    }
                    echo "
                        <script>
                        alert('" . Yii::t('language', $alertText) . "');
                        window.location=\"/knowledge/manage/review/id/$model->id\";
                        </script>
                        ";
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
            $file_paht = './file/knowledge/' . $model->image;
//            if (!file_exists($file_paht))
//                mkdir($file_paht, 0777);

            if (isset($model->image)) {// ถ้ามีไฟล์อัพมาใหม่ ต้องลบไฟลเก่าก่อน แล้วค่อยอัพไฟล์ใหม่กลับเข้าไป
                if (fopen($file_paht, 'w'))
                    if (unlink($file_paht)) {
                        
                    }
            }
        }

        if ($model->delete())
            echo "ลบข้อมูลเรียบร้อย";
    }

    public function actionDelReview($id) {
        $model = Knowledge::model()->findByPk($id);
        if ($model->image != 'default.jpg') {
            $file_paht = './file/knowledge/' . $model->image;
            if (!file_exists($file_paht))
                mkdir($file_paht, 0777);

            unlink($file_paht);
        }

        if ($model->delete())
            $this->redirect('/knowledge/manage/insert');
    }

    public function actionReview($id) {
        $model = Knowledge::model()->find('id = ' . $id);
        $knowledge = new Knowledge();
        $knowledge->unsetAttributes();

        $this->render('_review', array(
            'model' => $model,
            'knowledge' => $knowledge,
        ));
    }

}

?>
