$(document).ready(function() {
    $("#WebShop_province_id").change(function() {
        $("#WebShop_district_id option:eq(0)").attr("selected", "selected");
    });
});