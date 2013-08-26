<div id="hot_shop">
    <h3><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'ยอดนิยม'); ?></h3>
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $model,
        'itemView' => '_list_all',
        'summaryText' => false,
        'template' => "{items}\n{pager}",
    ));
    ?>
</div>
