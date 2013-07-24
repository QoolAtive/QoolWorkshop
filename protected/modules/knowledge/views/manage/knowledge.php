<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">

            <?php
            $list = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index'),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '/knowledge/default/index#view2'),
            );
            $n = 3;
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
            }
//            echo Tool::GenList($list);
            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . " " . Yii::t('language', 'บทความ'), array(
                    '/knowledge/manage/knowledge'), array(
                    'rel' => 'view5'
                ));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . " " . Yii::t('language', 'การเรียนรู้'), array(
                    '/learning/manage/learning'), array(
                    'rel' => 'view6'
                ));
                echo "</li>";
            }
            ?> 

            <li><a href="#" rel="view1"><?php echo Yii::t('language', 'บทความแนะนำ'); ?></a></li>
            <li><a href="#" rel="view2"><?php echo Yii::t('language', 'บทความทั้งหมด'); ?></a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <h3><?php echo Yii::t('language', 'บทความแนะนำ'); ?></h3>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'บทความ'), array(
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/knowledge/manage/insert'
                    )) . "'")
                );
                ?>
            </div>
            <hr>
            <?php
            $this->renderPartial('_grid_guide_knowledge', array(
                'model' => $model,
            ));
            ?>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        Yii::app()->user->getState('knowledge')
                    )) . "'")
                );
                ?>
            </div>
            <hr>
        </div>
        <div id="view2" class="tabcontent">
            <h3><?php echo Yii::t('language', 'บทความทั้งหมด'); ?></h3>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'บทความ'), array(
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/knowledge/manage/insert'
                    )) . "'")
                );
                ?>
            </div>
            <hr>
            <?php
            $this->renderPartial('_grid_all_knowledge', array(
                'model' => $model,
            ));
            ?>
            <hr>
            <div style="text-align: center;">
                <?php
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        Yii::app()->user->getState('knowledge')
                    )) . "'")
                );
                ?>
            </div>
            <hr>
        </div>
        <!--        <div id="view3" class="tabcontent">
        
                </div>
                <div id="view4" class="tabcontent">
        
                </div>
                <div id="view5" class="tabcontent">
        
                </div>
                <div id="view6" class="tabcontent">
                    
                </div>-->
    </div>
</div>