<style>
    .lessonList{
        padding: 0px 5px;
    }
    .colL{
        width: 30%;
        display: inline-block;
    }
    .colR{
        width: 70%;
        float: right;
        display: inline-block;
    }
</style> 
<?php
$subject = LanguageHelper::changeDB($data->subject, $data->subject_en);
$video = LanguageHelper::changeDB($data->video, $data->video_en);

?>
<div class="lessonList">
    <div class="colL">
        <iframe width="210px" src="<?php echo $video; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="colR">
        <?php        
        echo CHtml::link($subject, array('/learning/default/lesson', 'id' => $data->id));
//        echo Tool::limitString(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $data->detail), 350);
        ?>
    </div>
</div>
<hr>