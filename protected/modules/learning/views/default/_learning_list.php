<?php
$subject = LanguageHelper::changeDB($data->subject, $data->subject_en);
$video = LanguageHelper::changeDB($data->video, $data->video_en);

?>
<div class="lessonList">


<iframe width="225px" height="126px" src="<?php echo $video; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>
        
        <?php        
        echo CHtml::link($subject, array('/learning/default/lesson', 'id' => $data->id));
//        echo Tool::limitString(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $data->detail), 350);
        ?>
</div>
