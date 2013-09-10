<?php

class DefaultController extends Controller {

    public function filters() {
        return array(
            'rights'
        );
    }

    public function actionIndex($view = NULL) {
        $model = new About();
        if (isset($_POST['About'])) {
            $model->attributes = $_POST['About'];
            $model->save();
        }
        $this->render('index', array('model' => $model, 'view' => $view));
    }

    public function actionEditAbout() {
        $model = new About();
        if (isset($_POST['About'])) {
            $model->attributes = $_POST['About'];
            if ($model->validate()) {
                About::model()->updateAll(array('about_text_th' => $model->about_text_th, 'about_text_en' => $model->about_text_en));
                echo "<script language='javascript'>
                        alert('" . Yii::t('language', 'บันทึกข้อมูลเรียบร้อย') . "');
                                window.top.location.href = '/about/default/index';
                    </script>";
            }
        }
        $this->render('edit_about', array('model' => $model));
    }

//send mail Contact
    public function actionSendmail() {
        if ($_POST['email'] != NULL && $_POST['description'] != NULL && $_POST['name'] != NULL) {
            $model = new ContactEmail();
            $model->email = $_POST['email'];
            $data['from'] = $_POST['email'];
            $data['name'] = $_POST['name'];
            $data['to'] = 'dbdmart2013@gmail.com';
            $data['subject'] = Yii::t('language', 'มีข้อความตืดต่อจาก') . Yii::t('language', 'คุณ ') . $_POST['name'];
            $data['message'] = $_POST['description'] . "<br/>e-mail: " . $_POST['email'] . "<br/>website: " . $_POST['website'];
            if ($model->save()) {
                if (Tool::mailsendContact($data)) {
                    echo "<script>
                        alert('" . Yii::t('language', 'ส่งข้อมูลเรียบร้อย') . "');
                    </script>";
                } else {
                    echo "<script>
                        alert('" . Yii::t('language', 'เกิดข้อผิดพลาดขณะส่งข้อมูล') . "');
                    </script>";
                }
            } else {
                echo "<script>
                        alert('" . Yii::t('language', 'อีเมล์ของคุณไม่ถูกต้อง') . "');
                    </script>";
            }//END if (Tool::mailsendContact($data)) {
        } else {
            echo "<script>
                        alert('" . Yii::t('language', 'กรุณากรอก') . Yii::t('language', 'ชื่อของคุณ') . "," . Yii::t('language', 'อีเมล์') . " " . Yii::t('language', 'และ') . Yii::t('language', 'รายละเอียด') . "');
                </script>";
        }//END if ($_POST['email'] != NULL && $_POST['description'] != NULL && $_POST['name'] != NULL) {
        ?>
        <script>
            window.location = "<?php echo CHtml::normalizeUrl(array("/about/default/index/view/2")); ?>";
        </script>
        <?php
//        $this->redirect(CHtml::normalizeUrl(array('/about/default/index')));
    }

    public function actionSiteMap() {

        $modelSiteMapMain = SiteMap::model()->findAll();

        $this->render('site_map', array(
            'modelSiteMapMain' => $modelSiteMapMain,
        ));
    }

}