<?php
$this->renderPartial('_side_menu', array('index' => 'shop'));
?>
<style type="text/css">
    .right img{ 
        width: 200px;
    }
</style>
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
                <?php echo Yii::t('language', 'เลือกโลโก้และพื้นหลังร้านค้า'); ?>
            </span>
        </h3>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'logo_bg-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <div class="clearfix" id="col_right_manage">
            <div class = "radius clearfix _100" id = "browsefile">
                <ul>
                    <li class = "left">
                        <?php
                        echo '<h3>' . $form->labelEx($model, 'logo') . '</h3>';
                        $this->widget('CMultiFileUpload', array(
                            'model' => $model,
                            'attribute' => 'logo',
                            'name' => 'logo_file',
                            'accept' => 'jpg|jpeg|gif|png',
                            'denied' => Yii::t('language', 'allowed_img'),
                            'max' => 1,
                            'remove' => '[x]',
                            'duplicate' => Yii::t('language', 'เลือกไว้แล้ว'),
                                )
                        );
                        ?>
                        <p class = "comment gray">
                            <?php Yii::t('language', 'ขนาดไฟล์'); ?> 1x1 <?php Yii::t('language', 'ถึง'); ?> 165x165 pixel .jpg .gif .png <br><?php Yii::t('language', 'ไม่เกิน'); ?> 1 MB</p>
                    </li>
                    <li class = "right">
                        <?php
                        if ($model->logo != NULL) {
                            echo CHtml::image($model->logo);
                            echo '<div class="txt-cen">';
                            echo CHtml::button(Yii::t('language', 'ลบ'), array(
                                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/deleteLogo")) . '"'));
                            echo '</div>';
                        }
                        ?>
                    </li>
                </ul>
            </div>

        </div>


        <hr>



        <div class = "clearfix" id = "col_right_manage">
            <div class = "radius clearfix _100" id = "browsefile">
                <ul>
                    <li class = "left">
                        <?php
                        echo '<h3>' . $form->labelEx($model, 'background') . '</h3>';
                        $this->widget('CMultiFileUpload', array(
                            'model' => $model,
                            'attribute' => 'background',
                            'name' => 'bg_file',
                            'accept' => 'jpg|jpeg|gif|png',
                            'denied' => Yii::t('language', 'allowed_img'),
                            'max' => 1,
                            'remove' => '[x]',
                            'duplicate' => Yii::t('language', 'เลือกไว้แล้ว'),
                                )
                        );
                        ?>
                        <p class = "comment gray"><?php Yii::t('language', 'ไฟล์'); ?> .jpg .gif .png </p>
                    </li>
                    <li class = "right">
                        <?php
                        if ($model->background != NULL) {
                            echo CHtml::image($model->background);
                            echo '<div class="txt-cen">';
                            echo CHtml::button(Yii::t('language', 'ลบ'), array(
                                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/deleteBg")) . '"'));
                            echo '</div>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="txt-cen _100">
            <hr>
            <?php
            echo $form->hiddenField($model, 'web_shop_format_id');
            echo CHtml::submitButton(Yii::t('language', 'บันทึก'));
            echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/webSimulation/manageShop/manageShopFormat")) . '"'));
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?></div>
</div>