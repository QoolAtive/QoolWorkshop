<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php
                    $shop_name = WebShop::model()->findByPk($model->web_shop_id)->name_th;
                    echo Yii::t('language', 'ร้าน ') . $shop_name;
                    ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShop")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopFormat")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'รูปแบบร้านค้า'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'เลือกอักษรและข้อความ'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'font-form',
        ));
        echo $form->errorSummary($model);
        ?>
        <h3 class="_100"> <?php echo Yii::t('language', 'อักษรและข้อความ'); ?> </h3>

        <!--สีอักษรทั่วไป-->
        <div class="_50">
            <div class="right">
                <?php
                echo $form->labelEx($model, 'char_color');
                echo $form->textField($model, 'char_color', array(
                    'class' => 'colorpicker',
                    'style' => 'width:200px;'
                ));
                ?>
            </div>
        </div>

        <!--ขนาดอักษรทั่วไป-->
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'char_size');
            echo $form->textField($model, 'char_size', array(
                'class' => 'numberinput',
                'style' => 'width:200px;'
            ));
            ?>
        </div>

        <div class="_100"></div>
        <!--สีอักษรหัวข้อ-->
        <div class="_50">
            <div class="right">
                <?php
                echo $form->labelEx($model, 'topic_color');
                echo $form->textField($model, 'topic_color', array(
                    'class' => 'colorpicker',
                    'style' => 'width:200px;'
                ));
                ?>
            </div>
        </div>

        <!--ขนาดอักษรหัวข้อ-->
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'topic_size');
            echo $form->textField($model, 'topic_size', array(
                'class' => 'numberinput',
                'style' => 'width:200px;'
            ));
            ?>
        </div>
        <div class="_100"></div>

        <!--สีอักษรลิ้งก์เมนู-->
        <div class="_50">
            <div class="right">
                <?php
                echo $form->labelEx($model, 'link_color');
                echo $form->textField($model, 'link_color', array(
                    'class' => 'colorpicker',
                    'style' => 'width:200px;'
                ));
                ?>
            </div>
        </div>

        <!--ขนาดอักษรลิ้งก์เมนู-->
        <div class="_50">
            <?php
            echo $form->labelEx($model, 'link_size');
            echo $form->textField($model, 'link_size', array(
                'class' => 'numberinput',
                'style' => 'width:200px;'
            ));
            ?>
        </div>

        <div class="_100">
            <div class="textcenter">
                <hr>
                <?php
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
                echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopFormat")) . '"'));
                ?>
                <hr>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>