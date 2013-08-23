<?php
$this->renderPartial('side_bar', array(
    'id' => $id,
));
?>
<div class="content">
    <div class="tabcontents">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'index-form',
                )
        );
        ?>
        <ul class="row-fluid edirsearchbox">
            <li style="float: left; width: 75%;">
                <!--                <ul id="navi_containTab">
                                    <li class="tabNavi1" style="background: url('/img/tabedirbg.png')"><?php echo Yii::t('language', 'ค้นหา'); ?></li>
                                </ul>-->
                <ul id="detail_containTab" style="">
                    <li class="detailContent1">
                        <input class="span12" style="height:40px; line-height: 40px; !important;" placeholder="ขื่อสินค้า บริการ ชื้อร้านค้า หน่วยงาน บริษัท" type="text" id="name" name="name" value="" /> 
                        <input class="span12" style="height:40px; line-height: 40px; !important;" placeholder="จังหวัด ถนน รหัสไปรษณีย์"  type="text" id="address" name="address" value="" />
                    </li>
                </ul>
            </li>
            <li style="float: left; width:25%;">
                <?php
                echo CHtml::ajaxSubmitButton(Yii::t('language', 'ค้นหา'), CHtml::normalizeUrl(array(
                            '/eDirectory/default/search/id/' . $id)
                        ), array(
                    'update' => 'div#show_detail'
                        ), array(
                    'style' => "color: blue; display: inline-block; background:url('/img/searchbtn.png');text-align: center ; font-size: 20px; line-height: 106px; height: 106px; width: 100%;",
                ));
                ?>
            </li>
        </ul>
        <?php
        $this->endWidget();
        ?>
        <div id="hot_shop">
            <h3><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'ร้านค้ายอดนิยม'); ?></h3>
            <?php
//            $c = new CDbCriteria;
            $dataHotshop = new CActiveDataProvider('Company', array(
                'criteria' => array(
                    'join' => 'left join company_count_view ccv on t.id = ccv.company_id',
                    'order' => 'ccv.count_company_view desc, t.id desc',
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
                'emptyText' => Yii::t('language', 'ไม่มีร้านค้า'),
                'template' => "{items}\n{pager}",
            ));
            ?>
        </div>
        <div id="show_detail">
            <h3><img src="/img/icontopic.png" /><?php echo Yii::t('language', 'ร้านค้าล่าสุด'); ?></h3>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_list_all',
                'summaryText' => false,
                'emptyText' => Yii::t('language', 'ไม่มีร้านค้า'),
                'template' => "{items}\n{pager}",
            ));
            ?>
        </div>
    </div>
</div>