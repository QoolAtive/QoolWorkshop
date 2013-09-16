<?php
$this->renderPartial('_side_menu', array('select' => 'main'));
?>
<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>

        <h3 class="barH3">
            <span>
                <i class="icon-question-sign"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory/#sub")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามย่อย'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'เรียงลำดับ') . Yii::t('language', 'หมวดหมู่คำถามย่อย'); ?>
            </span>
        </h3>
        
        <div class="_100">
            <h3>
                <?php echo Yii::t('language', 'กรุณาเลือกหมวดหมู่คำถามหลัก'); ?>
            </h3>
            <?php
            foreach ($model as $faq_main) {
                echo '<div class="_100">';
                echo '<a href="' . CHtml::normalizeUrl(array('/faq/manage/sortSub', 'main_id' => $faq_main['id'])) . '">';
                echo $faq_main['name_th'];
                echo '</a></div>';
            }
            ?>
        </div>
    </div>
</div>

