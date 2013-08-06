<!--        About Us-->
<div id="view1">

    <div id="text" class="_100">
    	<h3><i class="icon-home"></i>เกี่ยวกับเรา</h3>
        <?php
        $model_text = About::model()->find();
        echo LanguageHelper::changeDB($model_text->about_text_th, $model_text->about_text_en);
        ?>
    </div>
</div>