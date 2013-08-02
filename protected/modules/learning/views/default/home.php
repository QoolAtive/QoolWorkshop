<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index', 'select' => ''),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '#', 'select' => 'selected'),
            );
            echo Tool::GenList($list);

            if (Yii::app()->user->isAdmin()) {
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'บทความ'), array('/knowledge/manage/knowledge'));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'การเรียนรู้'), array('/learning/manage/learning'));
                echo "</li>";
            }
            ?> 
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view2" class="tabcontent ">
            <img src="<?php echo Yii::t('language', '/img/banner/learning.png'); ?>" class="pagebanner" alt="pagebanner"/>
            <h3 class="headfont">
                <span>
                    <i class="icon-bookmark-empty"></i> <?php echo Yii::t('language', 'กลุ่มการเรียนรู้'); ?>
                </span>
            </h3>

            <div class="row-fluid">
                <ul class="learninglist">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $model->getData(),
                        'itemView' => '_clist_learning_group',
                        'summaryText' => false,
                    ));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>