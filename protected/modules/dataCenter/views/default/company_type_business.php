<?php
$this->renderPartial('_sidebar', array(
    'selectTBusiness' => 'selected',
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
                <?php echo Yii::t('language', 'ประเภทร้านค้า'); ?>
            </span>
        </h3>
        <h3><?php echo Yii::t('language', 'ประเภทร้านค้าหลัก'); ?></h3>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ประเภทร้านค้าหลัก'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/insertCompanyTypeBusiness'
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <?php
        $this->renderPartial('_grid_company_type_business', array(
            'model' => $model,
        ));
        ?>
        <h3><?php echo Yii::t('language', 'ประเภทร้านค้าย่อย'); ?></h3>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ประเภทร้านค้าย่อย'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/companySubTypeBusinessInsert'
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <?php
        $this->renderPartial('_grid_company_type_business_sub', array(
            'modelSubType' => $modelSubType,
            'dataProvider' => $dataProvider,
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