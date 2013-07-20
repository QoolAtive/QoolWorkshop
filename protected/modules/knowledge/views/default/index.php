<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '#'),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '#'),
            );
            $n = 1;
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
            }
//            echo Tool::GenList($list);
            if (Yii::app()->user->isAdmin()) {

                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . " " . Yii::t('language', 'บทความ'), array('/knowledge/manage/knowledge'));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . " " . Yii::t('language', 'การเรียนรู้'), array('/learning/manage/learning'));
                echo "</li>";
            }
            ?> 
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <img src="/img/banner/knowledge.png" class="pagebanner" alt="pagebanner"/>
            <?php if (Knowledge::model()->count('guide_status = 1') != 0) { ?>
                <h3 class="headfont"><i class="icon-bookmark-empty"></i> <?php echo Yii::t('language', 'บทความแนะนำ'); ?></h3>
                <div class="clearfix">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $model->getData('1'),
                        'itemView' => '_list', // refers to the partial view named '_post'
                        'summaryText' => '',
                        'sortableAttributes' => array(
//                    'id', 
                        ),
                    ));
                    ?>
                </div>
            <?php } ?>
            <hr>
            <h3 class="headfont"><i class="icon-file-alt"></i> <?php echo Yii::t('language', 'บทความล่าสุด'); ?></h3>
            <div class="viewall">
                <i class="icon-search"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'บทความทั้งหมด'), array('/knowledge/default/knowledge'));
                ?>
            </div>
            <div class="clearfix">
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $model->getData(),
                    'itemView' => '_list', // refers to the partial view named '_post'
                    'summaryText' => '',
                    'sortableAttributes' => array(
//                    'id', 
                    ),
                ));
                ?>
            </div>
        </div>
        <div>
            <div id="view2" class="tabcontent ">
                <img src="<?php echo Yii::t('language', '/img/banner/learning.png'); ?>" class="pagebanner" alt="pagebanner"/>

                <div class="row-fluid">
                    <UL class="learninglist">
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_01.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_02.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_03.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_04.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_05.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_06.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_07.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_08.png'); ?>"> 
                            </a>
                        </li>

                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_09.png'); ?>"> 
                            </a>
                        </li>
                        <li>
                            <a href="lessonn1">
                                <img src="<?php echo Yii::t('language', '/img/learning/Learning_10.png'); ?>"> 
                            </a>

                        </li>
                    </UL>
                    <ul class="card">
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider' => $modelLearning->getData(),
                            'itemView' => '_clist_learning_group',
                            'summaryText' => false,
//                                'sortableAttributes' => array(
//                                    'title',
//                                    'create_time' => 'Post Time',
//                                ),
                        ));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>