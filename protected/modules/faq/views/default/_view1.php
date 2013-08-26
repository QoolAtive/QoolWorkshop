<!-- 1. FAQ Service Provider -->
<div id="view1">
    <img src="<?php echo Yii::t('language', '/img/headfaq1.png'); ?>" class="tabfaq">
    <div class="accordion" id="hideother1">
        <?php
        $i = 1;
        foreach ($faq1 as $faq) {
            $subject = LanguageHelper::changeDB($faq['subject_th'], $faq['subject_en']);
            $detail = LanguageHelper::changeDB($faq['detail_th'], $faq['detail_en']);
            ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <p class="faqarrow"></p>
                    <a class="accordion-toggle" id="subject<?php echo $i; ?>" data-toggle="collapse" data-parent="#hideother1" href="#item1<?php echo $i; ?>" onclick="addHit('<?php echo $this->createAbsoluteUrl('/faq/default/countView', array('faq_id' => $faq['id'])); ?>');">
                        <?php echo $subject; ?>
                    </a>
                </div>
                <div id="item1<?php echo $i; ?>" class="accordion-body collapse <?php
//                if ($i == 1)
//                    echo 'in';
//                else
//                    echo '';
                ?>">
                    <div class="accordion-inner">
                        <?php echo $detail; ?>
                        <div class="right">
                            <?php
                            echo Yii::t('language', 'ผู้เข้าชม');
                            echo ' ' . $faq['counter'] . ' ';
                            echo Yii::t('language', 'ครั้ง');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>

    </div>
    <?php
    $this->widget('CLinkPager', array(
        'pages' => $pages1,
    ));
    ?>

<!--            <img src="/img/iconpage/faq/faqbannerbottom.png" style="width: 100%;">-->

</div>
<!-- END 1. FAQ Service Provider -->