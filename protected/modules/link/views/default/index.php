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
            <img class="bannerlink clearfix" src="/img/iconpage/banner/<?php echo Yii::t('language', 'linkbanner.png'); ?>"/>
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
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
            ));
    echo CHtml::textField('name', '', array('placeholder' => 'ค้นหาตามชื่อลิงก์'));

    echo CHtml::DropDownList('group_id', $group, array('0' => 'ค้นหาตามกลุ่มลิงก์') + CHtml::listData(LinkGroup::model()->findAll(), "id", "name_th"));
    echo CHtml::submitButton(Yii::t('language', 'ค้นหา'));
    ?>
    <?php $this->endWidget(); ?>
</div>
<ul class="linklist">
    <?php
    if (empty($list)) {
        echo "ไม่พบลิงก์ที่เกี่ยวข้อง";
    } else {
        foreach ($list as $link) {
            ?>

            <li>
                <ul class="innerlogo">
                    <li><a href="<?php echo $link['link']; ?>" target="_blank"><img src="<?php echo $link['img_path']; ?>"></a> </li>

                    <li><a href="<?php echo $link['link']; ?>" target="_blank"><?php echo $link['name_th']; ?></a></li>
                </ul>
            </li>

        <?php
        }
    }
    ?>
</ul>

