<style type="text/css">

    html, body{
        height: 100% !important;
    }
    #header{
        display: none !important;
    }
    #footer{
        display: none !important;
    }

    div.page{
        padding: 0px !important;
        margin: 0 !important;
        width: 550px;
        height: 200px !important;
        min-height: 200px !important;
        max-height: 200px !important;
    }

    ._40 {
  display: inline !important;
    float: left !important;
    margin-left: 0;
    margin-right: 2% !important;
    margin-top: 0 !important;
    width: 40% !important;
}


._50 {
  display: inline !important;
    float: left !important;
    margin-right: 2% !important;
    margin-left:0px !important;
    margin-top: 18px !important;
    width: 55.5% !important;
}

.errorMessage {
    font-size: 11px;
    margin-left: 165px;
    margin-top: -46px;
    position: absolute;
}

</style>
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

<div class="_40">
<img src="/img/iconpage/login.png" style="float:left;"/>
</div>


 <div class="_50">
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'focus' => array($model, 'username'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
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
    <div class="row _100">
        <?php echo CHtml::link(Yii::t('language', 'ลืมรหัสผ่าน'), array('/member/manage/forgotPassword'), array('target' =>'_bank')); ?>
    </div>

    <div class="row rememberMe _100">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons _100">
        <?php echo CHtml::submitButton(Yii::t('language', 'เข้าสู่ระบบ'), array('id' => 'submit')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->

</div>

