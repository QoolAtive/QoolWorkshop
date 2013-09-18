<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- <link rel="stylesheet" href="/resources/demos/style.css" /> -->
<?php
$data_auto = null;
foreach (SpAuto::model()->getArray() as $d) {
    if ($data_auto == null) {
        $data_auto .= '"' . $d . '"';
    } else {
        $data_auto .= ', ' . '"' . $d . '"';
    }
}
?>

<script>
    $(function() {
        var availableTags = [<?php echo $data_auto; ?>];
        $("#tags").autocomplete({
            source: availableTags
        });
    });
</script>
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
//                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//                            'id' => 'name_auto',
//                            'name' => 'name',
//                            'source' => SpAuto::model()->getArray(),
//                            // additional javascript options for the autocomplete plugin
//                            'options' => array(
//                                'minLength' => '2',
//                                'for' => '#name_auto'
//                            ),
//                            'htmlOptions' => array(
//                                'style' => 'height:20px;',
//                                'placeholder' => Yii::t('language', 'ค้นหาตามชื่อบริษัท'),
//                            ),
//                        ));
                        echo CHtml::textField('name', $name, array('id' => 'tags', 'placeholder' => Yii::t('language', 'ค้นหาตามชื่อบริษัท')));
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
                        echo CHtml::ajaxSubmitButton(Yii::t('language', 'ค้นหา'), CHtml::normalizeUrl(array(
                                    '/serviceProvider/default/search')
                                ), array(
                            'update' => 'div#show_detail'
                                )
                        );
                        ?>

                    </div>
                    <?php
                    $this->endWidget();
                    ?>
                </div>
                <hr>
                <div id="show_detail">
                    <div id="hot_shop">
                        <h3><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'ยอดนิยม'); ?></h3>
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider' => $dataHotshop,
                            'itemView' => '_list_all',
                            'summaryText' => false,
                            'template' => "{items}\n{pager}",
                        ));
                        ?>
                    </div>

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
                </div>

            </div>
        </div>
    </div>
</div>    