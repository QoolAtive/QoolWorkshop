<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $model = new Knowledge;

        // ปุ่มย้อนกลับ
        Yii::app()->user->setState('link_back', '/knowledge/default/index');
        Yii::app()->user->setState('knowledge', '/knowledge/default/index');
        $this->render('index', array(
            'model' => $model,
//            'dataProvider' => $model->getData('1'),
        ));
    }

    public function actionView($id) {
        $view = Knowledge::model()->findByPk($id);
        $model = new Knowledge;

        // ลิ้งหน้า เพิ่มบทความ
        Yii::app()->user->setState('insert', 'view');
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
        Yii::app()->user->setState('link_back', '/knowledge/manage/knowledge');
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
            $day_end = cal_days_in_month(CAL_GREGORIAN, $_POST['month_end'], ((int) $_POST['year_end'] - 543));
            $date_start = ((int) $_POST['year_start'] - 543) . "-" . $_POST['month_start'] . "-01 00:00:00";
            $date_end = ((int) $_POST['year_end'] - 543) . "-" . $_POST['month_end'] . "-" . $day_end . " 23:59:59";
            $subject = $_POST['subject'];
            $con = array(
                'date_start' => $date_start,
                'date_end' => $date_end,
                'subject' => $subject,
            );

            if ($date_start > $date_end) {
                echo "
                    <script>
                    alert('วันเดือนปีเริ่มต้นต้องน้อยกว่าหรือเท่ากับวันเดือนปีที่สิ้นสุด');
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
                    เดือน" . Thai::$thaimonth_full[$_POST['month_start']] . "
                    ปี พ.ศ. " . $_POST['year_start'] . "
                    ถึง เดือน" . Thai::$thaimonth_full[$_POST['month_end']] . "
                    ปี พ.ศ. " . $_POST['year_end'] . "
                </li></ul>";
        }

        $this->renderPartial('_grid_all_knowledge', array(
            'model' => $model,
            'dataProvider' => $model->getData('', Yii::app()->user->getState('con')),
            'date_select' => $date_select,
        ));
    }

}