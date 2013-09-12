<!--<h3 class="headfont"><i class="icon-file-alt"></i><?php echo Yii::t('language', 'บทความยอดนิยม'); ?></h3>-->
<div class="clearfix">
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $model->getKnowledgeHot($knowledge_type_id),
        'itemView' => '_list', // refers to the partial view named '_post'
        'summaryText' => '',
        'sortableAttributes' => array(
//                    'id', 
        ),
    ));
    ?>
</div>