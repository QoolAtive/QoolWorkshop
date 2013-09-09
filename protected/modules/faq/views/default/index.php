<?php
$this->renderPartial('_side_menu', array('main_id' => $main_id));
?>

<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        <?php
        $this->renderPartial('_view', array('faq_list' => $faq_list, 'pages' => $pages, 'main_id' => $main_id));
        ?>
    </div>
</div>
