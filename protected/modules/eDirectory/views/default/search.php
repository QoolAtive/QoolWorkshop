<h3><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'ค้นหาร้านค้า'); ?></h3>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_list_all',
    'summaryText' => false,
    'emptyText' => Yii::t('language', 'ไม่มีร้านค้า'),
    'template' => "{items}\n{pager}",
));
?>