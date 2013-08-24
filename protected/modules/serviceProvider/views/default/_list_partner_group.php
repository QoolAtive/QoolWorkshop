<div class="" style="border: 1px #c9c9c9 solid;padding: 15px; margin-top: -5px;">
    <h3>
        <img src="/img/iconform.png"> <?php echo $data->name; ?>

        <?php
        if (Yii::app()->user->isAdmin()) {
            echo CHtml::button(Yii::t('language', 'แก้ไข'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertTypeBusiness/id/' . $data->id
                )) . "'")
            );
        }
        ?>
    </h3>
    <i class="icon-search"></i>
    <?php
    echo CHtml::link(Yii::t('language', 'ดูทั้งหมด'), array('/serviceProvider/default/partnerGroup/', 'id' => $data->id));
    ?>
</div>
<div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 15px;margin-top: 5px;">

    <h3><img src="/img/iconform.png"> Partner</h3>

    <?php
    $criteria = new CDbCriteria;
    $criteria->order = 'id desc';
    $criteria->select = "t.*, stc.type_id as type_id";
    $criteria->condition = "stc.type_id = '" . $data->id . "'";
    $criteria->join = "
            left join sp_type_com stc on t.id = stc.com_id
            ";

    $partner = new CActiveDataProvider('SpCompany', array(
        'criteria' => $criteria,
        'pagination' => array(
            'pageSize' => 4,
        ),
    ));
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $partner,
        'itemView' => '_list',
        'summaryText' => false,
    ));
    ?>
</div>
<hr>