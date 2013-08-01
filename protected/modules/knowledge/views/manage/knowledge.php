<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li>
                <a href="/knowledge/default/index" rel="view-1">
                    <?php echo Yii::t('language', 'บทความ'); ?>
                </a>
            </li>
            <li>
                <a href="/learning/default/home"  rel="view-2">
                    <?php echo Yii::t('language', 'การเรียนรู้'); ?>
                </a>
            </li>
            <li class="selected">
                <a href="/knowledge/manage/knowledge" rel="manage-1">
                    <?php echo Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'บทความ'); ?>
                </a>
            </li>
            <li>
                <a href="/learning/manage/learning" rel="manage-2">
                    <?php echo Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'การเรียนรู้'); ?>
                </a>
            </li>

            <?php
//            $list = array(
//                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledge', 'select' => 'selected'),
////                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '/knowledge/manage/knowledgeAll', 'select' => ''),
//            );
//            echo Tool::GenList($list);
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
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'); ?>
            </span>
        </h3>

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
    </div>
</div>