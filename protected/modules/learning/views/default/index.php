<?php
$list = array(
    array('text' => Yii::t('language', 'บทเรียนทั้งหมด'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('_side_bar_noch', array(
    'model' => $model,
    'id' => $id,
    'list' => $list,
));

$model_learning_group = LearningGroup::model()->findByPk($id);
$name_group = LanguageHelper::changeDB($model_learning_group->name, $model_learning_group->name_en);
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-bookmark-empty"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/learning/default/home")); ?>">
                    <?php echo Yii::t('language', 'กลุ่มการเรียนรู้'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $name_group; ?>
            </span>
        </h3>
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $learningList->getLearningList($id),
            'itemView' => '_learning_list',
            'summaryText' => false,
        ));
        ?>
    </div>
</div>