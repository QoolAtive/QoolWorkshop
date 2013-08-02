<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $model = new Knowledge;
        $modelLearning = new LearningGroup();

        // ปุ่มย้อนกลับ
        Yii::app()->user->setState('link_back', '/knowledge/default/index');
        Yii::app()->user->setState('knowledge', '/knowledge/default/index');
        $this->render('index', array(
            'model' => $model,
            'modelLearning' => $modelLearning,
//            'dataProvider' => $model->getData('1'),
        ));
    }

    public function actionView($id) {
        $view = Knowledge::model()->findByPk($id);
        $model = new Knowledge;

        // ลิ้งหน้า เพิ่มบทความ
        Yii::app()->user->setState('insert', 'view');

        // ลิ้งกลับมายังหน้ารายละเอียด ขณะที่แอดมินเข้าไปแก้ไขรายละเอียด บทความ
//        Yii::app()->user->setState('cancel', '/knowledge/default/');
        $this->render('_view', array(
            'view' => $view,
            'model' => $model,
        ));
    }

    public function actionKnowledge() {
        $model = new Knowledge();

        $model->unsetAttributes();
        if (isset($_GET['Knowledge'])) {
            $model->attributes = $_GET['Knowledge'];
        }

        // ปุ่มย้อนกลับ
        Yii::app()->user->setState('link_back', '/knowledge/default/knowledge');
        $this->render('knowledge', array(
            'model' => $model,
//            'model_guide' => $model_guide,
        ));
    }

    public function actionQueryKnowledge() {
        $model = new Knowledge();
        $model->unsetAttributes();
        if (isset($_GET['Knowledge'])) {
            $model->attributes = $_GET['Knowledge'];
        }
        if (isset($_POST['month_start']) && isset($_POST['month_end']) && isset($_POST['year_start']) && isset($_POST['year_end']) && isset($_POST['subject'])) {
            $year_start_db = LanguageHelper::changeDB(((int) $_POST['year_start'] - 543), (int)$_POST['year_start']);
            $year_end_db = LanguageHelper::changeDB(((int) $_POST['year_end'] - 543), (int)$_POST['year_end']);
            
            $day_end = cal_days_in_month(CAL_GREGORIAN, $_POST['month_end'], $year_end_db);

            if (strlen($_POST['month_start']) == 1) {
                $month_start = '0' . $_POST['month_start'];
            }
            if (strlen($_POST['month_end']) == 1) {
                $month_end = '0' . $_POST['month_end'];
            }
            
            
            $date_start = $year_start_db . "-" . $month_start . "-01 00:00:00";
            $date_end = $year_end_db . "-" . $month_end . "-" . $day_end . " 23:59:59";
            $subject = $_POST['subject'];
            $con = array(
                'date_start' => $date_start,
                'date_end' => $date_end,
                'subject' => $subject,
            );

            if ($date_start > $date_end) {
                echo "
                    <script>
                    alert(" . Yii::t('language', 'วันเดือนปีเริ่มต้นต้องน้อยกว่าหรือเท่ากับวันเดือนปีที่สิ้นสุด') . ");
                    window.location='/knowledge/default/knowledge';
                    </script>
                    ";
            }
//            if($_POST['subject'] == NULL){
//                echo "
//                    <script>
//                    alert('กรอกหัวข้อที่ต้องการ');
//                    </script>
//                    ";
//            }
            Yii::app()->user->setState('con', $con);
//            echo "<pre>";
//            print_r($con);
//            echo "</pre>";die;
            $date_select = "
                <ul><li>
                    " . Yii::t('language', 'เดือน') . Yii::t('language', Thai::$thaimonth_full[$_POST['month_start']]) . "
                    " . Yii::t('language', 'ปี พ.ศ.') . " " . $_POST['year_start'] . "
                    " . Yii::t('language', 'ถึง'). " ". Yii::t('language', 'เดือน') . Yii::t('language', Thai::$thaimonth_full[$_POST['month_end']]) . "
                    " . Yii::t('language', 'ปี พ.ศ.') . " " . $_POST['year_end'] . "
                </li></ul>";
        }

        $this->renderPartial('_grid_all_knowledge', array(
            'model' => $model,
            'dataProvider' => $model->getDataQuery(Yii::app()->user->getState('con')),
            'date_select' => $date_select,
        ));
    }

}