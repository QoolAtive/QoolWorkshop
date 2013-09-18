<!--        About Us-->
<div id="view1">
    <div id="text" class="_100">
        <h3 class="barH3">
            <span>
                <i class="icon-home"></i> 
                <?php echo Yii::t('language', 'เกี่ยวกับเรา'); ?>
            </span>
        </h3>
        <?php
        $model_text = About::model()->find();
        echo LanguageHelper::changeDB($model_text->about_text_th, $model_text->about_text_en);
        ?>
    </div>
</div>