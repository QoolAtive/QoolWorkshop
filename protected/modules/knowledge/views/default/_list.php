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
            <a href="<?php echo Yii::app()->createUrl('/knowledge/default/view/', array('id' => $data->id, 'title' => $subject)); ?>"></a>
        </div> 

        <div class="arrow"></div> 

        <div class="textpad">
            <h3><?php
                echo Chtml::link(Tool::stripText($subject, 100), Yii::app()->createUrl('/knowledge/default/view/', array(
                            'id' => $data->id, 'title' => $subject)
                        ), array(
                            'target' => '_bank'
                ));
                ?>
            </h3>
            <span>
<?php
//                echo Tool::limitString(preg_replace('/(<[^>]+) style=".*?"/i', '$1', ereg_replace('&nbsp;', ' ', $detail)), 150);
echo Tool::stripText($detail, 250);
?>
            </span>
        </div>
    </li>
</ul>
