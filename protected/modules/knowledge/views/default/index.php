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
        <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
             border-top: 2px solid gold;
             font-size: 16px;
             margin-top: 6px;
             padding: 14px 0;">
            <p style="font-weight: bold;">
                <?php
                echo Yii::t('language', 'ประเภทบทความ');
                ?>
            </p>
        </div>
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
            <h3 class="barH3">
                <span>
                    <i class='icon-lightbulb'></i> 
                    <a href="<?php echo CHtml::normalizeUrl(array("/knowledge/default/knowledge")); ?>">
                        <?php echo Yii::t('language', 'บทความ'); ?>
                    </a>
                    <?php
                    if ($knowledge_type_id != '') {
                        ?>
                        <i class="icon-chevron-right"></i>
                        <?php echo KnowledgeType::model()->getList($knowledge_type_id); ?>
                    <?php } else {
                        ?>
                        <i class="icon-chevron-right"></i> 
                        <?php echo Yii::t('language', 'บทความทั้งหมด'); ?>
                    <?php }
                    ?>

                </span>
            </h3>
            <?php
            $tabs = array();

            $tabs['<i class="icon-bookmark-empty"></i> ' . Yii::t('language', 'บทความแนะนำ')] = array(
                'id' => 'tab01',
                'content' => $this->renderPartial('index_tab_1', array(
                    'knowledge_type_id' => $knowledge_type_id,
                    'model' => $model,
                        ), true, false),
            );

            $tabs['<i class="icon-star"></i> ' . Yii::t('language', 'บทความยอดนิยม')] = array(
                'id' => 'tab02',
                'content' => $this->renderPartial('index_tab_2', array(
                    'knowledge_type_id' => $knowledge_type_id,
                    'model' => $model,
                        ), true, false),
            );

            $tabs['<i class="icon-time"></i> ' . Yii::t('language', 'บทความล่าสุด')] = array(
                'id' => 'tab03',
                'content' => $this->renderPartial('index_tab_3', array(
                    'knowledge_type_id' => $knowledge_type_id,
                    'model' => $model,
                        ), true, false),
            );

            $this->widget('zii.widgets.jui.CJuiTabs', array(
                'tabs' => $tabs,
                'options' => array(
                    'collapsible' => false,
                ),
                'id' => 'tab_all',
            ));
            ?>
        </div>
    </div>
</div>