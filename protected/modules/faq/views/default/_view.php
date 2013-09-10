<!--รูปหมวดหมู่-->
<!--<img src="<?php echo Yii::t('language', '/img/headfaq' . $main_id . '.png'); ?>" class="tabfaq">-->

<?php
$faq_sub_list = FaqSub::model()->findAll(array('condition' => 'faq_main_id = ' . $main_id, 'order' => 'order_n'));
if ($faq_sub_list != NULL) {
    ?>
    <div class="accordion" id="hideother<?php echo $main_id; ?>">
        <?php
        foreach ($faq_sub_list as $faq_sub) {
            $sub_id = $faq_sub['faq_sub_id'];
            $criteria = new CDbCriteria();
//    $criteria->condition = "fm_id = " . $main_id;
            $criteria->condition = "fs_id = " . $sub_id;
            $criteria->order = "counter desc";
            $count = FaqQuestion::model()->count($criteria);
            $pages = new CPagination($count);
            // results per page
            $pages->pageSize = 15;
            $pages->applyLimit($criteria);
            $faq_list = FaqQuestion::model()->findAll($criteria);

            if ($faq_list != NULL) {
                ?>
                <h3><?php echo $faq_sub['name_th']; ?></h3>
                <?php
                $i = 1;
                foreach ($faq_list as $faq) {
                    $subject = LanguageHelper::changeDB($faq['subject_th'], $faq['subject_en']);
                    $detail = LanguageHelper::changeDB($faq['detail_th'], $faq['detail_en']);
                    ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <p class="faqarrow"></p>
                            <a class="accordion-toggle" id="subject<?php echo $i; ?>" data-toggle="collapse" data-parent="#hideother<?php echo $main_id; ?>" href="#item<?php echo $main_id . $sub_id . $i; ?>" onclick="addHit('<?php echo $this->createAbsoluteUrl('/faq/default/countView', array('faq_id' => $faq['id'])); ?>');">
                                <?php echo $subject; ?>
                            </a>
                        </div>
                        <div id="item<?php echo $main_id . $sub_id . $i; ?>" class="accordion-body collapse <?php
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
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                ));
                ?>

                <?php
            } //if ($faq_list != NULL) {
        } //foreach($faq_sub_list){
        ?>
    </div>
    <?php
} else { //if($faq_sub_list != NULL){
    echo Yii::t('language', 'ไม่พบคำถาม');
}
?>