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
        testtest
        <div style="text-align: center;">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ประเภทร้านค้าหลัก'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/insertCompanyTypeBusiness'
                )) . "'")
            );
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ประเภทร้านค้าย่อย'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/dataCenter/default/companySubTypeBusinessInsert'
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <?php
        $tabs = array();
        
        $tabs[Yii::t('language', 'ประเภทร้านค้าหลัก')] = array(
            'id' => 'tab01',
            'content' => $this->renderPartial('_grid_company_type_business', array(
                'model' => $model
                    ), true, false),
        );
        $tabs[Yii::t('language', 'ประเภทร้านค้าย่อย')] = array(
            'id' => 'tab02',
            'content' =>
            $this->renderPartial('_grid_company_type_business_sub', array(
                'modelSubType' => $modelSubType,
                'dataProvider' => $dataProvider,
                    ), true, false),
        );
        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs' => $tabs,
            'options' => array(
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