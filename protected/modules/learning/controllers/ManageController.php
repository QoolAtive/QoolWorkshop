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

        if ($_GET['LearningGroup']) {
            $model->attributes = $_GET['LearningGroup'];
        }

        $this->render('learning_group', array(
            'model' => $model,
        ));
    }

    public function actionInsertLearningGroup($id = null) {
        $file = new Upload();
        if ($id == null) {
            $model = new LearningGroup();
            $model->unsetAttributes();
        } else {
            $model = LearningGroup::model()->findByPk($id);
        }

        if ($_POST['LearningGroup']) {
            $model->attributes = $_POST['LearningGroup'];

            //รูปภาพภาษาไทย
            $file->image = $_POST['Upload']['image'];
            $file->image = CUploadedFile::getInstance($file, 'image');
            if ($file->image != NULL) {
                $model->pic = $file->image;
            } else {
                if ($model->pic == NULL)
                    $model->pic = 'default.jpg';
            }
            //--------------
            //รูปภาพภาษาอังกฤษ
            $file->image2 = $_POST['Upload']['image2'];
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
                        alert('" . Yii::t('language', 'เพิ่มข้อมูลเรียบร้อย') . "');
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

        if ($model->pic != 'default.jpg') {
//            $file_paht = './file/learning';
//            if (!file_exists($file_paht))
//                mkdir($file_paht, 0777);
//
//            unlink($file_paht . '/' . $model->pic);
            $file_paht = './file/learning/' . $model->pic;
            if (fopen($file_paht, 'w'))
                unlink($file_paht);
        }
        if ($model->pic != $model->pic_en && $model->pic_en != null && $model->pic != null) {
            if ($model->pic_en != 'default.jpg') {
                $file_paht = './file/learning/' . $model->pic_en;
//                if (!file_exists($file_paht))
//                    mkdir($file_paht, 0777);
                if (fopen($file_paht, 'w'))
                    unlink($file_paht);
            }
        }

        if ($model->delete())
            echo "ลบข้อมูลเรียบร้อย";
    }

    public function actionLearning() {
        $model = new Learning();
        $model->unsetAttributes();

        if ($_GET['Learning']) {
            $model->attributes = $_GET['Learning'];
        }

        $this->render('learning', array(
            'model' => $model,
        ));
    }

    public function actionInsertLearning($id = null) {
        if ($id == null) {
            $model = new Learning();
            $model->unsetAttributes();

            $modelVideo = new LearningVideo();
            $modelVideo->unsetAttributes();
        } else {
            $model = Learning::model()->findByPk($id);
            $modelVideo = LearningVideo::model()->find('main_id = ' . $id);
        }

        if ($_POST['Learning'] && $_POST['LearningVideo']) {
            $model->attributes = $_POST['Learning'];
            $model->author = Yii::app()->user->id;
            $model->guide_status = '0';
            $model->date_write = date("Y-m-d H:i:s");
            $modelVideo->main_id = '1';

            $modelVideo->attributes = $_POST['LearningVideo'];
            $modelVideo->video = str_replace('watch?v=', 'embed/', $modelVideo->video);

            $model->validate();
            $modelVideo->validate();
            if ($model->getErrors() == null && $modelVideo->getErrors() == null) {
                if ($model->save()) {
                    $modelVideo->main_id = $model->id;
                    if ($modelVideo->save()) {
                        echo "
                        <script>
                        alert('" . Yii::t('language', 'เพิ่มข้อมูลเรียบร้อย') . "');
                        window.location='/learning/manage/InsertLearning';
                        </script>
                        ";
                    }
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            } else {
                echo "<pre>";
                print_r(array($model->getErrors(), $modelVideo->getErrors()));
                echo "</pre>";
            }
        }

        $this->render('_insert_learning', array(
            'model' => $model,
            'modelVideo' => $modelVideo,
        ));
    }

}

?>
