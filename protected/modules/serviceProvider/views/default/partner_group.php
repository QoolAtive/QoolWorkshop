<?php
$this->renderPartial('_side_bar', array(
    'id' => $model->id,
));
$name = LanguageHelper::changeDB($model->name, $model->name_en);
$about = LanguageHelper::changeDB($model->about, $model->about_en);
?>
<div class="content">
    <div class="tabcontents">        
        <h3 class="barH3">
            <span>
                <i class="icon-compass"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/default/index")); ?>">
                    <?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $name; ?>
            </span>
        </h3>
        <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 5px 15px;">
            <!--            <h3>
                            <img src="/img/iconform.png"> <?php echo $model->name; ?>
                        </h3>-->
            <!--<div class="knowledgeview">-->
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo CHtml::button(
                        Yii::t('language', 'แก้ไข'), array(
                    'class' => "grey", // btnedit grey
                    'style' => 'margin-left: 656px; margin-top: 0px; position:absolute;',
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/serviceProvider/manage/insertTypeBusiness/id/' . $model->id
                    )) . "'")
                );
            }
            ?>
            <div class="clearfix">
                <?php echo $about; ?>    
            </div>
            <!--</div>-->
        </div>
        <div class="clearfix" style="border: 1px #c9c9c9 solid;padding: 15px;margin-top: 5px;">
            <h3><img src="/img/iconform.png"> <?php echo Yii::t('language', 'พาร์ทเนอร์'); ?></h3>
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
