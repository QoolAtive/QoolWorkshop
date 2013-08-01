<style>
    .LessonList{
        list-style-type:circle;
        padding: 0px 20px;
    }
</style>
<?php
$list = array(
    array('text' => Yii::t('language', 'บทเรียนที่เลือก'), 'link' => '#', 'select' => 'selected'),
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
        <iframe width="740" height="416" style=" margin-left: 5px;" src="<?php echo $modelVideo->video; ?>?showinfo=0"   frameborder="0" allowfullscreen></iframe>
        <img class="demoshadowbuttom" src="/img/shadow.png">
        <!--<div class="_100">-->
        <?php echo $model->detail; ?>
        <!--</div>-->
        <div class="clearfix"></div>

        <?php if (isset($modelFile)) echo CHtml::link(CHtml::image('/img/download.png', '', array('class' => 'downloadbtn')), array('/learning/default/readingPdf/', 'id' => $modelFile->id)); ?>
        <hr class="demohr"> 
        <?php if (!empty($lessonNext)) { ?>


            <ul class="nextlearn">
                <li>
                    <iframe width="210px" height="117px" src="<?php echo $lessonNextVideo->video; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>

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