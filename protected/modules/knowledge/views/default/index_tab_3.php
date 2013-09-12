<!--<h3 class="headfont"><i class="icon-file-alt"></i><?php echo Yii::t('language', 'บทความล่าสุด'); ?></h3>-->
<div class="viewall">
    <i class="icon-search"></i>
    <?php
    echo CHtml::link(Yii::t('language', 'บทความทั้งหมด'), array('/knowledge/default/knowledge'));
    ?>
</div>
<div class="clearfix">
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $model->getData('', $knowledge_type_id),
        'itemView' => '_list', // refers to the partial view named '_post'
        'summaryText' => '',
        'sortableAttributes' => array(
//                    'id', 
        ),
    ));
    ?>
</div>