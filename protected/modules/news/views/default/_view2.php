<!--Calendar-->
<div id="view2">
    <h3><i class='icon-calendar-empty'></i> <?php echo Yii::t('language', 'ปฏิทิน'); ?></h3>
    <div class="row-fluid">
        <div id="calendar"></div>
    </div>
</div>


<script>
    // Full Calendar
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'title',
//                left: 'หัวข้อ',
                center: '',
                right: 'month,basicWeek,basicDay prev,next today'
            },
            monthNames: [
                '<?php echo Yii::t('language', 'มกราคม'); ?>',
                '<?php echo Yii::t('language', 'กุมภาพันธ์'); ?>',
                '<?php echo Yii::t('language', 'มีนาคม'); ?>',
                '<?php echo Yii::t('language', 'เมษายน'); ?>',
                '<?php echo Yii::t('language', 'พฤษภาคม'); ?>',
                '<?php echo Yii::t('language', 'มิถุนายน'); ?>',
                '<?php echo Yii::t('language', 'กรกฎาคม'); ?>',
                '<?php echo Yii::t('language', 'สิงหาคม'); ?>',
                '<?php echo Yii::t('language', 'กันยายน'); ?>',
                '<?php echo Yii::t('language', 'ตุลาคม'); ?>',
                '<?php echo Yii::t('language', 'พฤศจิกายน'); ?>',
                '<?php echo Yii::t('language', 'ธันวาคม'); ?>'
            ],
            monthNamesShort: [
                '<?php echo Yii::t('language', 'ม.ค.'); ?>',
                '<?php echo Yii::t('language', 'ก.พ.'); ?>',
                '<?php echo Yii::t('language', 'มี.ค.'); ?>',
                '<?php echo Yii::t('language', 'เม.ย.'); ?>',
                '<?php echo Yii::t('language', 'พ.ค.'); ?>',
                '<?php echo Yii::t('language', 'มิ.ย.'); ?>',
                '<?php echo Yii::t('language', 'ก.ค.'); ?>',
                '<?php echo Yii::t('language', 'ส.ค.'); ?>',
                '<?php echo Yii::t('language', 'ก.ย.'); ?>',
                '<?php echo Yii::t('language', 'ต.ค.'); ?>',
                '<?php echo Yii::t('language', 'พ.ย.'); ?>',
                '<?php echo Yii::t('language', 'ธ.ค.'); ?>'
            ],
            dayNames: [
                '<?php echo Yii::t('language', 'อาทิตย์'); ?>',
                '<?php echo Yii::t('language', 'จันทร์'); ?>',
                '<?php echo Yii::t('language', 'อังคาร'); ?>',
                '<?php echo Yii::t('language', 'พุธ'); ?>',
                '<?php echo Yii::t('language', 'พฤหัสบดี'); ?>',
                '<?php echo Yii::t('language', 'ศุกร์'); ?>',
                '<?php echo Yii::t('language', 'เสาร์'); ?>'
            ],
            dayNamesShort: [
                '<?php echo Yii::t('language', 'อา.'); ?>',
                '<?php echo Yii::t('language', 'จ.'); ?>',
                '<?php echo Yii::t('language', 'อ.'); ?>',
                '<?php echo Yii::t('language', 'พ.'); ?>',
                '<?php echo Yii::t('language', 'พฤ.'); ?>',
                '<?php echo Yii::t('language', 'ศ.'); ?>',
                '<?php echo Yii::t('language', 'ส.'); ?>'
            ],
            buttonText: {
                prev: "<span class='fc-text-arrow'>&lsaquo;</span>",
                next: "<span class='fc-text-arrow'>&rsaquo;</span>",
                prevYear: "<span class='fc-text-arrow'>&laquo;</span>",
                nextYear: "<span class='fc-text-arrow'>&raquo;</span>",
                today: '<?php echo Yii::t('language', 'วันนี้'); ?>',
                month: '<?php echo Yii::t('language', 'เดือน'); ?>',
                week: '<?php echo Yii::t('language', 'สัปดาห์'); ?>',
                day: '<?php echo Yii::t('language', 'วัน'); ?>'
            },
            titleFormat: {
                month: 'MMMM <?php echo Yii::t('language', 'yyyyth'); ?>',
                week: "MMM d[ <?php echo Yii::t('language', 'yyyyth'); ?>]{ '&#8212;'[ MMM] d <?php echo Yii::t('language', 'yyyyth'); ?>}",
                day: 'dddd, MMM d, <?php echo Yii::t('language', 'yyyyth'); ?>'
            },
            columnFormat: {
                month: 'ddd',
                week: 'ddd M/d',
                day: 'dddd M/d'
            },
            eventClick: function(event) {
                window.location.href = event.url;
                location.reload();
//                return false;
            },
            events: [
<?php
foreach ($trainlist as $train) {
    $subject = LanguageHelper::changeDB($train['subject_th'], $train['subject_en']);
    ?>
                    {
                        id: <?php echo $train['id']; ?>,
                        title: '<?php echo $subject; ?>',
                        start: '<?php echo $train['start_at']; ?>',
                        end: '<?php echo $train['end_at']; ?>',
                        url: '<?php echo CHtml::normalizeUrl(array('/news/default/index/view/3#' . $train['id'])); ?>',
                        backgroundColor: '<?php echo $train['event_color']; ?>',
                    },
<?php } ?>
            ], //END events: [
            
        }); //END $('#calendar').fullCalendar({
    });
</script>
<!--END Calendar-->