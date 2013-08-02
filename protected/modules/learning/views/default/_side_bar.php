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

        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'กลุ่มการเรียนรู้') . ": ";
                ?>
            </p>
            <?php
            $model_learning_group = LearningGroup::model()->findByPk($id);
            $name_group = LanguageHelper::changeDB($model_learning_group->name, $model_learning_group->name_en);
            echo $name_group;
            ?>
        </div>
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            if (!empty($model)) {
                foreach ($model as $data) {
                    $subject = LanguageHelper::changeDB($data['subject'], $data['subject_en']);
                    echo "<li>" . CHtml::link($subject, array('/learning/default/lesson/', 'id' => $data['id'])) . "</li>";
                }
            }
            ?>
        </ul>
    </div>
</div>