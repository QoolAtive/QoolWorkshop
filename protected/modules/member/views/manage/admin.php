<?php

//echo ChangeUser('test', '', array('1', '2'), 1);
?>
<script type="text/javascript">

    $(document).ready(function() {
        $('.view').fancybox({
            type: 'ajax',
            autoSize: false,
            width: '700',
            height: 'auto',
            closeBtn: false


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
            <li><a href="#" class="selected"><?php echo Yii::t("language", 'จัดการสมาชิก'); ?></a></li>
<!--            <li><a href="#" rel="view2"><?php // echo Yii::t("language", 'สมาชิกที่ลงทะเบียน');        ?></a></li>
            <li><a href="#" rel="view3"><?php // echo Yii::t("language", 'สมาชิกบุคคลธรรมดา');        ?></a></li>-->
        </ul>
    </div>
</div>
<div class="content">
    <div class="tabcontents">

        <h3 class="barH3">
            <span>
                <i class="icon-user"></i>
                <a href="<?php echo CHtml::normalizeUrl(array("/member/manage/admin")); ?>">
                    <?php echo Yii::t('language', 'ตั้งค่าเว็บไซต์'); ?>
                </a>
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'จัดการ') . Yii::t('language', 'สมาชิก'); ?>
            </span>
        </h3>
        <?php
        $tabs = array();

        $tabs[Yii::t('language', 'สมาชิกนิติบุคคลทั้งหมดที่ยังไม่ได้รับการยืนยัน')] = array(
            'id' => 'tab01',
            'content' =>
            $this->renderPartial('_admin_grid_view', array(
                'dataProvider' => $model->getRegistration(),
                'model' => $model,
                    ), true, false),
        );
        $tabs[Yii::t('language', 'สมาชิกนิติบุคคลทั้งหมด')] = array(
            'id' => 'tab02',
            'content' =>
            $this->renderPartial('_admin_grid_view_1', array(
                'dataProvider' => $model->getDataRegistration(),
                'model' => $model,
                    ), true, false),
        );
        $tabs[Yii::t('language', 'สมาชิกบุคคลธรรมดาทั้งหมด')] = array(
            'id' => 'tab03',
            'content' =>
            $this->renderPartial('_admin_grid_view_2', array(
                'dataProvider' => $model->getDataPerson(),
                'model' => $model,
                    ), true, false),
        );
        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs' => $tabs,
            'options' => array(
                'collapsible' => false,
            ),
            'id' => 'tab_all',
        ));
        ?>
        <div style="text-align: center; padding: 10px;">
            <?php
            echo CHtml::button(Yii::t('language', 'ย้อนกลับ'), array('onClick' => "window.location='" . CHtml::normalizeUrl(array(
                    '/member/manage/profile'
                )) . "'")
            );
            ?>
        </div>
    </div>
</div>