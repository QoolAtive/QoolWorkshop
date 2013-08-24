<!-- 2.FAQ Knowledge & Learning -->
<div id="view2">
    <img src="<?php echo Yii::t('language', '/img/headfaq2.png'); ?>" class="tabfaq">
    <div class="accordion" id="hideother2">
        <div id="edit2">
        </div>
        <?php
        $i = 1;
        foreach ($faq2 as $faq) {
            $subject = LanguageHelper::changeDB($faq['subject_th'], $faq['subject_en']);
            $detail = LanguageHelper::changeDB($faq['detail_th'], $faq['detail_en']);
            ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <p class="faqarrow"></p>
                    <a class="accordion-toggle" id="subject<?php echo $i; ?>" data-toggle="collapse" data-parent="#hideother2" href="#item2<?php echo $i; ?>" onclick="addHit('<?php echo $this->createAbsoluteUrl('/faq/default/countView', array('faq_id' => $faq['id'])); ?>');">
                        <?php echo $subject; ?>
                    </a>
                </div>
                <div id="item2<?php echo $i; ?>" class="accordion-body collapse <?php
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
        'pages' => $pages2,
    ));
    ?>
<!--            <img src="/img/iconpage/faq/faqbannerbottom.png" style="width: 100%;">-->
</div>
<!-- END 2.FAQ Knowledge & Learning -->