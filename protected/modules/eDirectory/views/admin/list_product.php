<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$detail = LanguageHelper::changeDB($data->detail, $data->detail_en);
?>
<style type="text/css">

</style>
<ul class="productlist">

    <li>
        <?php
        if ($data->pic == null) {
            ?>
            <img src="/file/product/default.jpg" alt="new product" width="100%">
            <?php
        } else {
            ?>
            <img src="/file/product/<?php echo $data->pic; ?>" alt="new product" width="100%">
            <?php
        }
        ?>
        <!-- 
          <img src="http://dev.dbd.qoolative.com/file/logo/default.jpg" width="100%"> -->
    </li>

    <li>
        <label style="font-size: 16px; font-weight: bold;color: #D69500;"><?php echo $name; ?></label>
        <?php
        if ($user_id == Yii::app()->user->id) {
            echo CHtml::button(Yii::t('language', 'แก้ไข'), array(
                'class' => "grey right", // btnedit grey
//                'style' => 'margin-left: 669px; margin-top: 0px; position:absolute;',
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/eDirectory/admin/insertProduct/id/' . $_GET['id'] . '/pro_id/' . $data->id. '/page/detail'
                )) . "'")
            );
            ?>

            <?php
        }//end if (Yii::app()->user->isAdmin()) {
        ?>

        <label><?php echo $detail; ?></label>
    </li>

</ul>
