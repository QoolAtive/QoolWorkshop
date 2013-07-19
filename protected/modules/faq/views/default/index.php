<?php
$currentLang = Yii::app()->language;
//echo "<br />currentLang: " . $currentLang . "<br />";
?>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/faq.png'); ?>"/></li>
        </ul>
    </div>

    <ul class="tabs clearfix">
        <li>
            <a rel="view1" href="#">
                <?php
                //FAQ Service Provider 
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'บริการ');
                ?>
            </a>
        </li>
        <li>
            <a rel="view2" href="#">
                <?php
                //FAQ Knowledge & Learning
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'การเรียนรู้และบทความ');
                ?>
            </a>
        </li>
        <li>
            <a rel="view3" href="#">
                <?php
                //FAQ E-Directory
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'ค้นหาร้านค้า');
                ?>
            </a>
        </li>
        <li>
            <a rel="view4" href="#">
                <?php
                //FAQ Web Simulation
                echo Yii::t('language', 'คำถาม') . " " . Yii::t('language', 'แนะนำการใช้งาน');
                ?>
            </a>
        </li>
        <?php if (Yii::app()->user->isAdmin()) { ?>
            <li>
                <a href="<?php echo CHtml::normalizeUrl(array('/faq/default/manageFaq')); ?>">                   
                    <?php
                // Manage
                echo Yii::t('language', 'จัดการ') . " " . Yii::t('language', 'คำถาม');
                ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>


<div class="content">
    <div class="tabcontents" >
        <img src="<?php echo Yii::t('language', '/img/banner/faq.png'); ?>" class="pagebanner" alt="pagebanner"/>
        
        <!-- 1. FAQ Service Provider -->
        <div id="view1" class="tabcontent">
            <?php
//            $faq1 = FaqQuestion::model()->findAllByAttributes(array('fm_id' => '1'));
            ?>
            <img src="<?php echo Yii::t('language', '/img/headfaq1.png'); ?>" class="tabfaq">
            <div class="accordion" id="hideother1">
                <?php
//                if (Yii::app()->user->isAdmin()) {
//                echo CHtml::ajaxButton(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/1')), array('update' => '#edit1')
//                );
//                }
                ?>

                <?php
                $i = 1;
                foreach ($faq1 as $faq) {
                    ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <p class="faqarrow"></p>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother1" href="#item1<?php echo $i; ?>">
                                <?php echo $faq['subject_th']; ?>
                            </a>
                            <?php
//                            echo CHtml::ajaxButton(Yii::t('language', 'แก้ไข'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/1/id/' . $faq['id'])), array('update' => '#edit2')
//                            );
//                            echo CHtml::button(Yii::t('language', 'ลบ'), array('submit' => CHtml::normalizeUrl(array('/faq/default/deleteFaq/id/' . $faq['id'])))
//                            );
                            ?>
                        </div>
                        <div id="item1<?php echo $i; ?>" class="accordion-body collapse <?php if ($i == 1) echo 'in';
                        else echo ''; ?>">
                            <div class="accordion-inner">
    <?php echo $faq['detail_th']; ?>
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


        <!-- 2.FAQ Knowledge & Learning -->
        <div id="view2" class="tabcontent">
            <img src="<?php echo Yii::t('language', '/img/headfaq2.png'); ?>" class="tabfaq">
            <div class="accordion" id="hideother2">
                <?php
//                if (Yii::app()->user->isAdmin()) {
//                echo CHtml::ajaxButton(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/2')), array('update' => '#edit2')
//                );
//                }
                ?>
                <div id="edit2">
                </div>
                <?php
                $i = 1;
                foreach ($faq2 as $faq) {
                    ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <p class="faqarrow"></p>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother2" href="#item2<?php echo $i; ?>">
                            <?php echo $faq['subject_th']; ?>
                            </a>
                            <?php
//                            echo CHtml::ajaxButton(Yii::t('language', 'แก้ไข'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/2/id/' . $faq['id'])), array('update' => '#edit2')
//                            );
//                            echo CHtml::button(Yii::t('language', 'ลบ'), array('submit' => CHtml::normalizeUrl(array('/faq/default/deleteFaq/id/' . $faq['id'])))
//                            );
                            ?>
                        </div>
                        <div id="item2<?php echo $i; ?>" class="accordion-body collapse <?php if ($i == 1) echo 'in';
                            else echo ''; ?>">
                            <div class="accordion-inner">
    <?php echo $faq['detail_th']; ?>
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


        <!-- 3.FAQ E-Dir -->
        <div id="view3" class="tabcontent">
            <img src="<?php echo Yii::t('language', '/img/headfaq3.png'); ?>" class="tabfaq">
            <div class="accordion" id="hideother3">
                <?php
//                if (Yii::app()->user->isAdmin()) {
//                echo CHtml::ajaxButton(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/3')), array('update' => '#edit3')
//                );
//                }
                ?>
                <div id="edit3">
                </div>
                <?php
                $i = 1;
                foreach ($faq3 as $faq) {
                    ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <p class="faqarrow"></p>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother3" href="#item3<?php echo $i; ?>">
                            <?php echo $faq['subject_th']; ?>
                            </a>
                            <?php
//                            echo CHtml::ajaxButton(Yii::t('language', 'แก้ไข'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/3/id/' . $faq['id'])), array('update' => '#edit3')
//                            );
//                            echo CHtml::button(Yii::t('language', 'ลบ'), array('submit' => CHtml::normalizeUrl(array('/faq/default/deleteFaq/id/' . $faq['id'])))
//                            );
                            ?>
                        </div>
                        <div id="item3<?php echo $i; ?>" class="accordion-body collapse <?php if ($i == 1) echo 'in';
                            else echo ''; ?>">
                            <div class="accordion-inner">
                    <?php echo $faq['detail_th']; ?>
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
                'pages' => $pages3,
            ));
            ?>
<!--            <img src="/img/iconpage/faq/faqbannerbottom.png" style="width: 100%;">-->
        </div>
        <!-- END 3.FAQ E-Dir -->

        <!-- 4.FAQ Web Simulation -->
        <div id="view4" class="tabcontent">
            <img src="<?php echo Yii::t('language', '/img/headfaq4.png'); ?>" class="tabfaq">
            <div class="accordion" id="hideother4">
                <?php
//                if (Yii::app()->user->isAdmin()) {
//                    echo CHtml::ajaxButton(Yii::t('language', 'เพิ่ม'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/4')), array('update' => '#edit4')
//                    );
//                }
                ?>
                <div id="edit4">
                </div>
                <?php
                $i = 1;
                foreach ($faq4 as $faq) {
                    ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <p class="faqarrow"></p>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#hideother4" href="#item4<?php echo $i; ?>">
                            <?php echo $faq['subject_th']; ?>
                            </a>
                            <?php
//                                echo CHtml::ajaxButton(Yii::t('language', 'แก้ไข'), CHtml::normalizeUrl(array('/faq/default/editFaq/fm_id/4/id/' . $faq['id'])), array('update' => '#edit4')
//                                );
//                                echo CHtml::button(Yii::t('language', 'ลบ'), array('submit' => CHtml::normalizeUrl(array('/faq/default/deleteFaq/id/' . $faq['id'])))
//                                );
                            ?>
                        </div>
                        <div id="item4<?php echo $i; ?>" class="accordion-body collapse <?php if ($i == 1) echo 'in';
                            else echo ''; ?>">
                            <div class="accordion-inner">
                    <?php echo $faq['detail_th']; ?>
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


    </div>
</div>
