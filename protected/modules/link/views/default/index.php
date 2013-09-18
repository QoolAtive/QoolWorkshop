<style type="text/css">

  
.btngold{
        background: none repeat scroll 0 0 #E2B018 !important;
    border: 1px solid #FFF !important;
    color: #333 !important;
    cursor: pointer;
    font-size: 13px;
    padding: 3px 37px;
    transition: background 1s ease-out 0s;
}

  
.listpartner {
    background-color: #7E1FAD;
    /*background: none repeat scroll 0 0 rgba(210, 17, 224, 0.8);*/
    border: 1px solid #aaa;
    border-radius: 3px 3px 3px 3px;
    float: left;
    margin: 5px;
    text-align: center;
    width: 227px;
    box-shadow: 1px 2px 1px 1px #ddd;
     margin: 8px;
     border-radius: 20px 20px 20px 20px;

}

.listpartner li:first-child{
    line-height: 120px;
    vertical-align: middle;
    border-radius: 17px 17px  0px 0px;
}
.listpartner > li:last-child{
        background: transparent;
        color: #fff;
        width: 100%;
        height: 60px;
       
}
.listpartner li:first-child img {
   
    padding: 10px 0;
  
}
</style>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/link.png'); ?>"/></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <img class="pagebanner clearfix" alt="pagebanner" src="<?php echo Yii::t('language', '/img/banner/link.png'); ?>"/>
        </div>
    </div>
</div>

<div style="clear: both;"></div>

<div class="linksearch" style="background: url('/img/searchbg.png') no-repeat scroll 0 0 transparent; ">
    <div class="_100" style=" margin-top: 10px;">        
        <h3 style="color:#fff;"><i class="icon-search"></i><?php echo Yii::t('language', 'ค้นหา'); ?></h3>
    </div>
    <div class="_50">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'search-form',
        ));
        echo CHtml::textField('name', '', array('placeholder' => Yii::t('language', 'ค้นหาตามชื่อลิงก์')));
        ?>
    </div>
    <div class="_50">

        <?php
//    echo "<br />feild_name: " . $feild_name . "<br />";
// Change Language TH/EN Select Data for show in Drop Down List
        $feild_name = LanguageHelper::changeDB('name_th', 'name_en');
        echo CHtml::DropDownList(
                'group_id', $group, array('0' => " - " . Yii::t('language', 'ค้นหาตามกลุ่มลิงก์') . " - ") + CHtml::listData(LinkGroup::model()->findAll(), "id", $feild_name)
        );
        ?>
    </div>

    <div class="_100 textcenter">
        <?php
        echo CHtml::submitButton(Yii::t('language', 'ค้นหา') ,array('class' => 'btngold'));
        $this->endWidget();
        ?>

        <?php
        if (Yii::app()->user->isAdmin()) {
            echo CHtml::button(Yii::t('language', 'จัดการลิงก์'), array(
                'onclick' => 'window.location="/link/default/managelink"'
            ));
        }
        ?>
    </div>

</div>


<div class="items">
    <?php
    if (empty($list)) {
        echo Yii::t('language', "ไม่พบลิงก์ที่เกี่ยวข้อง");
    } else {
        foreach ($list as $l) {
            $name = LanguageHelper::changeDB($l['name_th'], $l['name_en']);
            ?>
 
<ul class="listpartner">
<li>        <a href="<?php echo $l['link']; ?>" target="_blank"><img src="http://dbdmart.com/<?php echo $l['img_path']; ?>"></a></li>
        <li>
        <a target="_blank" href="http://www.ipthailand.go.th/" style="color:#fff;"><?php echo $name; ?></a></li>
        
   
</ul>
            <?php
        }
    }
    ?>
 
</div>
