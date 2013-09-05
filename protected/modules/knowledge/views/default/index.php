<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a rel="view1" href="/knowledge/default/index"><?php echo Yii::t('language', 'บทความ'); ?></a></li>
            <li><a rel="view2" href="/learning/default/home"><?php echo Yii::t('language', 'การเรียนรู้'); ?></a></li>
            <?php
//            $list = array(
//                array('text' => Yii::t('language', 'บทความ'), 'link' => '#view1'),
//                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '#view2'),
//            );
//            $n = 1;
//            foreach ($list as $ls) {
//                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
//            }
//            echo Tool::GenList($list);
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
        <ul class="rectangle-list">
            <p class="demoline"></p>
            <?php
            $list_sub = '';
            $active = false;
            $menu = KnowledgeType::model()->findAll();
            foreach ($menu as $m) {
                $select = '';
                if ($knowledge_type_id == $m['knowledge_type_id']) {
                    $active = true;
                    $select = 'menuactive listactive';
                }
                $name = LanguageHelper::changeDB($m['name_th'], $m['name_en']);
                $list_sub .= "<li>";
                $list_sub .= CHtml::link($name, array(
                            '/knowledge/default/index/', 'knowledge_type_id' => $m['knowledge_type_id']), array(
                            'rel' => 'view' . $n++,
                            'class' => $select
                ));
                $list_sub .= "</li>";
            }


            echo "<li>";
            echo CHtml::link(Yii::t('language', 'บทความทั้งหมด'), array(
                '/knowledge/default/index'), array(
                'rel' => 'view1',
                'class' => $active == false ? 'menuactive listactive' : ''
            ));
            echo "</li>";
            echo $list_sub;
            ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <img src="/img/banner/knowledge.png" class="pagebanner" alt="pagebanner"/>
            <?php if (Knowledge::model()->count('guide_status = 1') != 0) { ?>
                <h3 class="headfont"><i class="icon-bookmark-empty"></i><?php echo Yii::t('language', 'บทความแนะนำ'); ?></h3>
                <div class="clearfix">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $model->getData('1', $knowledge_type_id),
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
            <h3 class="headfont"><i class="icon-file-alt"></i><?php echo Yii::t('language', 'บทความยอดนิยม'); ?></h3>
            <div class="clearfix">
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $model->getKnowledgeHot($knowledge_type_id),
                    'itemView' => '_list', // refers to the partial view named '_post'
                    'summaryText' => '',
                    'sortableAttributes' => array(
//                    'id', 
                    ),
                ));
                ?>
            </div>
            <hr>
            <h3 class="headfont"><i class="icon-file-alt"></i><?php echo Yii::t('language', 'บทความล่าสุด'); ?></h3>
            <div class="viewall">
                <i class="icon-search"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'บทความทั้งหมด'), array('/knowledge/default/knowledge'));
                ?>
            </div>
            <div class="clearfix">
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $model->getData('', $knowledge_type_id),
                    'itemView' => '_list', // refers to the partial view named '_post'
                    'summaryText' => '',
                    'sortableAttributes' => array(
//                    'id', 
                    ),
                ));
                ?>
            </div>
        </div>

    </div>
</div>