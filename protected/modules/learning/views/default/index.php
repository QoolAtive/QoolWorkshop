<?php
$list = array(
    array('text' => Yii::t('language', 'Learning Groups'), 'link' => '#', 'select' => ''),
    array('text' => Yii::t('language', 'Learning'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('_side_bar', array(
    'model' => $model,
    'id' => $id,
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $learningGroup->getData(), 
                'itemView' => '_clist_learning_group',
                'summaryText' => false,
//                'sortableAttributes' => array(
//                    'title',
//                    'create_time' => 'Post Time',
//                ),  
            ));
            ?>
        </div>
        <div id="view2" class="tabcontent">
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
</div>