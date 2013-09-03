<script type="text/javascript">
    
    $(document).ready(function() {
        $('.view').fancybox({
          type : 'ajax',
          autoSize    : false,
          width     : '700',
        height      : 'auto',
        closeBtn        : false

      
        });
});
</script>
<style type="text/css">
    
    .fancybox-title-float-wrap .child{
        display: none;
    }
</style>

<div class="sidebar">
    <div class="menuitem">
        <ul>
            <li class="boxhead"><img src="<?php echo Yii::t("language", '/img/iconpage/Member.png'); ?>"/></li>
        </ul>
        <ul class="tabs clearfix">
            <li><a href="#" rel="view1"><?php echo Yii::t("language", 'ยืนยันการสมัครสมาชิก'); ?></a></li>
            <li><a href="#" rel="view2"><?php echo Yii::t("language", 'สมาชิกที่ลงทะเบียน'); ?></a></li>
            <li><a href="#" rel="view3"><?php echo Yii::t("language", 'สมาชิกบุคคลธรรมดา'); ?></a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">
        <div id="view1" class="tabcontent">
                <h3 class="barH3">
        <span>
            <i class="icon-user"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/admin")); ?>">
                <?php echo Yii::t('language', 'สมาชิก'); ?>
            </a>
            <i class="icon-chevron-right"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/admin")); ?>">
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สมาชิก'); ?>
            </a>
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'สมาชิกนิติบุคคลทั้งหมดที่ยังไม่ได้รับการยืนยัน'); ?>
        </span>
    </h3>
            <?php
            echo $this->renderPartial('_admin_grid_view', array(
                'dataProvider' => $model->getRegistration(),
                'model' => $model,
            ));
            ?>
            <div style="text-align: center;">
                <?php
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/profile'
                    )) . "'")
                );
                ?>
            </div>
        </div>
        <div id="view2" class="tabcontent">
    <h3 class="barH3">
        <span>
            <i class="icon-user"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/admin")); ?>">
                <?php echo Yii::t('language', 'สมาชิก'); ?>
            </a>
            <i class="icon-chevron-right"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/admin")); ?>">
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สมาชิก'); ?>
            </a>
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'สมาชิกนิติบุคคลทั้งหมด'); ?>
        </span>
    </h3>

            <?php
            echo $this->renderPartial('_admin_grid_view', array(
                'dataProvider' => $model->getDataRegistration(),
                'model' => $model,
            ));
            ?>
            <div style="text-align: center;">
                <?php
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array(
                    'onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/profile'
                    )) . "'")
                );
                ?>
            </div>
        </div>
        <div id="view3" class="tabcontent">
          
                <h3 class="barH3">
        <span>
            <i class="icon-user"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/admin")); ?>">
                <?php echo Yii::t('language', 'สมาชิก'); ?>
            </a>
            <i class="icon-chevron-right"></i>
            <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/admin")); ?>">
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สมาชิก'); ?>
            </a>
            <i class="icon-chevron-right"></i><?php echo Yii::t('language', 'สมาชิกบุคคลธรรมดาทั้งหมด'); ?>
        </span>
    </h3>

            <?php
            echo $this->renderPartial('_admin_grid_view', array(
                'dataProvider' => $model->getDataPerson(),
                'model' => $model,
            ));
            ?>
            <div style="text-align: center;">
                <?php
                echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                        '/member/manage/profile'
                    )) . "'")
                );
                ?>
            </div>
        </div>
    </div>
</div>