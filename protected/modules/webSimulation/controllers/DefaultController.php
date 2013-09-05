<?php

class DefaultController extends Controller {

    public function actionIndex() {
        if (Yii::app()->session['shop_id'] != NULL) {
            unset(Yii::app()->session['shop_id']);
        }
        $this->render('index');
    }

    public function actionAgreement() {
        //สมาชิกที่กดแล้วไม่ต้องกดอีก
        if (isset(Yii::app()->user->id)) {
            $user_id = Yii::app()->user->id;
            $user = WebShopUserAgree::model()->findByPk($user_id);
            if ($user != NULL) {
                echo "
                <script>
                window.top.location.href='/webSimulation/default/index';
                </script>
                ";
//                $this->redirect('/webSimulation/default/index');
            }
        }
        if (isset($_POST['agree'])) {
            if (isset(Yii::app()->user->id)) {
                $user_id = Yii::app()->user->id;
                $user = WebShopUserAgree::model()->findByPk($user_id);
                if ($user == NULL) {
                    $model = new WebShopUserAgree();
                    $model->mem_user_id = $user_id;
                    $model->save();
                }
            }
            
            //นับผู้กดปุ่มยอมรับทั้งหมด (สมาชิก+ไม่สมาชิก)
            $model = WebShopCountUser::model()->find();
            if ($model == NULL) {
                $model = new WebShopCountUser();
                $model->count_number = 1;
                $model->save();
            } else {
                $model['count_number'] += 1;
                WebShopCountUser::model()->updateAll(array('count_number' => $model['count_number']));
            }
            echo "
            <script>
            window.top.location.href='/webSimulation/default/index';
            </script>
            ";
        }
        $this->render('agreement_');
    }

}