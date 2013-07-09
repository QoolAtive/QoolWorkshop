<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
?>
<style>
    .boxdetail{
        display: inline-block; 
        width: 15%; 
        background-color: #111; 
        color: white; 
        font-weight: bold; 
        padding: 5px; 
        text-align: right;
    }
    .boxdetail2{
        display: inline-block; 
        background-color: #999999; 
        width: 79.4%; 
        color: white; 
        font-weight: bold; 
    }
    .boxdetail, .boxdetail2{
        padding: 12px;
    }
</style>
<div style="padding: 0px 5px;">
    <h3>รายละเอียดสมาชิก</h3>
    <hr>
    <div class="boxdetail" >ชื่อ - นามสกุล : </div>
    <div class="boxdetail2" ><?php echo $data['name']; ?></div>
    <div class="boxdetail" >เพศ : </div>
    <div class="boxdetail2" ><?php echo $data['sex']; ?></div>
    <?php if ($data['corporation_registration'] != null) { ?>
        <div class="boxdetail" >เลขนิติบุคคล : </div>
        <div class="boxdetail2" ><?php echo $data['corporation_registration']; ?></div>
    <?php } ?>

    <?php if ($data['commerce_registration'] != null) { ?>
        <div class="boxdetail" >เลขทะเบียนพาณิชย์ : </div>
        <div class="boxdetail2" ><?php echo $data['commerce_registration']; ?></div>
    <?php } ?>

    <?php if ($data['high_education'] != null) { ?>
        <div class="boxdetail" >วุฒิการศึกษา : </div>
        <div class="boxdetail2" ><?php echo $data['high_education']; ?></div>
    <?php } ?>

    <?php if ($data['member_type'] != null) { ?>
        <div class="boxdetail" >ประเภทสมาชิก : </div>
        <div class="boxdetail2" ><?php echo $data['member_type']; ?></div>
    <?php } ?>

    <?php if ($data['panit'] != 0 || $data['panit'] = null) { ?>
        <div class="boxdetail" >เลขทะเบียนพาณิชย์ : </div>
        <div class="boxdetail2" ><?php echo $data['panit']; ?></div>
    <?php } ?>

    <?php if ($data['businessType'] != null) { ?>
        <div class="boxdetail" >ประเภทธุรกิจ : </div>
        <div class="boxdetail2" ><?php echo $data['businessType']; ?></div>
    <?php } ?>

    <?php if ($data['productName'] != null) { ?>
        <div class="boxdetail" >ชื่อสินค้า : </div>
        <div class="boxdetail2" ><?php echo $data['productName']; ?></div>
    <?php } ?>

    <div class="boxdetail" >ที่อยู่ : </div>
    <div class="boxdetail2" ><?php echo $data['address']; ?></div>

    <?php if ($data['tel'] != null) { ?>
        <div class="boxdetail" >โทรศัพท์ : </div>
        <div class="boxdetail2" ><?php echo $data['tel']; ?></div>
    <?php } ?>

    <?php if ($data['mobile'] != null) { ?>
        <div class="boxdetail" >มือถือ : </div>
        <div class="boxdetail2" ><?php echo $data['mobile']; ?></div>
    <?php } ?>

    <?php if ($data['fax'] != null) { ?>
        <div class="boxdetail" >แฟกช์ : </div>
        <div class="boxdetail2" ><?php echo $data['fax']; ?></div>
    <?php } ?>

    <?php if ($data['facebook'] != null) { ?>
        <div class="boxdetail" >เฟสบุค : </div>
        <div class="boxdetail2" ><?php echo $data['facebook']; ?></div>
    <?php } ?>

    <?php if ($data['twitter'] != null) { ?>
        <div class="boxdetail" >ทวิตเตอร์ : </div>
        <div class="boxdetail2" ><?php echo $data['twitter']; ?></div>
    <?php } ?>
</div>
<hr>
<div style="text-align: center;">
    <?php
    if (isset($confirm)) {
        echo CHtml::button(Yii::t('language', 'ยืนยันสมาชิก'), array(
            'onclick' => "window.location='" . CHtml::normalizeUrl(array(
                '/member/manage/allowMember/id/' . $confirm->user_id)) . "'"
            , 'confirm' => Yii::t('language', 'คุณต้องการยืนยันสมาชิกหรือไม่?'))
        );
    }
    echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
            '/member/manage/admin'
        )) . "'")
    );
    ?>
</div>