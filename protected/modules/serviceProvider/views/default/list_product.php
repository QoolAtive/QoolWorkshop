<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
$detail = LanguageHelper::changeDB($data->detail, $data->detail_en);
?>
<style type="text/css">

</style>
<ul class="productlist ckfix">

    <li>
<img src="/file/product/<?php echo $data->image; ?>" alt="new product" width="100%">
<!-- 
  <img src="http://dev.dbd.qoolative.com/file/logo/default.jpg" width="100%"> -->
    </li>
    
    <li>
        <label style="font-size: 16px; font-weight: bold;color: #D69500;"><?php echo $name; ?></label>
                    <?php
    if (Yii::app()->user->isAdmin()) {
        ?>
        
            <?php
            echo CHtml::button(Yii::t('language', 'แก้ไข'), array(
                'class' => "grey right", // btnedit grey
//                'style' => 'margin-left: 669px; margin-top: 0px; position:absolute;',
                'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/serviceProvider/manage/insertProduct/id/' . $_GET['id'] . '/pro_id/' . $data->id
                )) . "'")
            );
            ?>
       
        <?php
    }//end if (Yii::app()->user->isAdmin()) {
    ?>

        <label><?php echo $detail; ?></label>
    </li>

</ul>
