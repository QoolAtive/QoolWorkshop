$(function() {
    $("#select_item").sortable({
        connectWith: ".connectedSortable",
        create: function(event, ui) {
            var result = $(this).sortable('toArray');
            $('#select').val(result);
//            alert(result);
        },
        update: function(event, ui) {
            var result = $(this).sortable('toArray');
            $('#select').val(result);
//            alert(result);
        }
    }).disableSelection();
    $("#all_item").sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();
//    $("#select_item, #all_item").disableSelection();
});