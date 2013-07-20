<div class="menuitem">
    <ul>
        <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
    </ul>
    <ul class="tabs clearfix">
        <?php
        $list = array(
            array('text' => 'เพิ่มบทความ', 'link' => '/knowledge/manage/insert'),
            array('text' => 'บทความทั้งหมด', 'link' => '/knowledge/manage/knowledge'),
        );
        foreach ($list as $ls) {
            echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . ++$n)) . "</li>";
        }
        ?>
    </ul>
</div>
