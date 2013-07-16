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
<div class="lessonList">
    <div class="colL">
        <iframe width="210px" src="<?php echo $data->video; ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="colR">
        <p><?php echo CHtml::link($data->subject, array('/learning/default/lesson', 'id' => $data->id)); ?></p>
        <?php echo Tool::limitString(preg_replace('/(<[^>]+) style=".*?"/i', '$1', ereg_replace('&nbsp;', ' ', $data->detail)), 350); ?>
    </div>
</div>
<hr>