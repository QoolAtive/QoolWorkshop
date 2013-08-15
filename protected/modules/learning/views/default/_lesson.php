<style>
    .LessonList{
        list-style-type:circle;
        padding: 0px 20px;
    }
</style>
<?php
$list = array(
    array('text' => Yii::t('language', 'บทเรียนทั้งหมด'), 'link' => '/learning/default/index/id/' . $model->group_id),
    array('text' => Yii::t('language', 'บทเรียน'), 'link' => '#', 'select' => 'selected'),
);
$this->renderPartial('_side_bar', array(
    'select2' => 'selected',
    'model' => $modelList,
    'id' => $id,
    'list' => $list,
));
echo "<pre>";
print_r($modelList->attributes);
echo "</pre>";

$model_learning_group = LearningGroup::model()->findByPk($model->group_id);
$name_group = LanguageHelper::changeDB($model_learning_group->name, $model_learning_group->name_en);

$subject = LanguageHelper::changeDB($model->subject, $model->subject_en);
$detail = LanguageHelper::changeDB($model->detail, $model->detail_en);
$video = LanguageHelper::changeDB($modelVideo->video, $modelVideo->video_en);
$next_video = LanguageHelper::changeDB($lessonNextVideo->video, $lessonNextVideo->video_en);
$next_subject = LanguageHelper::changeDB($lessonNext->subject, $lessonNext->subject_en);
$next_detail = LanguageHelper::changeDB($lessonNext->detail, $lessonNext->detail_en);
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-bookmark-empty"></i> 
                <a href="<?php echo CHtml::normalizeUrl(array("/learning/default/home")); ?>">
                    <?php echo Yii::t('language', 'กลุ่มการเรียนรู้'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/learning/default/index/id/" . $model->group_id)); ?>">
                    <?php echo $name_group; ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo $subject; ?>
            </span>
        </h3>
        <?php
        if (Yii::app()->user->isAdmin()) {
            echo "<div style='float: right;  margin-right: 2px;
    margin-top: 4px;'>";
            echo CHtml::button(Yii::t('language', 'แก้ไข'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/learning/manage/insertLearning/id/' . $model->id
                )) . "'")
            );
            echo "</div>";
        }
        ?>
        <h2 class="learninghead"><img src="/img/book.png"/>
            <?php echo $subject; ?>
        </h2>
        <img class="demoshadowtop" src="/img/shadow.png">
        <iframe width="740" height="416" style=" margin-left: 5px;" src="<?php echo $video; ?>?showinfo=0"   frameborder="0" allowfullscreen></iframe>
        <img class="demoshadowbuttom" src="/img/shadow.png">
        <div class="_100" style="margin-top: -10px;">
        
        <?php echo $detail; ?>
        </div>
        <div class="clearfix"></div>

        <?php if (isset($modelFile)) echo CHtml::link(CHtml::image('/img/download.png', '', array('class' => 'downloadbtn')), array('/learning/default/readingFile/', 'id' => $modelFile->id)); ?>
        <hr class="demohr"> 
        <?php if (!empty($lessonNext)) { ?>
            <div class="_100">
            <h3>
                <span>
                    <i class="icon-circle-arrow-right"></i>
                    <?php echo Yii::t('language', 'บทเรียนถัดไป'); ?>
                </span>
            </h3>
            <ul class="nextlearn">
                <li>
                    <iframe width="210px" height="117px" src="<?php echo $next_video; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>
                </li>

                <li>
                    <?php echo CHtml::link($next_subject, array('/learning/default/lesson', 'id' => $lessonNext->id), array('style' => 'font-size: 14px;')); ?>
                    <?php echo Tool::limitString(preg_replace('/(<[^>]+) style=".*?"/i', '$1', ereg_replace('&nbsp;', ' ', $next_detail)), 350); ?>
                </li>
            </ul>
        </div>

        <?php } ?>
        <div class="clearfix">
            <div class="_100"></div>
        </div>
<!--        <div style="text-align: center;padding: 10px;">
            <hr>
            <?php
//            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "history.go(-1)"));
            ?>
            <hr>
        </div>-->
    </div>
</div>