<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $model = new About();
        if (isset($_POST['About'])) {
            $model->attributes = $_POST['About'];
            $model->save();
        }
        $this->render('index', array('model' => $model));
    }

    public function actionEditAbout() {
        $model = new About();
        if (isset($_POST['About'])) {
            $model->attributes = $_POST['About'];
            if ($model->validate()) {
                About::model()->updateAll(array('about_text' => $model->about_text));
                $this->redirect(CHtml::normalizeUrl(array('/about/default/index')));
            }
        }
        $this->renderPartial('_edit_about', array('model' => $model));
    }

//send mail Contact
    public function actionSendmail() {
        if ($_POST['email'] != NULL && $_POST['description'] != NULL && $_POST['name'] != NULL) {
            $model = new ContactEmail();
            $model->email = $_POST['email'];
            $data['from'] = $_POST['email'];
            $data['name'] = $_POST['name'];
            $data['to'] = 'yaibathai@gmail.com';
            $data['subject'] = 'มีข้อความตืดต่อจาก คุณ ' . $_POST['name'];
            $data['message'] = $_POST['description'] . "<br/>" . $_POST['website'];
            if ($model->save()) {
                if (Tool::mailsendContact($data)) {
                    echo "<script>
                        alert('ส่งข้อมูลเรียบร้อย');
                    </script>";
                } else {
                    echo "<script>
                        alert('เกิดข้อผิดพลาดขณะส่งข้อมูล');
                    </script>";
                }
            } else {
                echo "<script>
                        alert('อีเมล์ของคุณไม่ถูกต้อง');
                    </script>";
            }//END if (Tool::mailsendContact($data)) {
        } else {
            echo "<script>
                    alert('กรุณากรอก ชื่อ, E-mail และ ข้อความที่ต้องการให้ครบ');
                </script>";
        }//END if ($_POST['email'] != NULL && $_POST['description'] != NULL && $_POST['name'] != NULL) {
        ?>
        <script>
            window.location = "<?php echo CHtml::normalizeUrl(array("/about/default/index#view2")); ?>";
        </script><?php
//        $this->redirect(CHtml::normalizeUrl(array('/about/default/index')));
    }

}