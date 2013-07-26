<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/knowledge/default/index"><?php echo Yii::t('language', 'บทความ'); ?></a></li>
            <li><a href="/learning/default/home"><?php echo Yii::t('language', 'การเรียนรู้'); ?></a></li>
            <li><a href="/knowledge/manage/knowledge"><?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'); ?></a></li>
            <li><a href="/learning/manage/learning"><?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'การเรียนรู้'); ?></a></li>

            <?php
            $list = array(
                array('text' => Yii::t('language', 'บทความแนะนำ'), 'link' => '/knowledge/manage/knowledge', 'select' => ''),
                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledgeAll', 'select' => 'selected'),
            );
            echo Tool::GenList($list);
            ?> 

        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <h3><?php echo Yii::t('language', 'บทความทั้งหมด'); ?></h3>

        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'เพิ่ม') . Yii::t('language', 'บทความ'), array(
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/knowledge/manage/insert'
                )) . "'")
            );
            ?> 
            <hr>
        </div>

        <?php
        $this->renderPartial('_grid_all_knowledge', array(
            'model' => $model,
        ));
        ?>

        <div class="txt-cen">
            <hr>
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    Yii::app()->user->getState('knowledge')
                )) . "'")
            );
            ?>
            <hr>
        </div>
    </div>
</div>