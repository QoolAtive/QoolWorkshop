<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/createaccount.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'กลุ่มบทเรียน'), 'link' => '/learning/manage/learningGroup', 'select' => $select1),
                array('text' => Yii::t('language', 'บทเรียน'), 'link' => '/learning/manage/learning', 'select' => $select2),
            );
            echo Tool::GenList($list);
            ?>
        </ul>
    </div>
</div>