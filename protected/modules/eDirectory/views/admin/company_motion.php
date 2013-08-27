<script type="text/javascript">
    $(function() {
        $('#check_all').click(function() {
            $('input:checkbox').each(function(index) {
                $(this).attr('checked', true);
            });
        });

        $('#uncheck_all').click(function() {
            $('input:checkbox').each(function(index) {
                $(this).attr('checked', false);
            });
        });
    });
</script>
<?php
$this->renderPartial('side_bar', array(
    'active' => 3,
));
?>
<div class="content">
    <div class="tabcontents">
        <h3 class="barH3">
            <span>
                <i class="icon-home"></i>
                <?php
                echo CHtml::link(Yii::t('language', 'จัดการ') . Yii::t('language', 'ร้านค้า'), array('/eDirectory/admin/index'));
                ?>        
                <i class="icon-chevron-right"></i>
                <?php echo Yii::t('language', 'ความเคลื่อนไหว'); ?>   
            </span>
        </h3>
        <!--<div id='show_detail' class='clearfix'></div>-->
        <div style='border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center; margin-bottom: 10px;'>
            <?php
            $date_motion = CompanyMotionSetting::model()->find('`use`=:use', array(':use' => 1));
            $data_motion = $date_motion->amount . ' ' . Yii::t('language', $date_motion->type);
            echo Yii::t('language', 'ร้านค้าที่ข้อมูลไม่มีการอัพเดทเกิน') . ' ' . $data_motion;
            ?>
        </div>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'company_motion-form'
        ));
        ?>

        <div>
            <?php
            echo CHtml::button(Yii::t('language', 'เลือกทั้งหมด'), array(
                'id' => 'check_all'
            ));
            echo CHtml::button(Yii::t('language', 'ไม่เลือกทั้งหมด'), array(
                'id' => 'uncheck_all'
            ));
            ?>
        </div>
        <?php
        $this->renderPartial('company_motion_grid', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
        ?>
        <div class="textcenter">
            <hr>
            <?php
//            echo CHtml::ajaxSubmitButton(Yii::t('language', 'แจ้งเตือน'), CHtml::normalizeUrl(array(
//                        '/eDirectory/admin/companyMotionAlert',
//                    )), array(
//                'update' => 'div#show_detail',
//            ));

            echo CHtml::button(Yii::t('language', 'แจ้งเตือน'), array('submit' => CHtml::normalizeUrl(array(
                    '/eDirectory/admin/companyMotionAlert',
                ))
            ));

            echo CHtml::button(Yii::t('language', 'บล็อกร้านค้า'), array('submit' => CHtml::normalizeUrl(array(
                    '/eDirectory/admin/companyMotionBlock'
                ))
            ));
            ?>
            <hr>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
