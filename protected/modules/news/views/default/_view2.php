<!--Calendar-->
<div id="view2">
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
    ?>
                    {
                        id: <?php echo $train['id']; ?>,
                        title: '<?php echo $train['subject_th']; ?>',
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