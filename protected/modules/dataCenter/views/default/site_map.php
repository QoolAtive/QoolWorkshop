<?php
$this->renderPartial('_sidebar', array(
    'selectSiteMap' => 'selected',
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
                <?php echo Yii::t('language', 'แผนผังเว็บไซต์'); ?>
            </span>
        </h3>
        <?php
        $tabs = array();

        $tabs[Yii::t('language', 'หมวดหมู่หลัก')] = array(
            'id' => 'tab01',
            'content' => $this->renderPartial('site_map_grid', array(
                'modelSiteMap' => $modelSiteMap,
                'dataProvider' => $dataProvider,
                    ), true, false),
        );

        $tabs[Yii::t('language', 'หมวดหมู่ย่อย')] = array(
            'id' => 'tab02',
            'content' => $this->renderPartial('site_map_sub_grid', array(
                'modelSiteMapSub' => $modelSiteMapSub,
                'dataProvider' => $dataProviderSub,
                    ), true, false),
        );
        ?>
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'หมวดหมู่หลัก'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/siteMapInsert'
                )) . "'")
            );

            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'หมวดหมู่ย่อย'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/siteMapSubInsert'
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <?php
        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs' => $tabs,
            'options' => array(
//                'collapsible' => true,
                'collapsible' => false,
            ),
            'id' => 'tab_all',
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