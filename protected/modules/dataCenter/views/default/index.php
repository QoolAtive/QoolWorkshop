<ul class="btnMangae">
    <li><?php echo CHtml::link('ระดับการศึกษา', array('/dataCenter/default/highEducation')); ?></li>
    <li><?php echo CHtml::link('ประเภทธุรกิจ', array('/dataCenter/default/companyTypeBusiness')); ?></li>
    <li><?php echo CHtml::link('เพศ', array('/dataCenter/default/sex')); ?></li>
    <li><?php echo CHtml::link('คำนำหน้า', array('/dataCenter/default/titleName')); ?></li>
</ul>
<div class="btnForm" style="text-align: center;"> 
    <?php
    echo CHtml::button('ย้อนกลับ', array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
            '/member/manage/profile'
        )) . "'")
    );
    ?>
</div>