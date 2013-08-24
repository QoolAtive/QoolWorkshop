<?php
$this->renderPartial('_sidebar', array(
//    'selectEdu' => '',
//    'selectTBusiness' => '',
//    'selectSex' => '',
//    'slectTname' => 'selected',
));
?>

<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-cog"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/profile")); ?>">
                    ตั้งค่าเว็บไซต์
                </a>
                <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'Description'); ?>
            </span>
        </h3>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . ' ' . Yii::t('language', 'Description'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/descriptionInsert'
                )) . "'")
            );
            ?>
        </div>
        <?php
        $this->renderPartial('description_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
        <div style="text-align: center;">
            <?php
            echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/member/manage/profile'
                )) . "'")
            );
            ?>
        </div>
    </div>
</div>