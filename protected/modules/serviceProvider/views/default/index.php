<?php
$this->renderPartial('_side_bar', array(
    'id' => $id,
));
?>
<div class="content">
    <div class="tabcontents">
        <div style="border: 1px #c9c9c9 solid;padding: 15px;">
            <h3>
                <img src="/img/iconform.png"> <?php echo $model_type->name; ?>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::button(Yii::t('language', 'แก้ไข'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/insertTypeBusiness/id/' . $model_type->id
                        )) . "'")
                    );
                }
                ?>
            </h3>
            <div class="clearfix">
                <?php echo $model_type->about; ?>    
            </div>
        </div>
        <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 15px;margin-top: 5px;">

            <h3><img src="/img/iconform.png"> Partner</h3>

            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $model->getDataType($id),
                'itemView' => '_list',
                'summaryText' => false,
            ));
            ?>
        </div>
    </div>
</div>