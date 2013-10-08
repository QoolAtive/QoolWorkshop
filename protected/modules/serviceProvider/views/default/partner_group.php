<?php
$this->renderPartial('_side_bar', array(
    'id' => $model->id,
));
$name = LanguageHelper::changeDB($model->name, $model->name_en);
$about = LanguageHelper::changeDB($model->about, $model->about_en);

if ($model_sub != null) {
    $name_sub = LanguageHelper::changeDB($model_sub->name_th, $model_sub->name_en);
    $about_sub = LanguageHelper::changeDB($model_sub->about_th, $model_sub->about_en);
}
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
        <div class="clearfix" style="padding: 5px 15px;">
            <h3>
                <img src="/img/iconform.png"> <?php echo $name; ?>
            </h3>
            <!--<div class="knowledgeview">-->
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo CHtml::button(
                        Yii::t('language', 'แก้ไข'), array(
                    'class' => "grey", // btnedit grey
                    'style' => 'margin-left: 656px; margin-top:11px; position:absolute;',
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/serviceProvider/manage/insertTypeBusiness/id/' . $model->id
                    )) . "'")
                );
            }
            ?>
             <ul class="expander">
        </ul>
            <div class="clearfix showmorecontent" style="   border: 1px solid #E1E1E1;
    border-radius: 15px 15px 15px 15px;
    padding: 15px;">
                <?php echo $about; ?>    
            </div>
            <!--</div>-->
        </div>
        <?php
        if ($model_sub != null) {
            ?>
            <div class="clearfix" style="padding: 5px 15px;">
                <h3>
                    <img src="/img/iconform.png"> <?php echo $name_sub; ?>
                </h3>
                <!--<div class="knowledgeview">-->
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::button(
                            Yii::t('language', 'แก้ไข'), array(
                        'class' => "grey", // btnedit grey
                        'style' => 'margin-left: 656px; margin-top: 11px; position:absolute;',
                        'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/serviceProvider/manage/typeBusinessSubInsert/sp_type_business_sub_id/' . $model_sub->sp_type_business_sub_id
                        )) . "'")
                    );
                }
                ?>
                <div class="clearfix">
                    <?php echo $about_sub; ?>    
                </div>
                <!--</div>-->
            </div>
            <?php
        }
        ?>
        <div class="clearfix" style="padding: 15px;margin-top: 5px;">
            <h3><img src="/img/iconform.png"> <?php echo Yii::t('language', 'ผู้ให้บริการ'); ?></h3>
            <?php
            $criteria = new CDbCriteria;
            $criteria->order = 'id desc';
            $criteria->select = "t.*, stc.type_id as type_id";
            if ($model_sub == null) {
                $criteria->condition = "stc.type_id = '" . $model->id . "'";
            } else {
                $criteria->condition = "stc.type_id = {$model->id} and stc.sp_type_business_sub_id = {$model_sub->sp_type_business_sub_id}";
            }
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
