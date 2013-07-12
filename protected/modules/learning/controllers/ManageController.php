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

            $file->image = $_POST['Upload']['image'];
            $file->image = CUploadedFile::getInstance($file, 'image');
            if ($file->image != NULL) {
                $model->pic = $file->image;
            } else {
                if ($model->pic == NULL)
                    $model->pic = 'default.jpg';
            }

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
            $file_paht = './file/learning/';
            if (!file_exists($file_paht))
                mkdir($file_paht, 0777);

            unlink($file_paht . '/' . $model->pic);
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

    public function actionInsertLearning() {
        $file = new Upload();
        $model = new Learning();
        $model->unsetAttributes();

        if ($_POST['Learning']) {
            $model->attributes = $_POST['Learning'];

//            $file->image = $_POST['Upload']['image'];
//            $file->image = CUploadedFile::getInstance($file, 'image');
//            if ($file->image != NULL) {
//                $model->pic = $file->image;
//            } else {
//                if ($model->pic == NULL)
//                    $model->pic = 'default.jpg';
//            }

            $model->validate();
            if ($model->getErrors() == null) {
                if ($model->save()) {
//                    if ($file->image != NULL) {
//                        $dir = './file/learning/';
//                        if (!file_exists($dir))
//                            mkdir($dir, 0777);
//
//                        $image = $dir . '/' . $file->image;
//
//                        $file->image->saveAs($image);
//                    }
                    echo "
                        <script>
                        alert('" . Yii::t('language', 'เพิ่มข้อมูลเรียบร้อย') . "');
                        window.location='/learning/manage/InsertLearningGroup';
                        </script>
                        ";
                } else {
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>";
                }
            }
        }

        $this->render('_insert_learning', array(
            'model' => $model,
            'file' => $file,
        ));
    }

}

?>
