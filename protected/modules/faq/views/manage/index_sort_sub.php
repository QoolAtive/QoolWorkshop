<style>
    #sortable { list-style-type: none; margin: 0; padding: 0px 15px; width: 95%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em 0.4em 0.9em 1.5em; font-size: 1.4em; height: 18px; }
    #sortable li span { position: absolute; margin-left: -0.8em; margin-top: 0.4em; }
</style>
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
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory/#sub")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามย่อย'); ?>
                </a>
                <i class="icon-chevron-right"></i> 
                <?php echo Yii::t('language', 'เรียงลำดับ') . Yii::t('language', 'หมวดหมู่คำถามย่อย'); ?>
            </span>
        </h3>

        <div class="_100">
            <h3>
                <?php echo Yii::t('language', 'กรุณาเลือก') . Yii::t('language', 'หมวดหมู่คำถามหลัก') . ' : '; ?>
            </h3>
            <ul id="sortable" class="ui-sortable">
                <?php
                foreach ($model as $faq_main) {
                    echo '<a href="' . CHtml::normalizeUrl(array('/faq/manage/sortSub', 'main_id' => $faq_main['id'])) . '">';
                    echo '<li class="ui-state-default">';
                    echo '<i class="icon-chevron-right"></i> ';
                    $main_name = LanguageHelper::changeDB($faq_main['name_th'], $faq_main['name_en']);
                    echo Yii::t('language', 'เรียงลำดับ') . $main_name;
                    echo '</li></a>';
                }
                ?>
            </ul>
        </div>
        <div class="_100 textcenter">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/manageCategory#sub")) . '"'));
            ?>
            <hr>
        </div>
    </div>
</div>

