<h3>บทความทั้งหมด</h3>
<?php
$this->renderPartial('_search', array(
    'month_start' => str_replace('0', '', date("m")),
    'month_end' => str_replace('0', '', date("m")),
    'year_start' => date("Y") + 543,
    'year_end' => date("Y") + 543,
));
?>
<hr>
<div id='show_detail'>
    <?php
    $this->renderPartial('_grid_all_knowledge', array(
        'model' => $model,
        'dataProvider' => $model->getData(),
    ));
    ?>
</div>
<div class="textcenter">
    <?php
    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
        'onclick' => "window.location='" . CHtml::normalizeUrl(array(
            '/knowledge/default/index',
        )) . "'",
    ));
    ?>
</div>
