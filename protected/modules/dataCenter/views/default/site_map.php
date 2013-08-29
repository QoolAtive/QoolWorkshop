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
                    <?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?>
                </a>
                <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'แผนผังเว็บไซต์'); ?>
            </span>
        </h3>
        <div style="text-align: center;">
            <?php
            echo CHtml::button('เพิ่มหมวดหมูหลัก', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/siteMapInsert'
                )) . "'")
            );
            ?>
        </div>
        <h3><?php echo Yii::t('language', 'หัวข้อหลัก'); ?></h3>
        <?php
        $this->renderPartial('site_map_grid', array(
            'modelSiteMap' => $modelSiteMap,
            'dataProvider' => $dataProvider,
        ));
        ?>
        <h3><?php echo Yii::t('language', 'หัวข้อรอง'); ?></h3>
        <div style="text-align: center;">
            <?php
            echo CHtml::button('เพิ่มหมวดหมูรอง', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/siteMapSubInsert'
                )) . "'")
            );
            ?>
        </div>
        <?php
        $this->renderPartial('site_map_sub_grid', array(
            'modelSiteMapSub' => $modelSiteMapSub,
            'dataProvider' => $dataProviderSub,
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