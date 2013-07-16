<style>
    .LessonList{
        list-style-type:circle;
        padding: 0px 20px;
    }
</style>
<?php
$list = array(
    array('text' => Yii::t('language', 'Learning Groups'), 'link' => '/knowledge/default/index', 'select' => ''),
    array('text' => Yii::t('language', 'Learning'), 'link' => '/knowledge/default/index', 'select' => 'selected'),
);
$this->renderPartial('_side_bar', array(
    'select2' => 'selected',
    'model' => $modelList,
    'id' => $id,
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $learningGroup->getData(),
                'itemView' => '_clist_learning_group',
                'summaryText' => false,
//                'sortableAttributes' => array(
//                    'title',
//                    'create_time' => 'Post Time',
//                ),
            ));
            ?>
        </div>
        <div id="view2" class="tabcontent ">
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<div style='float: right;'>";
                echo CHtml::button('แก้ไข', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/learning/manage/insertLearning/id/' . $model->id
                    )) . "'")
                );
                echo "</div>";
            }
            ?>

             <h2 class="learninghead"><img src="/img/book.png"/>
               <?php echo $model->subject; ?>
             </h2>
            <img class="demoshadowtop" src="/img/shadow.png">
            <iframe width="745" height="415" src="<?php echo $modelVideo->video; ?>" frameborder="0" allowfullscreen></iframe>
            <img class="demoshadowbuttom" src="/img/shadow.png">
            <?php echo $model->detail; ?>
            <a href=""><img src="/img/download.png" class="downloadbtn" /></a>
            <hr class="demohr"> 
            <?php if (!empty($lessonNext)) { ?>


             <ul class="nextlearn">
                                            <li>
                                                                        <iframe width="210px" src="<?php echo $lessonNextVideo->video; ?>" frameborder="0" allowfullscreen></iframe>

                                            </li>

                                            <li>
                                                <?php echo CHtml::link($lessonNext->subject, array('/learning/default/lesson', 'id' => $lessonNext->id), array('style' => 'font-size: 14px;')); ?>
                        <?php echo Tool::limitString(preg_replace('/(<[^>]+) style=".*?"/i', '$1', ereg_replace('&nbsp;', ' ', $lessonNext->detail)), 350); ?>
                                            </li>
                                        </ul>

            <?php } ?>
            <div class="clearfix">
                <div class="_100"></div>
            </div>
            <div style="text-align: center;padding: 10px;">
                <?php
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "history.go(-1)"));
                ?>
            </div>
        </div>
    </div>
</div>