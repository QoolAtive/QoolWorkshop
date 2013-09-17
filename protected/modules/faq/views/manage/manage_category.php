<?php
$this->renderPartial('_side_menu', array('select' => 'main'));
?>

<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <h3 class="barH3">
            <span>
                <i class="icon-question-sign"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?>
                </a>
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถาม'); ?>
            </span>
        </h3>
        <?php
        $tabs = array();

        $tabs[Yii::t('language', 'หมวดหมู่คำถามหลัก')] = array(
            'id' => 'main',
            'content' => $this->renderPartial('manage_main', array(
                'model_main' => $model_main,
                    ), true),
        );

        $tabs[Yii::t('language', 'หมวดหมู่คำถามย่อย')] = array(
            'id' => 'sub',
            'content' => $this->renderPartial('manage_sub', array(
                'model_sub' => $model_sub,
                    ), true),
        );

        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs' => $tabs,
            'options' => array(
                'collapsible' => true,
            ),
            'id' => 'tab_all',
        ));
        ?>

    </div>
</div>