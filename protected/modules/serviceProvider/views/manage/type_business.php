<?php
$this->renderPartial('_side_bar', array(
    'select1' => 'selected',
    'select2' => '',
));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-compass"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/default/index")); ?>">
                    <?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/manage/typeBusiness")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บริการ'); ?>
                </a> 
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'ประเภทผู้ให้บริการ'); ?> 
            </span>
        </h3>

        <div class="textcenter">
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ประเภทผู้ให้บริการหลัก'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertTypeBusiness'
                )) . "'")
            );

            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'ประเภทผู้ให้บริการย่อย'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/typeBusinessSubInsert'
                )) . "'")
            );
            ?>
            <hr>
        </div>
        <?php
        $tabs = array();

        $tabs[Yii::t('language', 'ประเภทผู้ให้บริการหลัก')] = array(
            'id' => 'tab01',
            'content' => $this->renderPartial('_grid_type_business', array(
                'model' => $model,
                    ), true, false),
        );

        $tabs[Yii::t('language', 'ประเภทผู้ให้บริการย่อย')] = array(
            'id' => 'tab02',
            'content' => $this->renderPartial('_grid_type_business_sub', array(
                'modelTypeSub' => $modelTypeSub,
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
    </div>
</div>