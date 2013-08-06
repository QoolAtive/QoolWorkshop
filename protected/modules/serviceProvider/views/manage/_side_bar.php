<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/serviceprovider.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/serviceProvider/default/index" rel="view1"><?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?></a></li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<li class='selected'>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'ผู้ให้บริการ'), array(
                    '/serviceProvider/manage/typeBusiness'), array('rel' => 'view2'));
                echo "</li>";
            }
            ?>

        </ul>
        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'จัดการ') . Yii::t('language', 'ผู้ให้บริการ');
                ?>
            </p>
        </div>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'กลุ่มพาร์ทเนอร์'), array(
                    '/serviceProvider/manage/typeBusiness'), array(
                    'rel' => 'view3',
                    'class' => $select1 == 'selected' ? 'menuactive listactive' : ''
                ));
                echo "</li>";

                echo "<li>";
                echo CHtml::link(Yii::t('language', 'พาร์ทเนอร์'), array(
                    '/serviceProvider/manage/company'), array(
                    'rel' => 'view4',
                    'class' => $select2 == 'selected' ? 'menuactive listactive' : ''
                ));
                echo "</li>";

                if ($select3 != null) {
                    echo "<li>";
                    echo CHtml::link(Yii::t('language', 'เพิ่มสินค้าและบริการ'), array(
                        '#'), array(
                        'rel' => 'view5',
                        'class' => $select3 == 'selected' ? 'menuactive listactive' : ''
                    ));
                    echo "</li>";
                }
            }
            ?>
        </ul>
    </div>
</div>