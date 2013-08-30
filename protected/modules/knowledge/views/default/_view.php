<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'เนื้อหา'), 'link' => '#', 'select' => 'selected'),
            );

            $list2 = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index'),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '/learning/default/home'),
            );
            $n2 = 3;
            foreach ($list2 as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n2++)) . "</li>";
            }
//            echo Tool::GenList($list);
            if (Yii::app()->user->isAdmin()) {

                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'บทความ'), array(
                    '/knowledge/manage/knowledge'
                        ), array(
                    'rel' => 'view5'
                ));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'การเรียนรู้'), array(
                    '/learning/manage/learning'
                        ), array(
                    'rel' => 'view6'
                ));
                echo "</li>";
            }
//            $n = 1;
//            foreach ($list as $ls) {
//                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
//            }
            echo Tool::GenList($list);
            ?> 
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class='icon-lightbulb'></i>                
                <a href="<?php echo CHtml::normalizeUrl(array("/knowledge/default/knowledge")); ?>">
                    <?php echo Yii::t('language', 'บทความทั้งหมด'); ?>
                </a>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    ?>
                    <i class="icon-chevron-right"></i>
                    <a href="<?php echo CHtml::normalizeUrl(array("/knowledge/manage/knowledge")); ?>">
                        <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'); ?>
                    </a>
                <?php } ?>
                <i class="icon-chevron-right"></i>
                <?php echo trim(Yii::t('language', 'เนื้อหา')); ?>
            </span>
        </h3>
        <div class="knowledgeview ckfix">
            <!-- <div class="btnedit"> -->
            <?php
            if (Yii::app()->user->isAdmin()) {

                echo CHtml::button(
                        Yii::t('language', 'แก้ไข'), array(
                    'class' => "btnedit grey",
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/knowledge/manage/insert/id/' . $view->id
                    )) . "'")
                );
            }
            $subject = LanguageHelper::changeDB($view->subject, $view->subject_en);
            $detail = LanguageHelper::changeDB($view->detail, $view->detail_en);
            ?>  
            <div style="text-align: center;">
                <img src="/file/knowledge/<?php echo $view->image; ?>" style="height: 300px; max-width: 748px;" />
            </div>
            <div class="knowledgeviewtext">
                <h3>
                    <img src="/img/iconform.png" alt="icon"/>
                    <?php
                    echo $subject;
                    ?>
                </h3>
                <p><?php echo $detail; ?></p>

                <div style="text-align: center; margin-top:10px;">
                    <hr>
                    <?php
                    echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            Yii::app()->user->getState('link_back')
                        )) . "'")
                    );
                    ?>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
