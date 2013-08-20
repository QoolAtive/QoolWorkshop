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
$list = array(
    array('text' => Yii::t('language', 'ร้านค้าทั้งหมด'), 'link' => '/eDirectory/admin/index', 'select' => ''),
    array('text' => Yii::t('language', 'ร้านค้าที่ยังไม่ได้รับการอนุมัติ'), 'link' => '/eDirectory/admin/companyWaiting', 'select' => ''),
    array('text' => Yii::t('language', 'ความเคลื่อนไหว'), 'link' => '#', 'select' => 'selected'),
    array('text' => Yii::t('language', 'ตั้งค่าความเคลื่อนไหว'), 'link' => '/eDirectory/admin/motionSetting', 'select' => ''),
);

$this->renderPartial('side_bar', array(
    'list' => $list,
));
?>
<div class="content">
    <div class="tabcontents">
        <div id='show_detail' class='clearfix'></div>
        <hr>
        <div style='border: 1px solid red; padding: 10px 5px; color: red; font-weight: bold; background-color: pink; text-align: center;'>
            <?php
            $date_motion = CompanyMotionSetting::model()->find('`use`=:use', array(':use' => 1));
            $data_motion = $date_motion->amount . ' ' . Yii::t('language', $date_motion->type);
            echo Yii::t('language', 'ร้านค้าที่ข้อมูลไม่มีการอัพเดทเกิน') . ' ' . Yii::t('language', $data_motion);
            ?>
        </div>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'company_motion-form'
        ));
        ?>
        <hr>
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

            echo CHtml::button(Yii::t('language', 'บล๊อคร้านค้า'), array('submit' => CHtml::normalizeUrl(array(
                    '/eDirectory/admin/companyMotionBlock'
                ))
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
