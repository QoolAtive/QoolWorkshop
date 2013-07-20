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
                array('text' => 'Knowledge', 'link' => '/knowledge/default/index'),
                array('text' => 'Learning', 'link' => '/knowledge/default/index#view2'),
            );
            $n2 = 3;
            foreach ($list2 as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n2++)) . "</li>";
            }
//            echo Tool::GenList($list);
            ?> 

            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Knowledge', array('/knowledge/manage/knowledge'), array('rel' => 'view5'));
                }
                ?>
            </li>
            <li> 
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Learning', array('/learning/manage/learning'), array('rel' => 'view6'));
                }
                ?>
            </li>
            <?php
            echo Tool::GenList($list);
            ?>
        </ul>
    </div>
</div>