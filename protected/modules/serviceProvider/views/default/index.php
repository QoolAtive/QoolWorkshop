<?php
$this->renderPartial('_side_bar', array(
    'id' => $id,
));
?>
<div class="content">
    <div class="tabcontents">
        <div id="view2" class="tabcontent">
            <div>
                <h3 class="barH3">
                    <span>
                        <i class="icon-compass"></i> 
                        <a href="<?php echo CHtml::normalizeUrl(array("/serviceProvider/default/index")); ?>">
                            <?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?>
                        </a>
                    </span>
                </h3>
                <hr>
                <div class="linksearch">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-form',
                    ));
                    ?>
                    <div class="_100">
                        <h3><i class="icon-search"></i><?php echo Yii::t('language', 'ค้นหา'); ?> : </h3>
                    </div>
                    <div class="_50">
                        <?php
                        echo CHtml::textField('name', $name, array('placeholder' => Yii::t('language', 'ค้นหาตามชื่อบริษัท')));
                        ?>
                    </div>
                    <div class="_50">

                        <?php
//    echo "<br />feild_name: " . $feild_name . "<br />";
// Change Language TH/EN Select Data for show in Drop Down List
                        $feild_name = LanguageHelper::changeDB('name', 'name_en');
                        echo CHtml::DropDownList(
                                'type_id', $type_id, array('0' => " - " . Yii::t('language', 'ค้นหาตามประเภทผู้ให้บริการ') . " - ") + CHtml::listData(
                                        SpTypeBusiness::model()->findAll(), "id", $feild_name)
                        );
                        ?>
                    </div>
                    <div class="_100 textcenter">
                        <?php
                        echo CHtml::submitButton(Yii::t('language', 'ค้นหา'));
                        ?>

                    </div>
                    <?php
                    $this->endWidget();
                    ?>
                </div>
                <hr>

                <div class="lastshop">
                    <h3><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'ล่าสุด'); ?></h3>
                    <?php
//        $criteria = new CDbCriteria;
//        $criteria->order = 'id asc';
//        $partner_group = new CActiveDataProvider('SpTypeBusiness', array(
//            'criteria' => $criteria,
//        ));
//
//        $this->widget('zii.widgets.CListView', array(
//            'dataProvider' => $partner_group,
//            'itemView' => '_list_partner_group',
//            'summaryText' => false,
//        ));


                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $model,
                        'itemView' => '_list_all',
                        'summaryText' => false,
                        'template' => "{items}\n{pager}",
                    ));
                    ?>
                </div>
                <div id="hot_shop">
                    <h3><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'ยอดนิยม'); ?></h3>
                    <?php
                    $dataHotshop = new CActiveDataProvider('SpCompany', array(
                        'criteria' => array(
                            'join' => 'left join sp_count_comany_view sccv on t.id = sccv.sp_company_id',
                            'order' => 'sccv.count_company_view desc, t.id desc',
                            'limit' => 4
                        ),
                        'pagination' => array(
                            'pageSize' => 4,
                        ),
                    ));
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dataHotshop,
                        'itemView' => '_list_all',
                        'summaryText' => false,
                        'template' => "{items}\n{pager}",
                    ));
                    ?>
                </div>
                
            </div>
        </div>
    </div>
</div>    