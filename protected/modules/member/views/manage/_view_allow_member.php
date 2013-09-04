<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
?>
<style>
    #header,#footer{
        display: none;
    }
    .boxdetail{
        display: inline-block; 
        width: 16%; 
        background-color: #eee; 
        color: #000;
        font-weight: bold; 
        padding: 5px; 
        text-align: right;
    }
    .boxdetail2{
        background: none repeat scroll 0 0 #EEEEEE;
        color: #222222;
        display: inline-block;
        font-weight: normal;
        width: 76%;
    }    
    .boxdetail, .boxdetail2{
        padding: 12px;
    }

</style>

<div style="padding: 0px 5px;">
    <h3><?php echo Yii::t('language', 'รายละเอียดสมาชิก'); ?></h3>
    <hr>
    <div class="boxdetail" ><?php echo Yii::t('language', 'ชื่อ') . ' - ' . Yii::t('language', 'นามสกุล') . ' : '; ?></div>
    <div class="boxdetail2" ><?php echo $data['name']; ?></div>
    
    <div class="boxdetail" ><?php echo Yii::t('language', 'เพศ') . ' : '; ?></div>
    <div class="boxdetail2" ><?php echo $data['sex']; ?></div>
    <?php if ($data['corporation_registration'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'เลขนิติบุคคล') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['corporation_registration']; ?></div>
    <?php } ?>

    <?php if ($data['commerce_registration'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'เลขทะเบียนพาณิชย์') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['commerce_registration']; ?></div>
    <?php } ?>

    <?php if ($data['high_education'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'วุฒิการศึกษา') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['high_education']; ?></div>
    <?php } ?>

    <?php if ($data['member_type'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'ประเภทสมาชิก') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['member_type']; ?></div>
    <?php } ?>

    <?php if ($data['panit'] != 0 || $data['panit'] = null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'เลขทะเบียนพาณิชย์') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['panit']; ?></div>
    <?php } ?>

    <?php if ($data['businessType'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'ประเภทธุรกิจ') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['businessType']; ?></div>
    <?php } ?>

    <?php if ($data['productName'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'ชื่อสินค้า') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['productName']; ?></div>
    <?php } ?>

    <?php if ($data['email'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'อีเมล์') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['email']; ?></div>
    <?php } ?>

    <div class="boxdetail" ><?php echo Yii::t('language', 'ที่อยู่') . ' : '; ?></div>
    <div class="boxdetail2" ><?php echo $data['address']; ?></div>

    <?php if ($data['tel'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'โทร.') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['tel']; ?></div>
    <?php } ?>

    <?php if ($data['mobile'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'มือถือ') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['mobile']; ?></div>
    <?php } ?>

    <?php if ($data['fax'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'โทรสาร.') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['fax']; ?></div>
    <?php } ?>

    <?php if ($data['facebook'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'เฟซบุ๊ก') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['facebook']; ?></div>
    <?php } ?>

    <?php if ($data['twitter'] != null) { ?>
        <div class="boxdetail" ><?php echo Yii::t('language', 'ทวิตเตอร์') . ' : '; ?></div>
        <div class="boxdetail2" ><?php echo $data['twitter']; ?></div>
    <?php } ?>


</div>
<!-- <hr> -->
<div style="text-align: center; margin-top: 15px;">
    <?php
    if (isset($confirm)) {
        echo CHtml::button(Yii::t('language', 'ยืนยันสมาชิก'), array(
            'onclick' => "if(confirm(" . Yii::t('language', 'คุณต้องการยืนยันสมาชิกหรือไม่?') . "){
                            window.location='" . CHtml::normalizeUrl(array('/member/manage/allowMember/id/' . $confirm->user_id)) . "' 
                        }"
                )
        );
    }

    //  if (isset($confirm)) {
    //     echo CHtml::button(Yii::t('language', 'ยืนยันสมาชิก'), array(
    //         'onclick' => "window.location='" . CHtml::normalizeUrl(array(
    //             '/member/manage/allowMember/id/' . $confirm->user_id)) . "'"
    //         ,'confirm' => Yii::t('language', 'คุณต้องการยืนยันสมาชิกหรือไม่?'))
    //     );
    // }

    if ($data['memType'] == '1')
        $linkBack = '/member/manage/admin#view3';
    else
        $linkBack = '/member/manage/admin#view2';

    // echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
    //         $linkBack
    //     )) . "'")
    // );
    ?>
</div>