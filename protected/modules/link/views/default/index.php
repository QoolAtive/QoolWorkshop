<?php
$currentLang = Yii::app()->language;
echo "<br />currentLang: " . $currentLang . "<br />";
?>

<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/<?php echo Yii::t('language', 'link.png'); ?>"/></li>
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
<div>
    <?php
    if (Yii::app()->user->isAdmin()) {
        echo CHtml::button(Yii::t('language', 'จัดการลิงก์'), array(
            'onclick' => 'window.location="/link/default/managelink"'
        ));
    }
    ?>
</div>
<div>
    <h3><?php echo Yii::t('language', 'ค้นหา'); ?> : </h3>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
    ));
    echo CHtml::textField('name', '', array('placeholder' => Yii::t('language', 'ค้นหาตามชื่อลิงก์')));

    $feild_name = "name_th";
    if ($currentLang == 'en') {
        if ($l['name_en'] != '') {
            $feild_name = "name_en";
        }
    }

    echo CHtml::DropDownList(
            'group_id', $group, array('0' => Yii::t('language', 'ค้นหาตามกลุ่มลิงก์')) + CHtml::listData(LinkGroup::model()->findAll(), "id", $feild_name)
    );
    echo CHtml::submitButton(Yii::t('language', 'ค้นหา'));
    $this->endWidget();
    ?>
</div>
<ul class="linklist">
    <?php
    if (empty($list)) {
        echo Yii::t('language', "ไม่พบลิงก์ที่เกี่ยวข้อง");
    } else {
        foreach ($list as $l) {
            $name = $l['name_th'];
            if ($currentLang == 'en') {
                if ($l['name_en'] != '') {
                    $name = $l['name_en'];
                }
            }
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

