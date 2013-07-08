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
        echo CHtml::button(Yii::t('language', 'จัดการลิงค์'), array(
            'onclick' => 'window.location="/link/default/managelink"'
        ));
    }
    ?>
</div>
<ul class="linklist">
    <?php
    $list = Yii::app()->db->createCommand('select * from link_web')->queryAll();
    foreach ($list as $link) {
        ?>

        <li>
            <ul class="innerlogo">
                <li><a href="<?php echo $link['link']; ?>" target="_blank"><img src="<?php echo $link['img_path']; ?>"></a> </li>

                <li><a href="<?php echo $link['link']; ?>" target="_blank"><?php echo $link['name']; ?></a></li>
            </ul>
        </li>

    <?php } ?>
</ul>

