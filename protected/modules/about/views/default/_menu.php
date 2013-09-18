<?php
switch ($select) {
    case 2:
        $select1 = '';
        $select2 = 'selected';
        $select3 = '';
        $select4 = '';
        $select5 = '';
        break;
    case 3:
        $select1 = '';
        $select2 = '';
        $select3 = 'selected';
        $select4 = '';
        $select5 = '';
        break;
    case 4:
        $select1 = '';
        $select2 = '';
        $select3 = '';
        $select4 = 'selected';
        $select5 = '';
        break;
    case 5:
        $select1 = '';
        $select2 = '';
        $select3 = '';
        $select4 = '';
        $select5 = 'selected';
        break;
    default:
        $select1 = 'selected';
        $select2 = '';
        $select3 = '';
        $select4 = '';
        $select5 = '';
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
                        Yii::t('language', 'แผนที่เว็บไซต์'), CHtml::normalizeUrl(
                                array('/about/default/siteMap')
                        ), array('rel' => 'view3')
                );
                ?>
            </li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                ?>
                <li class="<?php echo $select4; ?>">
                    <?php
                    echo CHtml::link(
                            Yii::t('language', 'จัดการ') . "<br/>" . Yii::t('language', 'เกี่ยวกับเรา'), CHtml::normalizeUrl(
                                    array('/about/default/editAbout')
                            ), array('rel' => 'view4')
                    );
                    ?>
                </li>

                <li class="<?php echo $select5; ?>">
                    <?php
                    echo CHtml::link(
                            Yii::t('language', 'จัดการ') . "<br/>" . Yii::t('language', 'แผนที่เว็บไซต์'), CHtml::normalizeUrl(
                                    array('/dataCenter/default/siteMap')
                            ), array('rel' => 'view5')
                    );
                    ?>
                </li>
                <?php
            } //end  if (Yii::app()->user->isAdmin()) {
            ?>
        </ul>
    </div>
</div>