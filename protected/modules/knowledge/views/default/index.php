<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="/img/iconpage/knowledge.png"/></li>
        </ul>
        <ul class="tabs clearfix">
            <?php
            $list = array(
                array('text' => 'Knowledge', 'link' => '#'),
                array('text' => 'Learning', 'link' => '#'),
            );
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . ++$n)) . "</li>";
            }
            ?>
            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Knowledge', array('/knowledge/manage/knowledge'));
                }
                ?>
            </li>
            <li>
                <?php
                if (Yii::app()->user->isAdmin()) {
                    echo CHtml::link('Manage Learning', array('/learning/manage/learningGroup'));
                }
                ?>
            </li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <?php if (Knowledge::model()->count('guide_status = 1') != 0) { ?>
                <h3 style="padding: 0px 5px;"><i class="icon-bookmark"></i> บทความแนะนำ</h3>
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
            <h3 style="padding: 0px 5px;">บทความล่าสุด</h3>
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
            <?php echo CHtml::link('>>อ่านบทความทั้งหมด<<', array('/knowledge/default/knowledge'), array('style' => 'padding: 0px 5px;')); ?>
        </div>
        <div>
            <div id="view2" class="tabcontent ">
                <h2 class="learninghead">
                    <img src="img/book.png"/>
                    <span>พาณิชย์อิเล็กทรอนิกส์คืออะไร</span>
                </h2>
                <img class="demoshadowtop" src="img/shadow.png">
                <iframe  class="demoiframe" src="http://www.youtube.com/embed/0QRO3gKj3qw" frameborder="0" allowfullscreen></iframe>
                <img src="img/shadow.png">
                Content
                <a href="pdf/ch_01.pdf"><img src="img/download.png" class="downloadbtn" /></a>
                <hr class="demohr"> 
                <ul class="nextlearn">
                    <li>
                        <a href="learning1-2.html" >
                            <img src="img/vid.png"/> 
                        </a> 
                    </li>
                    <li>
                        <a href="learning1-2.html">พาณิชย์อิเล็กทรอนิกส์น่าสนใจอย่างไร</a> 
                        <p>พาณิชย์อิเล็กทรอนิกส์ (Electronic Commerce)
                            ในโลกยุคไร้พรมแดนการติดต่อสื่อสารมีความสะดวกสบายมากขึ้นโดยเทคโนโลยีสารสนเทศเข้ามามีบทบาทเป็นอย่างมาก เทคโนโลยีที่ได้
                            รับความนิยมมากที่สุด คือ เทคโนโลยีอินเตอร์เน็ต อินเตอร์เน็ตเริ่มเข้ามามีบทบาทและกลายเป็นสิ่งจำเป็นในชีวิตประจำวันของหลายๆคน 
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>