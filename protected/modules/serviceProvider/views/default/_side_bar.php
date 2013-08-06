<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/serviceprovider.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/serviceProvider/default/index" rel="view1"><?php echo Yii::t('language', 'ผู้ให้บริการทั้งหมด'); ?></a></li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'ผู้ให้บริการ'), array(
                    '/serviceProvider/manage/typeBusiness'), array('rel' => 'view2'));
                echo "</li>";
            }
//            $menu = SpTypeBusiness::model()->findAll();
//            $select = '';
//            $n = 3;
//            foreach ($menu as $m) {
//                if ($id == $m['id']) {
//                    $select = 'selected';
//                }
//                $name = LanguageHelper::changeDB($m['name'], $m['name_en']);
//                echo "<li class='" . $select . "' >";
//                echo CHtml::link($name, array(
//                    '/serviceProvider/default/partnerGroup/', 'id' => $m['id']), array(
//                    'rel' => 'view' . $n++));
//                echo "</li>";
//            }
//            
            ?>
        </ul>
        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'ประเภทผู้ให้บริการ');
                ?>
            </p>
        </div>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            $list_sub = '';
            $active = false;
            $menu = SpTypeBusiness::model()->findAll();
            foreach ($menu as $m) {
                $select = '';
                if ($id == $m['id']) {
                    $active = true;
                    $select = 'menuactive listactive';
                }
                $name = LanguageHelper::changeDB($m['name'], $m['name_en']);
                $list_sub .= "<li>";
                $list_sub .= CHtml::link($name, array(
                            '/serviceProvider/default/partnerGroup/', 'id' => $m['id']), array(
                            'rel' => 'view' . $n++,
                            'class' => $select
                ));
                $list_sub .= "</li>";
            }

            
            echo "<li>";
            echo CHtml::link(Yii::t('language', 'ผู้ให้บริการทั้งหมด'), array(
                '/serviceProvider/default/index'), array(
                'rel' => 'view1',
                'class' => $active==false? 'menuactive listactive':''
            ));
            echo "</li>";
            echo $list_sub;
            ?>
        </ul>
    </div>
</div>