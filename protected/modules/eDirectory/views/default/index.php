<?php
//$list = array(
//    array('text' => Yii::t('language', 'ข้อมูลทั้งหมด'), 'link' => '/eDirectory/manage/index', 'select' => ''),
//    array('text' => Yii::t('language', 'จัดการสินค้าและบริการ'), 'link' => '/eDirectory/manage/product', 'select' => ''),
//    array('text' => Yii::t('language', 'เพิ่มข้อมูลสินค้าและบริการ'), 'link' => '#', 'select' => 'selected'),
//);

$this->renderPartial('side_bar', array(
//    'list' => $list,
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
        <ul class="row-fluid " style="height: 203px; background-image: url('/img/searchbg.png');">
            <li style="padding: 20px 20px ; float: left; width: 75%;">
                <ul id="navi_containTab">
                    <li class="tabNavi1" style="background: url('/img/tabedirbg.png')">ค้นหา</li>
                    <!--                         <li class="tabNavi2"> ค้นหาจากเบอร์โทร </li>
                                            <li class="tabNavi3"> ค้นหาจากชื่อบุคคล </li> -->

                </ul>
                <ul id="detail_containTab" style="padding-top: 10px;margin-top: 10px;">
                    <li class="detailContent1">
                        <input class="span12" style="height:48px; line-height: 48px; !important;" placeholder="ขื่อสินค้า บริการ ชื้อร้านค้า หน่วยงาน บริษัท" type="text" id="name" name="name" value="" /> 
                        <input class="span12" style="height:48px; line-height: 48px; !important;" placeholder="จังหวัด ถนน รหัสไปรษณีย์"  type="text" id="address" name="address" value="" />
                    </li>
                </ul>
            </li>
            <li style="float: left; padding: 65px 0px ;">
                <!--                <a href="" style="display: inline-block; background:url('/img/searchbtn.png');text-align: center ; font-size: 20px; line-height: 106px; height: 106px; width: 136px;">Search</a>-->
                <?php
                echo CHtml::ajaxSubmitButton(Yii::t('language', 'ค้นหา'), CHtml::normalizeUrl(array(
                            '/eDirectory/default/search')
                        ), array(
                    'update' => 'div#show_detail'
                        ), array(
                    'style' => "color: blue; display: inline-block; background:url('/img/searchbtn.png');text-align: center ; font-size: 20px; line-height: 106px; height: 106px; width: 136px;",
                ));
                ?>
            </li>
        </ul>
        <?php
        $this->endWidget();
        ?>

        <div id="show_detail">
            <h2 class="clearfix">Result</h2><hr>
        </div>
    </div>
</div>