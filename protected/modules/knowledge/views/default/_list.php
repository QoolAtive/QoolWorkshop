<?php
$subject = LanguageHelper::changeDB($data->subject, $data->subject_en);
$detail = LanguageHelper::changeDB($data->detail, $data->detail_en);
?>
<ul class="knowledgedata">
    <li>
        <div  class="knowledgeimg" style="background: url('/file/knowledge/<?php echo $data->image; ?>') center center;
              height:150px; background-size: auto 150px; border-bottom: 1px solid #ccc; background-repeat: no-repeat;   -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;">
            <a href="/knowledge/default/view/id/<?php echo $data->id; ?>"></a>
        </div> 

        <div class="arrow"></div> 

        <div class="textpad">
            <h3><a href="/knowledge/default/view/id/<?php echo $data->id; ?>"><?php echo Tool::limitString($subject); ?></a></h3>
            <span>
                <?php
                echo Tool::limitString(preg_replace('/(<[^>]+) style=".*?"/i', '$1', ereg_replace('&nbsp;', ' ', $detail)), 150);
                ?>
            </span>
        </div>
    </li>
</ul>
