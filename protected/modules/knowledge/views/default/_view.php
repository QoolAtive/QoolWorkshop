<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => 'เนื้อข่าว'),
                array('text' => 'ข่าวทั้งหมด'),
            );
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], '#', array('rel' => 'view' . ++$n)) . "</li>";
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
                if (Yii::app()->user->isAdmin())
                    echo CHtml::button('แก้ไข', array('class' => "btnedit grey", 'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                            '/knowledge/manage/insert/id/' . $view->id
                        )) . "'")
                    );
                ?>
                <!-- </div>
                -->
                <div style="text-align: center;">
                    <img src="/file/knowledge/<?php echo $view->image; ?>" style="height: 300px; max-width: 748px;" />
                </div>

                <div class="knowledgeviewtext">

                    <h3>
                        <img src="/img/iconform.png" alt="icon"/>
                        <?php
                        echo $view->subject;
                        ?>
                    </h3>
                    <p><?php echo $view->detail; ?></p>

                    <div style="text-align: center; margin-top:10px;">
                        <?php
                        echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                                '/knowledge/default/index'
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
