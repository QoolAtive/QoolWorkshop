<?php if (Knowledge::model()->count('guide_status = 1') != 0) { ?>
    <!--<h3 class="headfont"><i class="icon-bookmark-empty"></i><?php echo Yii::t('language', 'บทความแนะนำ'); ?></h3>-->
    <div class="clearfix">
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $model->getData('1', $knowledge_type_id),
            'itemView' => '_list', // refers to the partial view named '_post'
            'summaryText' => '',
            'sortableAttributes' => array(
//                    'id', 
            ),
        ));
        ?>
    </div>
<?php } ?>