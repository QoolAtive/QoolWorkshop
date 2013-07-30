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
                center: '',
                right: 'month,basicWeek,basicDay prev,next today'
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
                    },
<?php } ?>
            ], //END events: [

        }); //END $('#calendar').fullCalendar({
    });
</script>
<!--END Calendar-->