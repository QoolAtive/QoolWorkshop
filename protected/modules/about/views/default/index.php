<?php
switch ($view) {
    case 1:
        $select1 = 'selected';
        $select2 = '';
        $select3 = '';
        break;
    case 2:
        $select1 = '';
        $select2 = 'selected';
        $select3 = '';
        break;
    case 3:
        $select1 = '';
        $select2 = '';
        $select3 = 'selected';
        break;
    default:
        $select1 = '';
        $select2 = '';
                $select3 = '';

        break;
}
?>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/about.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li class="<?php echo $select1; ?>">
                <?php
                echo CHtml::link(Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                array('/about/default/index/view/1')
                        ), array('rel' => 'view1')
                );
                ?>
            </li>
            <li class="<?php echo $select2; ?>">
                <?php
                echo CHtml::link(
                        Yii::t('language', 'ติดต่อเรา'), CHtml::normalizeUrl(
                                array('/about/default/index/view/2')
                        ), array('rel' => 'view2')
                );
                ?>
            </li>
            <li class="<?php echo $select3; ?>">
                <?php
                echo CHtml::link(
                        Yii::t('language', 'Sitemap'), CHtml::normalizeUrl(
                                array('/about/default/index/view/3')
                        ), array('rel' => 'view3')
                );
                ?>
            </li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                ?>
                <li>
                    <?php
                    echo CHtml::link(
                            Yii::t('language', 'จัดการ') . "<br/>" . Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                    array('/about/default/editAbout')
                            ), array('rel' => 'view3')
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
            $this->renderPartial('_view2');
        } 
        else if ($view == '3'){
            $this->renderPartial('_view3', array('model' => $model));
        }

        else {

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