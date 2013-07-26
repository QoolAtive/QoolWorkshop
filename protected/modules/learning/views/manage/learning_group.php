<?php
$this->renderPartial('_side_bar', array(
    'select1' => 'selected',
    'select2' => '',
));
?>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <div>
                <h3><?php echo Yii::t('language', 'กลุ่มการเรียนรู้'); ?></h3>
                <hr>
                <div style="text-align: center;"> 
                    <?php
                    echo CHtml::button(Yii::t('language', 'เพิ่มกลุ่มการเรียนรู้'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/learning/manage/InsertLearningGroup'
                        )) . "'")
                    );
                    ?>
                </div>
                <hr>
                <?php
                $this->renderPartial('_grid_learning_group', array(
                    'model' => $model,
                    'dataProvider' => $model->getData(),
                ));
                ?>
                <hr>
            </div>
        </div>
    </div>
</div>