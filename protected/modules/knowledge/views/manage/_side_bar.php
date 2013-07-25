<div class="menuitem">
    <ul>
        <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
    </ul>
    <ul class="tabs clearfix">
        <?php
        $list = array(
            array('text' => Yii::t('language', 'เพิ่ม'). Yii::t('language' ,' บทความ'), 'link' => '/knowledge/manage/insert'),
            array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledge'),
        );
        foreach ($list as $ls) {
            echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . ++$n)) . "</li>";
        }
        ?>
    </ul>
</div>
