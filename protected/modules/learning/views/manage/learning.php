<?php
$this->renderPartial('_side_bar', array(
    'select2' => 'selected',
    'select1' => '',
));
?>
<div class="content">
    <div class="tabcontents">
        <div id="view2" class="tabcontent">
            <div>
                <h3><?php echo Yii::t('language', 'กลุ่มบทเรียน'); ?></h3>
                <hr>
                <div style="text-align: center;">
                    <?php
                    echo CHtml::button(Yii::t('language', 'เพิ่มบทเรียน'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
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