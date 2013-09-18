<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="/css/global.css"  type="text/css"></link>
        <link rel="stylesheet" href="/css/style.css"  type="text/css"></link>
        <meta charset="utf-8">
        <title>title</title>


        <style type="text/css">
            html,body{
                overflow: hidden !important;
            }
            .errorMessage {
                font-size: 11px;
                margin-left: 102px;
                margin-top: -46px;
                position: absolute;
                width: 100%;
            }

            #LoginForm_password_em_.errorMessage{
                font-size: 11px;
                margin-left: 86px;
                margin-top: 45px;
                position: absolute;
                width: 100%;
            }



        </style>
    </head>


    <body>
        <?php
        /* @var $this SiteController */
        /* @var $model LoginForm */
        /* @var $form CActiveForm  */

        $this->pageTitle = Yii::app()->name . ' - Login';
        $this->breadcrumbs = array(
            'Login',
        );

//$member = MemUser::model()->findAll();
//foreach ($member as $m) {
//
//    // print all user and password
//    echo "<br /> USER : " . Tool::Decrypted($m['username']) . " PASS : " . Tool::Decrypted($m['password']);
//}
        ?>

        <div class="_50 frame">
            <img src="/img/iconpage/login.png" style="float:left;"/>
        </div>


        <div class="_50 ">
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'login-form',
                    'enableClientValidation' => true,
                    'focus' => array($model, 'username'),
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array(
                        'autocomplete' => 'off',
                    ),
                ));
                ?>
                <div class="row _100">

                    <?php echo $form->labelEx($model, 'username'); ?>
                    <?php echo $form->textField($model, 'username'); ?>
                    <?php echo $form->error($model, 'username'); ?>

                </div>

                <div class="row _100">

                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password'); ?>
                    <?php echo $form->error($model, 'password'); ?>

                </div>


                <div class="row rememberMe _50">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <?php echo $form->label($model, 'rememberMe'); ?>
                    <?php echo $form->error($model, 'rememberMe'); ?>
                </div>


                <div class="row _50">
                    <?php echo CHtml::link(Yii::t('language', 'ลืมรหัสผ่าน'), array('/member/manage/forgotPassword'), array('target' => '')); ?>
                </div>

                <div class="row buttons _100">

                    <?php echo CHtml::submitButton(Yii::t('language', 'เข้าสู่ระบบ'), array('id' => 'submit')); ?>

    <a style="  background: linear-gradient(#EEB2FF, #DA49FF) repeat scroll center bottom / 1px 50px transparent;
    border: 1px solid #D076FF;
    color: #FFFFFF;
    cursor: pointer;
    transition: background 1s ease-out 0s;
       border: 1px none;
    border-radius: 4px 4px 4px 4px;
    display: inline-block;
    margin: 0 2px;
    padding: 3px 13px;
    font-size:11.1px;" href="javascript:parent.jQuery.fancybox.open({href : '/member/manage/registerRules',  type: 'iframe'});">สร้างผู้ใช้งาน</a>
                </div>

                <?php $this->endWidget(); ?>
            </div><!-- form -->

        </div>


    </body>
</html>
