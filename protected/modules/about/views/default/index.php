<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/about.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li>
                <?php
                echo CHtml::link(Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                array('/about/default/index/view/1')
                        )
                );
                ?>
            </li>
            <li>
                <?php
                echo CHtml::link(
                        Yii::t('language', 'ติดต่อเรา'), CHtml::normalizeUrl(
                                array('/about/default/index/view/2')
                        )
                );
                ?>
            </li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                ?>
                <li>
                    <?php
                    echo CHtml::link(
                            Yii::t('language', 'แก้ไขข้อความ') . "<br/>" . Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                    array('/about/default/editAbout')
                            )
                    );
                    ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">

        <img src="<?php echo Yii::t('language', '/img/banner/about.png'); ?>" class="pagebanner" alt="pagebanner"/>

        <?php
        if ($view == '2') {
            $this->renderPartial('_view2', array('model' => $model));
        } else {
            $this->renderPartial('_view1', array('model' => $model)); // เริ่มต้นที่หน้านี้
        }
        ?>
    </div>
</div>
<!-- end <div class="content">-->

<script>
//    $(document).ready(function() {
//        if (location.hash == "#view2") {
//            $('#map_correct').show();
//            $('#map_fix').hide();
//        }
//    });
</script>