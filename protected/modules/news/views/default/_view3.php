<!--Training-->
<div id="view3">
    <h3>Training</h3>
    <div class="accordion" id="hideother3">
        <?php
        $i = 1;
        foreach ($trainlist as $train) {
            ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother3" href="#item3<?php echo $i; ?>" id="<?php echo $train['id']; ?>">
                        <?php echo $train['subject_th']; ?>
                    </a>
                </div>
                <div id="item3<?php echo $i; ?>" class="accordion-body collapse <?php
                if ($i == 1 && $_COOKIE['anchor'] == NULL)
                    echo 'in';
                else
                    echo '';
                ?>">
                    <div class="accordion-inner">
                        <!--รายละเอียด-->
                        <div><?php echo $train['detail_th']; ?></div>
                        <div><?php echo CHtml::link($train['link'], $train['link'], array('target' => '_blank')); ?></div>
                        <!--วันที่เริ่ม - วันสุดท้าย-->
                        <div><?php echo Tool::ChangeDateTimeToShow($train['start_at']) . " ถึง " . Tool::ChangeDateTimeToShow($train['end_at']); ?></div>
                    </div>
                </div>
            </div>
            <?php
            if ($i == 1) {
                //ไม่ให้ link จาก calendar ปิด accordion
                $not_click = $train['id'];
            }
            $i++;
        }
        ?>
    </div>
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $pages_train,
    ));
    ?>
</div>

<script>
    $(document).ready(function() {
        if (location.hash != '#<?php echo $not_click; ?>') {
            $(location.hash).click();
        }
    });
</script>
<!--END Training-->