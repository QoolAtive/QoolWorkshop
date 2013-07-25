<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/knowledge.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => Yii::t('language', 'เนื้อหา'), 'link' => '#',),
                array('text' => Yii::t('language', 'บทความทั้งหมด'), 'link' => '#',),
            );
            $n = 1;
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
            }
            $list2 = array(
                array('text' => Yii::t('language', 'บทความ'), 'link' => '/knowledge/default/index'),
                array('text' => Yii::t('language', 'การเรียนรู้'), 'link' => '/knowledge/default/index#view2'),
            );
            $n2 = 3;
            foreach ($list2 as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n2++)) . "</li>";
            }
//            echo Tool::GenList($list);
            if (Yii::app()->user->isAdmin()) {

                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ') . Yii::t('language', 'บทความ'), array(
                    '/knowledge/manage/knowledge'
                        ), array(
                    'rel' => 'view5'
                ));
                echo "</li>";
                echo "<li>";
                echo CHtml::link(
                        Yii::t('language', 'จัดการ'). Yii::t('language', 'การเรียนรู้'), array(
                    '/learning/manage/learning'
                        ), array(
                    'rel' => 'view6'
                ));
                echo "</li>";
            }
            ?> 
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent ">
            <div class="knowledgeview">
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
                        <?php
                        echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                                Yii::app()->user->getState('link_back')
                            )) . "'")
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="view2" class="tabcontent ">
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
    </div>
</div>
