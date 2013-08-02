<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'กลุ่มการเรียนรู้'), 'link' => '/learning/manage/learningGroup', 'select' => $select1),
                array('text' => Yii::t('language', 'บทเรียน'), 'link' => '/learning/manage/learning', 'select' => $select2),
            );


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
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br/>' . Yii::t('language', 'การเรียนรู้'), array('/learning/manage/learning'), array('rel' => 'view6'));
                echo "</li>";
            }
            echo Tool::GenList($list);
            ?>
        </ul>
    </div>
</div>