<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index'),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '/learning/default/index'),
            );
            $n = 1;
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link']) . "</li>";
            }
// echo Tool::GenList($list);
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'), array('/knowledge/manage/knowledge'));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'การเรียนรู้'), array('/learning/manage/learning'));
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div class="_100">
            <h3><?php echo Yii::t('language', 'บทความทั้งหมด') ?></h3>
        </div>
        <?php
        $this->renderPartial('_search', array(
            'month_start' => date("n"),
            'month_end' => date("n"),
            'year_start' => date("Y") + 543,
            'year_end' => date("Y") + 543,
        ));
        ?>
        <hr>
        <div id='show_detail'>
            <?php
            $this->renderPartial('_grid_all_knowledge', array(
                'model' => $model,
                'dataProvider' => $model->getData(),
            ));
            ?>
        </div>
        <div class="textcenter">
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/knowledge/default/index',
                )) . "'",
            ));
            ?>
        </div>
    </div>

</div>








