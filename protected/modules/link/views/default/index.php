git
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

<div class="linksearch">
    <div class="_100">        
        <h3><i class="icon-search"></i><?php echo Yii::t('language', 'ค้นหา'); ?> : </h3>
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
        echo CHtml::submitButton(Yii::t('language', 'ค้นหา'));
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
<ul class="linklist">
    <?php
    if (empty($list)) {
        echo Yii::t('language', "ไม่พบลิงก์ที่เกี่ยวข้อง");
    } else {
        foreach ($list as $l) {
            $name = LanguageHelper::changeDB($l['name_th'], $l['name_en']);
            ?>
            <li>
                <ul class="innerlogo">
                    <li><a href="<?php echo $l['link']; ?>" target="_blank"><img src="<?php echo $l['img_path']; ?>"></a> </li>

                    <li><a href="<?php echo $l['link']; ?>" target="_blank"><?php echo $name; ?></a></li>
                </ul>
            </li>
            <?php
        }
    }
    ?>
</ul>

