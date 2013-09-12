<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'search-form',
        )
);
?>
<div class="_100 search-box">

    <div class="_100" style=" margin-left: 16px; margin-top: -16px;">
        <div class="_50">
            <div class="_50">
                <?php
                echo CHtml::label(Yii::t('language', 'เดือน') . ' : ', false);
                echo CHtml::dropDownList('month_start', $month_start, LanguageHelper::changeDB(Thai::$thaimonth_full, Thai::$engmonth_full), array(
                    'id' => 'month_start',
                ));
                ?>
            </div>
            <div  class="_50">
                <?php
                echo CHtml::label(Yii::t('language', 'ปี พ.ศ.') . ' : ', false);
                echo CHtml::dropDownList('year_start', $year_start, Tool::getDropdownListYear(), array(
                    'id' => 'year_start',
                ));
                ?>
            </div>
        </div>

        <p class="toknowfix"><?php echo Yii::t('language', 'ถึง'); ?></p>

        <div class="_50">
            <div  class="_50">
                <?php
                echo CHtml::label(Yii::t('language', 'เดือน') . ' : ', false);
                echo CHtml::dropDownList('month_end', $month_end, LanguageHelper::changeDB(Thai::$thaimonth_full, Thai::$engmonth_full), array(
                    'id' => 'month_end',
                ));
                ?>
            </div>
            <div  class="_50">
                <?php
                echo CHtml::label(Yii::t('language', 'ปี พ.ศ.') . ' : ', false);
                echo CHtml::dropDownList('year_end', $year_end, Tool::getDropdownListYear(), array(
                    'id' => 'year_end',
                ));
                ?>
            </div>

        </div>

    </div>

    <div class="_100" style=" margin-left: 16px; margin-top: -24px;">
        <div class="_20">
            <div class="_100" >
                <?php
                echo CHtml::label(Yii::t('language', 'หัวข้อ') . ' : ', false);
                ?>
            </div>
        </div>
        <div class="_80">
            <div class="_100">
                <?php
                echo CHtml::textfield('subject', '', array(
                ));
                ?>
            </div>

        </div>

    </div>

    <div class="_100" style=" margin-left: 16px; margin-top: -24px;">
        <div class="_20">
            <div class="_100" >
                <?php
                echo CHtml::label(Yii::t('language', 'ประเภทบทความ') . ' : ', false);
                ?>
            </div>
        </div>
        <div class="_80">
            <div class="_100">
                <?php
                echo CHtml::dropDownList('type_id', '', KnowledgeType::model()->getList(), array(
                    'empty' => ' - ' . Yii::t('language', 'เลือก') . ' - ',
                    'style' => 'width: 150px;'
                ));
                ?>
            </div>
        </div>
    </div>



    <div style='text-align: center; padding-bottom: 5px; margin-top: -12px;' class="_100">
        <?php
        echo CHtml::ajaxSubmitButton(Yii::t('language', 'ค้นหา'), CHtml::normalizeUrl(array(
                    '/knowledge/default/QueryKnowledge')), array(
            'update' => 'div#show_detail',
// 'beforeSend' => 'function(){ $("#show_detail_loading").addClass("loading");}',
// 'complete' => 'function(){ $("#show_detail_loading").removeClass("loading");}',), array(
// 'id' => 'search_show_detail_button',
// 'name' => 'search_show_detail_button'
        ));
        ?>
    </div>

</div>

<?php
$this->endWidget();
?>
