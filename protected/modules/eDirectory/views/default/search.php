<h2 class="clearfix">
    <?php
    echo Yii::t('language', 'ค้นหาจาก') . ' ';
    if ($type_name != null)
        echo '"' . $type_name . '"';
    echo ' ';
    if ($name != null)
        echo '"' . $name . '"';
    echo ' ';
    if ($address != null)
        echo '"' . $address . '"';
    ?>
</h2>
<hr>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => 'list_search',
    'summaryText' => false,
));
?>