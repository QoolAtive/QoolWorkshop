<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
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