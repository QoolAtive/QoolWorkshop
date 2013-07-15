<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/createaccount.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            
            echo Tool::GenList($list);
            ?>
            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Knowledge', array('/knowledge/manage/knowledge'));
                }
                ?>
            </li>
            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Learning', array('/learning/manage/learningGroup'));
                }
                ?>
            </li>
        </ul>
        <p>กลุ่มบทเรียน : <?php echo LearningGroup::model()->findByPk($id)->name; ?></p>
        <ul class="LessonList">
            <?php
            if (!empty($model)) {
                foreach ($model as $data) {
                    echo "<li>" . CHtml::link($data['subject'], array('/learning/default/lesson/', 'id' => $data['id'])) . "</li>";
                }
            }
            ?>
    </div>
</div>