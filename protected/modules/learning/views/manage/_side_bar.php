<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
//            $list = array(
//                array('text' => Yii::t('language', 'กลุ่มการเรียนรู้'), 'link' => '/learning/manage/learningGroup', 'select' => $select1),
//                array('text' => Yii::t('language', 'บทเรียน'), 'link' => '/learning/manage/learning', 'select' => $select2),
//            );


            $list2 = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index'),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '/learning/default/home'),
            );
            $n2 = 3;
            foreach ($list2 as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n2++)) . "</li>";
            }
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br/>' . Yii::t('language', 'บทความ'), array('/knowledge/manage/knowledge'), array('rel' => 'view5'));
                echo "</li>";
                echo "<li class='selected'>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br/>' . Yii::t('language', 'การเรียนรู้'), array('/learning/manage/learning'), array('rel' => 'view6'));
                echo "</li>";
            }
//            echo Tool::GenList($list);
            ?>
        </ul>
        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'จัดการ') . Yii::t('language', 'การเรียนรู้');
                ?>
            </p>
        </div>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            //menuactive listactive
            switch ($select_list) {
                case 1:
                    $list_1 = 'menuactive listactive';
                    $list_2 = '';
                    break;
                case 2:
                    $list_1 = '';
                    $list_2 = 'menuactive listactive';

                    break;
                default:
                    $list_1 = '';
                    $list_2 = '';
                    break;
            }
            echo "<li>" . CHtml::link(Yii::t('language', 'กลุ่มการเรียนรู้'), array('/learning/manage/learningGroup'), array('class' => $list_1)) . "</li>";
            echo "<li>" . CHtml::link(Yii::t('language', 'บทเรียน'), array('/learning/manage/learning'), array('class' => $list_2)) . "</li>";
            ?>
        </ul>
    </div>
</div>