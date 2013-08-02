$(document).ready(function() {
    $("#WebShop_province_id").change(function() {
        $("#WebShop_district_id option:eq(0)").attr("selected", "selected");
    });
    $("#WebShop_name_en").change(function() {
        $("#WebShop_url").val('http://www.dbd.go.th/' + $("#WebShop_name_en").val());
        $("#url").val('http://www.dbd.go.th/' + $("#WebShop_name_en").val());
    });
});