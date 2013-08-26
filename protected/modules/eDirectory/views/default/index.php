<?php
$this->renderPartial('side_bar', array(
    'id' => $id,
));
?>
<script type="text/javascript">
    $(function() {
        $("ul#navi_containTab > li").click(function(event) {
            var menuIndex = $(this).index();
            $("ul#detail_containTab > li:visible").hide();
            $("ul#detail_containTab > li").eq(menuIndex).show();
        });
    });
</script>  

<style type="text/css">
    .detailContent1 input ,.detailContent2 input{
        padding: 22px 0;
    }

    .tabNavi1:hover{
        opacity: 0.95;
    }

    .tabNavi2:hover{
        opacity: 0.95;
    }
    div#i_containTab{
        position:relative;
        display:block;
        width:500px; /* กำหนดความกว้างทั้งหมด   */
        border:1px solid #CCC;
    }
    ul#navi_containTab{
        list-style:none;
        padding:0;
        margin:0;   
        width:100%;
        background-color:#FCF;
    }
    ul#navi_containTab li{
        display:block;
        float:left;
        height:32px;    
        border:0px solid #CCC;
        cursor:pointer;
        text-align:center;
    }


    ul#detail_containTab{
        list-style:none;
        padding:0;
        margin:0;   
        width:100%; 
    }
    ul#detail_containTab li{
        float:left;
        width:100%;
        margin-top: 11px;
    }
    /* class รูปแบบของแต่ละเนื้อหา */
    .detailContent1{
        display:block;
    }
    .detailContent2{
        display:none;
    }

</style>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-home"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'ร้านค้าทั้งหมด'), array('/eDirectory/default/index'));
                if ($id != '') {
                    $model_type = CompanyTypeBusiness::model()->findByPk($id);
                    $name_type = LanguageHelper::changeDB($model_type->name, $model_type->name_en);
                    ?>
                    <i class="icon-chevron-right"></i>
                    <?php
                    echo $name_type;
                }// end if($id!=''){
                ?>
            </span>
        </h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'index-form',
                )
        );
        $delimiter = ', ';
        $text_search_01 = Yii::t('language', 'ชื่อสินค้า') . $delimiter . Yii::t('language', 'บริการ') . $delimiter . Yii::t('language', 'ชื่อร้านค้า') . $delimiter . Yii::t('language', 'หน่วยงาน') . $delimiter . Yii::t('language', 'ชื่อบริษัท');
        $text_search_02 = Yii::t('language', 'จังหวัด') . $delimiter . Yii::t('language', 'ถนน') . $delimiter . Yii::t('language', 'รหัสไปรษณีย์');
        ?>
        <ul class="edirsearchbox">
            <li style="float: left; width: 75%;">


                <ul id="navi_containTab">
                    <li class="tabNavi1" style="background: url('/img/tabedirbg.png');background-size:100% 32px;"><?php echo Yii::t('language', 'ค้นหาตามชื่อ'); ?></li>
                    <li class="tabNavi2"style="background: url('/img/tabedirbg.png');background-size:100% 32px;"><?php echo Yii::t('language', 'ค้นหาตามที่อยู่'); ?></li>
                </ul>

                <ul id="detail_containTab">
                    <li class="detailContent1">
                        <input placeholder="<?php echo $text_search_01; ?>" type="text" id="name" name="name" value="" /> 
                    </li>

                    <li class="detailContent2">
                        <input  placeholder="<?php echo $text_search_02; ?>"  type="text" id="address" name="address" value="" />
                    </li>
                </ul>
            </li>
            <li style="float: right; width:25%;" class="edirsearchbtn">
                <?php
                echo CHtml::ajaxSubmitButton(Yii::t('language', 'ค้นหา'), CHtml::normalizeUrl(array(
                            '/eDirectory/default/search/id/' . $id)
                        ), array(
                    'update' => 'div#show_detail'
                        ), array(
                    'style' => "background: url('/img/searchbtn.png') no-repeat scroll 0 0 transparent;
                                color: #0000FF;
                                display: inline-block;
                                font-size: 1em;
                                height: 106px;
                                line-height: 106px;
                                margin-left: 16%;
                                text-align: center;
                                width: 75%;
                                background-size:100% 100%;
                                ",
                ));
                ?>
            </li>
        </ul>
        <?php
        $this->endWidget();
        ?>

        <div id="show_detail">
            <h3><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'ร้านค้าล่าสุด'); ?></h3>
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
        <div id="hot_shop">
            <h3><img src="/img/icontopic.png" /> <?php echo Yii::t('language', 'ร้านค้ายอดนิยม'); ?></h3>
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

    </div>
</div>