<?php
$faq_main_list = FaqMain::model()->findAll(array('order' => 'order_n'));
$select_main = '';
$select_sub = '';
if ($select == 'main') {
    $select_main = 'class="selected"';
    $select_sub = 'menuactive listactive';
}
?>
<style>
    ul ul {
        margin: 0 0 0 2em;
    }
</style>
<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t('language', '/img/iconpage/faq.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="/faq/default/index" rel="view1"><?php echo Yii::t('language', 'คำถาม'); ?></a></li>
            <?php
            if (Yii::app()->user->isAdmin()) {
                echo "<li class='selected'>";
                echo CHtml::link(Yii::t('language', 'จัดการ') . '<br />' . Yii::t('language', 'คำถาม'), array(
                    '/faq/manage/manageCategory'), array('rel' => 'view2'));
                echo "</li>";
            }
            ?>

        </ul>
        <!--จัดการคำถาม-->
        <?php if (Yii::app()->user->isAdmin()) { ?>
            <div class="textcenter" style="   background: none repeat scroll 0 0 #F1F1F1;
                 border-top: 2px solid gold;
                 font-size: 16px;
                 margin-top: 6px;
                 padding: 14px 0;">  
                <p style="font-weight: bold;"> <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'คำถาม'); ?> </p>
            </div>
            <ul class="rectangle-list">
                <p class="demoline"></p>
                <li>
                    <?php
                    echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'หมวดหมู่คำถาม'), CHtml::normalizeUrl(
                                    array('/faq/manage/manageCategory')), array(
                        'rel' => 'view_edit_sub',
                        'class' => $select_sub,
                    ));
                    ?>
                </li>
                <?php
                foreach ($faq_main_list as $faq_main) {
                    ?>
                    <li>
                        <?php
                        $select = '';
                        if ($faq_main['id'] == $main_id) {
                            $select = 'menuactive listactive';
                        }
                        $name = LanguageHelper::changeDB($faq_main['name_th'], $faq_main['name_en']);
                        echo CHtml::link(Yii::t('language', 'จัดการ') . $name, CHtml::normalizeUrl(
                                        array('/faq/manage/manageFaq', 'main_id' => $faq_main['id'])), array(
                            'rel' => 'view_edit' . $faq_main['id'],
                            'class' => $select,
                        ));
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        <?php } ?>   
    </div>
</div>
