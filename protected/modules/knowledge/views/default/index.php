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
            $n = 1;
            foreach ($list as $ls) {
                echo "<li>" . CHtml::link($ls['text'], $ls['link'], array('rel' => 'view' . $n++)) . "</li>";
            }
//            echo Tool::GenList($list);
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
                    echo CHtml::link('Manage Learning', array('/learning/manage/learning'));
                }
                ?>
            </li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
             <img src="/img/banner/knowledge.png" class="pagebanner" alt="pagebanner"/>
            <?php if (Knowledge::model()->count('guide_status = 1') != 0) { ?>
                <h3 class="headfont"><i class="icon-bookmark-empty"></i> บทความแนะนำ</h3>
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
            <h3 class="headfont"><i class="icon-file-alt"></i> บทความล่าสุด</h3>
            <div class="viewall"> 
                          <i class="icon-search"></i>
                          <?php echo CHtml::link('บทความทั้งหมด', array('/knowledge/default/knowledge')); ?>
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
                             <img src="/img/banner/learning.png" class="pagebanner" alt="pagebanner"/>

                <div class="row-fluid">
    <UL class="learninglist">
        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_01.png"> 
           </a>

        </li>


        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_02.png"> 
           </a>

        </li>

        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_03.png"> 
           </a>

        </li>

        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_04.png"> 
           </a>

        </li>

        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_05.png"> 
           </a>

        </li>
        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_06.png"> 
           </a>

        </li>

        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_07.png"> 
           </a>

        </li>

        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_08.png"> 
           </a>

        </li>


        <li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_09.png"> 
           </a>

        </li>


<li>
           <a href="lessonn1">
              <img src="/img/learning/Learning_10.png"> 
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