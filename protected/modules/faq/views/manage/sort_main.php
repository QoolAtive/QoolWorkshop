<?php
$this->renderPartial('_side_menu', array('select' => 'main'));
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <h3 class="barH3">
            <span>
                <i class="icon-question-sign"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/faq/manage/manageCategory")); ?>">
                    <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'เรียงลำดับ') . Yii::t('language', 'หมวดหมู่คำถามหลัก'); ?>
            </span>
        </h3>

        <div class="_100 textcenter">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'sort-form',
            ));
//        echo $form->errorSummary($model);
            ?>
            <ul id="sortable">
                <?php
                $faq_main_list = FaqMain::model()->findAll(array('order' => 'order_n'));
                foreach ($faq_main_list as $main) {
                    ?>
                    <li id="<?php echo $main['id']; ?>" class="ui-state-default" value="<?php echo $main['order_n']; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $main['name_th']; ?></li>
                    <?php
                }
                ?>
            </ul>

            <div class="_100 textcenter" style="margin-top: 25px;">
                <?php
                echo CHtml::hiddenField('sort_arr', '', array(
                    'id' => 'sort_arr',
                ));
                echo CHtml::submitButton(Yii::t('language', 'บันทึก'), array(
                    'class' => "purple",
                ));
                echo CHtml::button(Yii::t('language', 'ยกเลิก'), array(
                    'onclick' => 'window.location = "' . CHtml::normalizeUrl(array("/faq/manage/manageCategory")) . '"'));
                ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>