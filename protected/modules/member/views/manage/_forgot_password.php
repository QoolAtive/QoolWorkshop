



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
     padding: 0 2%;
}

</style>
  </head>


<body>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'forgot_password-form',
    'enableAjaxValidation' => false,
        ));
?>

    <div class="_100" style="margin-top: 15px;"> 
    <h3>ลืมรหัสผ่าน</h3>
    </div>

    <div class="_100" style="margin-top: 10px;">
    <div class="_25">
        <?php
        echo $form->labelEx($model, 'email');
        ?>
</div>
    <div class="_75">
        <?php
        echo $form->textField($model, 'email');
        echo $form->error($model, 'email');
        ?>
    </div>
    <div>
    </div>

    <div class="_100 textcenter" style="margin-top:20px;">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'ยืนยัน'));
        ?>
    </div>
</div>
<?php
$this->endWidget();
?>

</body>
</html>
