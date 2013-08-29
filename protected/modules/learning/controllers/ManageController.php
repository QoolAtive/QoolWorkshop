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

    public function actionInsertLearningGroup($id = null) {
        $file = new Upload2image();
        if ($id == null) {
            $model = new LearningGroup();
            $model->unsetAttributes();
        } else {
            $model = LearningGroup::model()->findByPk($id);
        }

        if (isset($_POST['LearningGroup'])) {
            $model->attributes = $_POST['LearningGroup'];

            //รูปภาพภาษาไทย
//            $file->image = $_POST['Upload2image']['image'];
            $file1 = CUploadedFile::getInstance($file, 'image');

            if ($file1 != NULL) {
                $dir = './file/learning/';
                if (isset($model->pic)) {// ถ้ามีไฟล์อัพมาใหม่ ต้องลบไฟลเก่าก่อน แล้วค่อยอัพไฟล์ใหม่กลับเข้าไป
                    if (fopen($dir . $model->pic, 'w')) {
                        if (unlink($dir . $model->pic)) {
                            
                        }
                    }
                }
                $file1name = rand('000', '999') . $file1->name;
                $model->pic = $file1name;
            } else {
                if ($model->pic == NULL)
                    $model->pic = 'default.jpg';
            }
            //--------------
            //รูปภาพภาษาอังกฤษ
//            $file->image2 = $_POST['Upload2image']['image2'];
            $file2 = CUploadedFile::getInstance($file, 'image2');

            if ($file2 != NULL) {
                $dir = './file/learning/';
                if (isset($model->pic_en)) {// ถ้ามีไฟล์อัพมาใหม่ ต้องลบไฟลเก่าก่อน แล้วค่อยอัพไฟล์ใหม่กลับเข้าไป
                    if (fopen($dir . $model->pic_en, 'w')) {
                        if (unlink($dir . $model->pic_en)) {
                            
                        }
                    }
                }
                $file2name = rand('000', '999') . $file2->name;
                $model->pic_en = $file2name;
            } else {
                if ($model->pic_en == NULL)
                    $model->pic_en = 'default.jpg';
            }
            //--------------

            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {

                    //เพิ่มลง site map
                    $dataSiteMap = array(
                        'id_code' => $model->id,
                        'sub_id' => null,
                        'name' => $model->name,
                        'name_en' => $model->name_en,
                        'link' => '/learning/default/index/id/' . $model->id,
                    );
                    Tool::addSiteMap(2, $dataSiteMap);
                    // - - - - -- 

                    $dir = './file/learning/';
                    if ($file1 != NULL) {

                        $image = $dir . $file1name;

                        $file1->saveAs($image);
                    }

                    if ($file2 != NULL) {

                        if (!file_exists($dir))
                            chmod($dir, 0777);

                        $image = $dir . $file2name;

                        $file2->saveAs($image);
                    }
                    echo "
                        <meta charset='UTF-8'></meta>
                        <script>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                        window.location='/learning/manage/insertLearningGroup';
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
            if ($model->pic != 'default.jpg' && $model->pic != null) {
                $file_paht = './file/learning/' . $model->pic;
                if (fopen($file_paht, 'w'))
                    unlink($file_paht);
            }
            if ($model->pic != $model->pic_en && $model->pic_en != null && $model->pic != null) {
                if ($model->pic_en != 'default.jpg') {
                    $file_paht = './file/learning/' . $model->pic_en;
                    if (fopen($file_paht, 'w'))
                        unlink($file_paht);
                }
            }

            if ($model->delete())
                echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
        }else {
            echo Yii::t('language', 'ไม่สามารถลบข้อมูลได้ เนื่องจากมีข้อมูลอ้างอิงอยู่');
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
        $upload = new UploadPDF();
//        $upload->unsetAttributes();

        if ($id == null) {
            $model = new Learning();
            $model->unsetAttributes();

            $modelVideo = new LearningVideo();
            $modelVideo->unsetAttributes();

            $modelFile = new LearningFile();
            $modelFile->unsetAttributes();

            $link = '/index.php/learning/manage/insertLearning';
        } else {
            $model = Learning::model()->findByPk($id);
            $modelVideo = LearningVideo::model()->find('main_id = ' . $id);
            $link = '/learning/default/lesson/id/' . $model->id;

            $modelFile = LearningFile::model()->find('main_id = ' . $id);
        }

        if (isset($_POST['Learning']) && isset($_POST['LearningVideo']) && isset($_POST['UploadPDF'])) {
            $model->attributes = $_POST['Learning'];
            $model->author = Yii::app()->user->id;
            $model->guide_status = '0';
            $model->date_write = date("Y-m-d H:i:s");
            $modelVideo->main_id = '1';

            $modelVideo->attributes = $_POST['LearningVideo'];
            $modelVideo->video = str_replace('watch?v=', 'embed/', $modelVideo->video);
            $modelVideo->video_en = str_replace('watch?v=', 'embed/', $modelVideo->video_en);

            $upload->attributes = $_POST['UploadPDF'];

            if (isset($id) && $upload->file == null) { // ถ้าแก้ไขบทเรียนเดิม ตั้งค่า default ของ Model Upload = ค่าที่ต้องการแก้ไข
                $upload->file = $modelFile->path;
            }

            $upload->file = CUploadedFile::getInstance($upload, 'file');
            $model->validate();
            $modelVideo->validate();
//            $upload->validate();

            if ($model->getErrors() == null && $modelVideo->getErrors() == null && $upload->getErrors() == null) {
                $file = CUploadedFile::getInstance($upload, 'file');
                if ($model->save()) {
                    $modelVideo->main_id = $model->id;
                    if ($modelVideo->save()) {

                        //เพิ่มลง site map
                        $dataSiteMap = array(
                            'id_code' => null,
                            'name' => $model->subject,
                            'name_en' => $model->subject_en,
                            'link' => '/learning/default/lesson/id/' . $model->id,
                            'sub_id' => $model->group_id,
                        );
                        Tool::addSiteMap(2, $dataSiteMap);
                        // - - - - -- 

                        if (isset($file)) {
                            $path = './file/learning/pdf/';
                            if (isset($modelFile->path)) {// ถ้ามีไฟล์อัพมาใหม่ ต้องลบไฟลเก่าก่อน แล้วค่อยอัพไฟล์ใหม่กลับเข้าไป
                                if (fopen($path . $modelFile->path, 'w')) {
                                    if (unlink($path . $modelFile->path)) {
                                        $modelFile->delete();
                                    }
                                }
                            }

                            if (isset($upload) && count($upload) > 0) {
                                if (!is_dir($path)) {
                                    mkdir($path, 0777, true);
                                    chmod($path, 0777);
                                }
                                $filename = rand('000', '999') . $file->name;

                                if ($file->saveAs($path . '/' . $filename)) {
                                    $modelFile = new LearningFile();
                                    $modelFile->main_id = $model->id;
                                    $modelFile->path = $filename;

                                    $modelFile->save();
                                }
                            }
                        }
                        echo "
                            <meta charset='UTF-8'></meta>
                            <script>
                                alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                                window.location='$link';
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
        } else {
//            echo "<pre>";
//            print_r(array($model->getErrors(),$upload->getErrors()));
//            echo "</pre>";
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
        $modelFile = LearningFile::model()->find('main_id=:main_id', array(':main_id' => $id));

        if ($modelFile->path != 'default.jpg' && $modelFile->path != null) {
            $file_paht = './file/learning/pdf/' . $modelFile->path;

            if (fopen($file_paht, 'w'))
                unlink($file_paht);
        }

        if ($model->delete())
            echo Yii::t('language', 'ลบข้อมูลเรียบร้อย');
    }

    public function actionDelFile() {
        $id = $_POST['file_id'];
        $model = LearningFile::model()->findByPk($id);

        if ($model->path != 'default.jpg' && $model->path != null) {
            $file_paht = './file/learning/pdf/' . $model->path;

            if (fopen($file_paht, 'w'))
                unlink($file_paht);
        }

        if ($model->delete()) {
            
        }
    }

}

?>
