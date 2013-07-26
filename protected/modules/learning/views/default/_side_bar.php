<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list2 = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index'),
                array('text' => Yii::t('language', 'บทเรียน'), 'link' => '/learning/default/home'),
            );
            $n2 = 3;
            foreach ($list2 as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n2++)) . "</li>";
            }
            ?>
            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link(Yii::t('language', 'จัดการบทความ'), array('/knowledge/manage/knowledge'));
                }
                ?>
            </li>
            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link(Yii::t('language', 'จัดการการเรียนรู้'), array('/learning/manage/learningGroup'));
                }
                ?>
            </li>
            <?php
            echo Tool::GenList($list);
            ?>
        </ul>

        <p class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
           border-top: 2px solid gold;
           font-size: 16px;
           margin-top: 6px;
           padding: 14px 0;">กลุ่มบทเรียน : <?php echo LearningGroup::model()->findByPk($id)->name; ?></p>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            if (!empty($model)) {
                foreach ($model as $data) {
                    echo "<li>" . CHtml::link($data['subject'], array('/learning/default/lesson/', 'id' => $data['id'])) . "</li>";
                }
            }
            ?>
        </ul>
    </div>
</div>