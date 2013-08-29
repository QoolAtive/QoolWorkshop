<div class="main_box clearfix">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-form',
    ));
//    echo $form->errorSummary($order);
    ?>
    <div class="_100">
        <?php
        echo $form->labelEx($order, 'customer_name');
        echo $form->textField($order, 'customer_name', array(
            'class' => 'fieldrequire',
            'placeholder' => Yii::t('language', 'ชื่อ'),
        ));
        echo $form->error($order, 'customer_name');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->labelEx($order, 'customer_email');
        echo $form->textField($order, 'customer_email', array(
            'class' => 'fieldrequire',
            'placeholder' => Yii::t('language', 'อีเมล์'),
        ));
        echo $form->error($order, 'customer_email');
        ?>
    </div>
    <div class="_100">
        <?php
        echo $form->labelEx($order, 'customer_tel');
        echo $form->textField($order, 'customer_tel', array(
            'class' => 'fieldrequire',
            'placeholder' => Yii::t('language', 'โทรศัพท์'),
        ));
        echo $form->error($order, 'customer_tel');
        ?>
    </div>

    <div style="text-align: center; margin-top: 10px;">
        <?php
        echo CHtml::submitButton(Yii::t('language', '    สั่งซื้อ    '));
        echo CHtml::button(Yii::t('language', '    ยกเลิก    '), array(
            'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/shop/busket", 'id' => $id)) . '"'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
