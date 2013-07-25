<!--        About Us-->
<div id="view1">

    <div id="text" class="row-fluid ">
        <?php
        $model_text = About::model()->find();
        echo LanguageHelper::changeDB($model_text->about_text_th, $model_text->about_text_en);
        ?>
    </div>
</div>