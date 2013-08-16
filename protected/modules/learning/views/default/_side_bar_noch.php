<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
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
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'บทความ'), array('/knowledge/manage/knowledge'));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'การเรียนรู้'), array('/learning/manage/learningGroup'));
                echo "</li>";
            }
            echo Tool::GenList($list);
            ?>
        </ul>
    </div>
</div>