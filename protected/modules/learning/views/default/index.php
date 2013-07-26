<?php
$list = array(
    array('text' => Yii::t('language', 'บทเรียนทั้งหมด'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('_side_bar', array(
    'model' => $model,
    'id' => $id,
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">

        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $learningList->getLearningList($id),
            'itemView' => '_learning_list',
            'summaryText' => false,
//                'sortableAttributes' => array(
//                    'title',
//                    'create_time' => 'Post Time',
//                ),
        ));
        ?>
    </div>
</div>