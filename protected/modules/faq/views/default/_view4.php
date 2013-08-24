<!-- 4.FAQ Web Simulation -->
<div id="view4">
    <img src="<?php echo Yii::t('language', '/img/headfaq4.png'); ?>" class="tabfaq">
    <div class="accordion" id="hideother4">
        <div id="edit4">
        </div>
        <?php
        $i = 1;
        foreach ($faq4 as $faq) {
            $subject = LanguageHelper::changeDB($faq['subject_th'], $faq['subject_en']);
            $detail = LanguageHelper::changeDB($faq['detail_th'], $faq['detail_en']);
            ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <p class="faqarrow"></p>
                    <a class="accordion-toggle" id="subject<?php echo $i; ?>" data-toggle="collapse" data-parent="#hideother4" href="#item4<?php echo $i; ?>" onclick="addHit('<?php echo $this->createAbsoluteUrl('/faq/default/countView', array('faq_id' => $faq['id'])); ?>');">
                        <?php echo $subject; ?>
                    </a>
                </div>
                <div id="item4<?php echo $i; ?>" class="accordion-body collapse <?php
//                if ($i == 1)
//                    echo 'in';
//                else
//                    echo '';
                ?>">
                    <div class="accordion-inner">
                        <?php echo $detail; ?>
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
        'pages' => $pages4,
    ));
    ?>
<!--            <img src="/img/iconpage/faq/faqbannerbottom.png" style="width: 100%;">-->
</div>
<!-- END 4.FAQ Web Simulation -->