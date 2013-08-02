<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead">
                <img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/>
            </li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/knowledge/default/index" ><?php echo Yii::t('language', 'บทความ'); ?></a></li>
            <li><a href="/learning/default/home" ><?php echo Yii::t('language', 'การเรียนรู้'); ?></a></li>
            <?php
//            $list = array(
//                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index', 'select' => ''),
//                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '/learning/default/home', 'select' => ''),
//            );
            $list2 = array(
                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '#', 'select' => 'selected'),
            );
//            echo Tool::GenList($list);
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'บทความ'), array('/knowledge/manage/knowledge'));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'การเรียนรู้'), array('/learning/manage/learning'));
                echo "</li>";
            }
            echo Tool::GenList($list2);
            ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class='icon-lightbulb'></i>
                <?php echo Yii::t('language', 'บทความทั้งหมด') ?>
            </span>
        </h3>
        <?php
        $this->renderPartial('_search', array(
            'month_start' => date("n"),
            'month_end' => date("n"),
            'year_start' => LanguageHelper::changeDB(date("Y") + 543, date("Y")),
            'year_end' => LanguageHelper::changeDB(date("Y") + 543, date("Y")),
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
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/knowledge/default/index',
                )) . "'",
            ));
            ?>
            <hr>
        </div>
    </div>

</div>








