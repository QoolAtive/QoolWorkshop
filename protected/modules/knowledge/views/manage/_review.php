<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => 'เนื้อข่าว', 'link' => '#',),
                array('text' => 'ข่าวทั้งหมด', 'link' => '#',),
            );
            $n = 1;
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
            }
            ?>
        </ul>
    </div>
</div>

<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent ">
            <div class="knowledgeview">
                <div style="text-align: center;">
                    <img src="/file/knowledge/<?php echo $model->image; ?>" style="height: 300px; max-width: 748px;" />
                </div>

                <div class="knowledgeviewtext">

                    <h3>
                        <img src="/img/iconform.png" alt="icon"/>
                        <?php
                        echo $model->subject;
                        ?>
                    </h3>
                    <p><?php echo $model->detail; ?></p>

                    <div style="text-align: center;">
                        <?php
//                        echo CHtml::button('เสร็จสิ้น', array(
//                            'onclick' => "window.location='" . CHtml::normalizeUrl(array(
//                                '/knowledge/manage/addAlert/con/2',
//                            )) . "'",
//                            'confirm' => 'คุณต้องการบันทึกบทความหรือไม่?')
//                        );
                        echo CHtml::button('แก้ไข', array(
                            'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                                '/knowledge/manage/insert/id/' . $model->id,
                            )) . "'",
                            'confirm' => Yii::t('language', 'คุณต้องการแก้ไขบทความหรือไม่?'))
                        );
                        echo CHtml::button('เพิ่มบทความใหม่', array(
                            'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                                '/knowledge/manage/insert',
                            )) . "'",
                            'confirm' => Yii::t('language', 'คุณต้องการเพิ่มบทความใหม่หรือไม่?'))
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
                    'dataProvider' => $knowledge->getData('1'),
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
                    'dataProvider' => $knowledge->getData(),
                    'itemView' => '_list', // refers to the partial view named '_post'
                    'summaryText' => '',
                    'sortableAttributes' => array(
//                    'id', 
                    ),
                ));
                ?>
            </div>
            <?php echo CHtml::link('>>อ่านบทความทั้งหมด<<', array('/knowledge/default/knowledge'), array('style' => 'padding: 0px 5px;')); ?>
        </div>
    </div>
</div>

