<?php
$this->renderPartial('_sidebar', array(
    'slectTname' => 'selected',
));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                    <?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?>
                </a>
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', 'รายละเอียด'); ?>
            </span>
        </h3>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'รายละเอียด'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/descriptionInsert'
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <?php
        $this->renderPartial('description_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
        <div style="text-align: center;">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/member/manage/profile'
                )) . "'")
            );
            ?>
            <hr>
        </div>
    </div>
</div>