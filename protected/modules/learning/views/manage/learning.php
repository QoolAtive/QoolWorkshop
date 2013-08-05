<?php
$this->renderPartial('_side_bar', array(
    'select_list' => 2,
));
?>
<div class="content">
    <div class="tabcontents">
        <div id="view2" class="tabcontent">
            <div>
                <h3 class="headfont">
                    <span>
                        <i class="icon-bookmark-empty"></i> 
                        <a href="<?php echo CHtml::normalizeUrl(array("/learning/default/home")); ?>">
                            <?php echo Yii::t('language', 'การเรียนรู้'); ?>
                        </a>
                        <i class="icon-chevron-right"></i>
                        <a href="/learning/manage/learning">
                            <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'การเรียนรู้'); ?>
                        </a>
                        <i class="icon-chevron-right"></i>
                        <?php echo Yii::t('language', 'บทเรียน'); ?>
                    </span>
                </h3>
                <hr>
                <div style="text-align: center;">
                    <?php
                    echo CHtml::button(Yii::t('language', 'เพิ่ม').Yii::t('language', 'บทเรียน'), array(
                        'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/learning/manage/InsertLearning'
                        )) . "'")
                    );
                    ?>
                </div>
                <hr>
                <?php
                $this->renderPartial('_grid_learning', array(
                    'model' => $model,
                    'dataProvider' => $model->getData(),
                ));
                ?>
                <hr>
            </div>
        </div>
    </div>
</div>