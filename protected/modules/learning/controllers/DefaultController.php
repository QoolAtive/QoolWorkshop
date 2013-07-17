<?php

class DefaultController extends Controller {

    public function actionIndex($id = null) {
        $model = Learning::model()->findAll('group_id=:group_id', array(':group_id' => $id));
        $learningList = new Learning();
        $learningGroup = new LearningGroup();

        $this->render('index', array(
            'model' => $model,
            'id' => $id,
            'learningList' => $learningList,
            'learningGroup' => $learningGroup,
        ));
    }

    public function actionLesson($id = null) {
        $model = Learning::model()->findByPk($id);
        $modelList = Learning::model()->findAll('group_id=:group_id', array(':group_id' => $model->group_id));
        $modelVideo = LearningVideo::model()->find('main_id=:main_id', array(':main_id' => $id));
        $modelFile = LearningFile::model()->find('main_id=:main_id', array(':main_id' => $id));

        $learningGroup = new LearningGroup();

        foreach ($modelList as $data) {
            $nl[] = $data['id'];
        }

//        echo "<pre>";
//        print_r($nl);
//        echo "</pre>";
        $idnext = null;
        $idnextlesson = null;
        foreach ($nl as $key => $value) {
            if ($id == $value) {
                $idnext = $key + 1;
            }
        }
        foreach ($nl as $key => $value) {
            if ($key == $idnext) {
                $idnextlesson = $value;
            }
        }
        if ($idnextlesson != null) {
            $lessonNext = Learning::model()->findByPk($idnextlesson); // บทเรียนทัดไป
            $lessonNextVideo = LearningVideo::model()->find('main_id=:main_id', array(':main_id' => $lessonNext->id));
        } else {
            $lessonNext = null;
            $lessonNextVideo = null;
        }
        $this->render('_lesson', array(
            'model' => $model,
            'modelList' => $modelList,
            'modelVideo' => $modelVideo,
            'id' => $model->group_id, // กลุ่ม learning
            'lessonNext' => $lessonNext, //บทเรียนทัดไป
            'lessonNextVideo' => $lessonNextVideo,
            'learningGroup' => $learningGroup,
            'modelFile' => $modelFile,
        ));
    }

}