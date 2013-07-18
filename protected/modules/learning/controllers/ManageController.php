<?php

class ManageController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array(
                'allow',
                'users' => array('admin')
            ),
            array(
                'deny',
            ),
        );
    }

    public function actionIndex() {
        $this->render('index', array(
        ));
    }

    public function actionLearningGroup() {
        $model = new LearningGroup();
        $model->unsetAttributes();

        if (isset($_GET['LearningGroup'])) {
            $model->attributes = $_GET['LearningGroup'];
        }

        $this->render('learning_group', array(
            'model' => $model,
        ));
    }

    public function actionReadingPdf($id) {
        $model = LearningFile::model()->find('id=:id', array(':id' => $id));
        $path = './file/learning/pdf/' . $model->path;
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $model->path . '";');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        Yii::app()->end();
    }

    public function actionInsertLearningGroup($id = null) {
        $file = new Upload2image();
        if ($id == null) {
            $model = new LearningGroup();
            $model->unsetAttributes();
            $messageAlert = 'เพิ่มข้อมูลเรียบร้อย';
        } else {
            $model = LearningGroup::model()->findByPk($id);
            $messageAlert = 'แก้ไขข้อมูลเรียบร้อย';
        }

        if (isset($_POST['LearningGroup'])) {
            $model->attributes = $_POST['LearningGroup'];

            //รูปภาพภาษาไทย
            $file->image = $_POST['Upload2image']['image'];
            $file->image = CUploadedFile::getInstance($file, 'image');
            if ($file->image != NULL) {
                $model->pic = $file->image;
            } else {
                if ($model->pic == NULL)
                    $model->pic = 'default.jpg';
            }
            //--------------
            //รูปภาพภาษาอังกฤษ
            $file->image2 = $_POST['Upload2image']['image2'];
            $file->image2 = CUploadedFile::getInstance($file, 'image2');
            if ($file->image2 != NULL) {
                $model->pic_en = $file->image2;
            } else {
                if ($model->pic_en == NULL)
                    $model->pic_en = 'default.jpg';
            }
            //--------------

            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {
                    if ($file->image != NULL) {
                        $dir = './file/learning/';
                        if (!file_exists($dir))
                            mkdir($dir, 0777);

                        $image = $dir . '/' . $file->image;

                        $file->image->saveAs($image);
                    }

                    if ($file->image2 != NULL) {
                        $dir = './file/learning/';
                        if (!file_exists($dir))
                            mkdir($dir, 0777);

                        $image = $dir . '/' . $file->image2;

                        $file->image2->saveAs($image);
                    }
                    echo "
                        <script>
                        alert('" . Yii::t('language', $messageAlert) . "');
                        window.location='/learning/manage/InsertLearningGroup';
                        </script>
                        ";
                }else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_learning_group', array(
            'model' => $model,
            'file' => $file,
        ));
    }

    public function actionDelLearningGroup($id = null) {
        $model = LearningGroup::model()->findByPk($id);
        $count = Learning::model()->count('group_id=:group_id', array(':group_id' => $model->id));
        if (empty($count)) {
            if ($model->pic != 'default.jpg') {
                $file_paht = './file/learning/' . $model->pic;
                mkdir($file_paht, 0777);
                if (fopen($file_paht, 'w'))
                    unlink($file_paht);
            }
            if ($model->pic != $model->pic_en && $model->pic_en != null && $model->pic != null) {
                if ($model->pic_en != 'default.jpg') {
                    $file_paht = './file/learning/' . $model->pic_en;
                    mkdir($file_paht, 0777);
//                if (!file_exists($file_paht))
//                    mkdir($file_paht, 0777);
                    if (fopen($file_paht, 'w'))
                        unlink($file_paht);
                }
            }

            if ($model->delete())
                echo "ลบข้อมูลเรียบร้อย";
        }else {
            echo "ไม่สามารถลบข้อมูลได้ มีข้อมูลอ้างอิงอยู่";
        }
    }

    public function actionLearning() {
        $model = new Learning();
        $model->unsetAttributes();

        if (isset($_GET['Learning'])) {
            $model->attributes = $_GET['Learning'];
        }

        $this->render('learning', array(
            'model' => $model,
        ));
    }

    public function actionInsertLearning($id = null) {
        $upload = new Upload();
        $upload->unsetAttributes();

        if ($id == null) {
            $model = new Learning();
            $model->unsetAttributes();

            $modelVideo = new LearningVideo();
            $modelVideo->unsetAttributes();

            $modelFile = new LearningFile();
            $modelFile->unsetAttributes();

            $messageAlert = 'เพิ่มข้อมูลเรียบร้อย';
        } else {
            $model = Learning::model()->findByPk($id);
            $modelVideo = LearningVideo::model()->find('main_id = ' . $id);
            $messageAlert = 'แก้ไขข้อมูลเรียบร้อย';

            $modelFile = LearningFile::model()->find('main_id = ' . $id);
        }

        if (isset($_POST['Learning']) && isset($_POST['LearningVideo'])) {
            $model->attributes = $_POST['Learning'];
            $model->author = Yii::app()->user->id;
            $model->guide_status = '0';
            $model->date_write = date("Y-m-d H:i:s");
            $modelVideo->main_id = '1';

            $modelVideo->attributes = $_POST['LearningVideo'];
            $modelVideo->video = str_replace('watch?v=', 'embed/', $modelVideo->video);

            $upload->attributes = $_POST['Upload'];
            if (isset($id) && $upload->file == null) { // ถ้าแก้ไขบทเรียนเดิม ตั้งค่า default ของ Model Upload = ค่าที่ต้องการแก้ไข
                $upload->file = $modelFile->path;
            }

            $model->validate();
            $modelVideo->validate();
            $upload->validate();

            if ($upload->getErrors() == null) {
                $file = CUploadedFile::getInstance($upload, 'file');
            }

            if ($model->getErrors() == null && $modelVideo->getErrors() == null && $upload->getErrors() == null) {
                if ($model->save()) {

                    $modelVideo->main_id = $model->id;
                    if ($modelVideo->save()) {
                        if (isset($file)) {
                            $path = './file/learning/pdf/';
                            if (isset($id)) {// ถ้ามีไฟล์อัพมาใหม่ ต้องลบไฟลเก่าก่อน แล้วค่อยอัพไฟล์ใหม่กลับเข้าไป
                                if (unlink($path . '/' . $modelFile->path)) {
                                    $modelFile->delete();
                                }
                            }

                            if (isset($upload) && count($upload) > 0) {
                                if (!is_dir($path)) {
                                    mkdir($path, 0777, true);
                                    chmod($path, 0777);
                                }
                                if ($file->saveAs($path . '/' . $file->name)) {
                                    $modelFile = new LearningFile();
                                    $modelFile->main_id = $model->id;
                                    $modelFile->path = $file->name;

                                    $modelFile->save();
                                }
                            }
                        }
                        echo "
                        <script>
                        alert('" . Yii::t('language', $messageAlert) . "');
                        window.location='/learning/manage/InsertLearning';
                        </script>
                        ";
                    }
                } else {
//                    echo "<pre>";
//                    print_r($model->getErrors());
//                    echo "</pre>";
                }
            } else {
//                echo "<pre>";
//                print_r(array($model->getErrors(), $modelVideo->getErrors()));
//                echo "</pre>";
            }
        }

        $this->render('_insert_learning', array(
            'model' => $model,
            'modelVideo' => $modelVideo,
            'upload' => $upload,
            'modelFile' => $modelFile,
        ));
    }

    public function actionDelLearning($id = null) {
        $model = Learning::model()->findByPk($id);
        $modelFile = LearningFile::model()->findAll('main_id=:main_id', array(':main_id' => $id));

        if ($modelFile->file != 'default.jpg') {
            $file_paht = './file/learning/pdf/' . $modelFile->file;
            mkdir($file_paht, 0777);
            if (fopen($file_paht, 'w'))
                unlink($file_paht);
        }

        if ($model->delete())
            echo "ลบข้อมูลเรียบร้อย";
    }

}

?>
