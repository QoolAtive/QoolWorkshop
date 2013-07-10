<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'search-form',
        )
);
?>
<style>
    label{
        display: inline-block;
    }
</style>
<div style="text-align: center; ">
    <div style='display: inline-block;'>
        <?php
        echo CHtml::label('เดือน : ', false);
        echo CHtml::dropDownList('month_start', $month_start, Thai::$thaimonth_full, array(
            'style' => 'width:100px;',
            'id' => 'month_start',
        ));
        ?>
    </div>
    <div style='display: inline-block;'>
        <?php
        echo CHtml::label('ปี (พ.ศ.) : ', false);
        echo CHtml::dropDownList('year_start', $year_start, Tool::getDropdownListYear(), array(
            'style' => 'width:120px;',
            'id' => 'year_start',
        ));
        ?>
    </div>
    <p style='display: inline-block;'>ถึง</p>
    <div style='display: inline-block;'>
        <?php
        echo CHtml::label('เดือน : ', false);
        echo CHtml::dropDownList('month_end', $month_end, Thai::$thaimonth_full, array(
            'style' => 'width:100px;',
            'id' => 'month_end',
        ));
        ?>
    </div>
    <div style='display: inline-block;'>
        <?php
        echo CHtml::label('ปี (พ.ศ.) : ', false);
        echo CHtml::dropDownList('year_end', $year_end, Tool::getDropdownListYear(), array(
            'style' => 'width:120px;',
            'id' => 'year_end',
        ));
        ?>
    </div>
    <div style="text-align: center;">
        <?php
        echo CHtml::label('เลือกหัวข้อ', false);
        echo CHtml::textfield('subject', $subject, array(
            'style' => 'width:500px;',
        ));
        ?>
    </div>
    <div style='text-align: center;'>
        <?php
        echo CHtml::ajaxSubmitButton('ค้นหา', CHtml::normalizeUrl(array(
                    '/knowledge/default/QueryKnowledge')), array(
            'update' => 'div#show_detail',
//        'beforeSend' => 'function(){ $("#show_detail_loading").addClass("loading");}',
//        'complete' => 'function(){ $("#show_detail_loading").removeClass("loading");}',), array(
//        'id' => 'search_show_detail_button',
//        'name' => 'search_show_detail_button'
        ));
        ?>
    </div>
</div>
<?php
$this->endWidget();
?>