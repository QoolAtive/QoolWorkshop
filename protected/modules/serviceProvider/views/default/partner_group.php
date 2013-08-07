<?php
$this->renderPartial('_side_bar', array(
    'id' => $model->id,
));
?>
<div class="content">
    <div class="tabcontents">
        <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 15px;">
            <h3>
                <img src="/img/iconform.png"> <?php echo $model->name; ?>
            </h3>
            <!--<div class="knowledgeview">-->
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::button(
                            Yii::t('language', 'แก้ไข'), array(
                        'class' => "grey", // btnedit grey
                        'style' => 'margin-left: 650px; margin-top: 8px; position:absolute;',
                        'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/insertTypeBusiness/id/' . $model->id
                        )) . "'")
                    );
                }
                ?>

                <div class="clearfix">
                    <?php echo $model->about; ?>    
                </div>
            <!--</div>-->
        </div>
        <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 15px;margin-top: 5px;">
            <h3><img src="/img/iconform.png"> Partner</h3>
            <?php
            $criteria = new CDbCriteria;
            $criteria->order = 'id desc';
            $criteria->select = "t.*, stc.type_id as type_id";
            $criteria->condition = "stc.type_id = '" . $model->id . "'";
            $criteria->join = "
            left join sp_type_com stc on t.id = stc.com_id
            ";

            $partner = new CActiveDataProvider('SpCompany', array(
                'criteria' => $criteria,
            ));
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $partner,
                'itemView' => '_list',
                'summaryText' => false,
            ));
            ?>
        </div>
    </div>
</div>
