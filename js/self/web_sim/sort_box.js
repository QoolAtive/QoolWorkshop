$(function() {
    $("#sortable").sortable({
        update: function(event, ui) {
            var result = $(this).sortable('toArray');
            $('#sort_arr').val(result);
//            alert(result);
        }
    });
    $("#sortable").disableSelection();
});