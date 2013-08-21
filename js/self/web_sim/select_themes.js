var List = {
    init: function() {
        this.selectedItem = null;
    },
    select: function(i, t) {
        if (this.selectedItem) {
            this.selectedItem.item.className = "";
            this.selectedItem.text.className = "show_bg";
        }
        var o = document.getElementById("tp" + i);
        if (o) {
            o.className = "selected";
            t.className = "show_bg selectedTemp";
        }
        this.selectedItem = {index: i, item: o, text: t};
        var input = document.getElementById("selectedItem");
//            alert(this.selectedItem.index);
        var path = getPathTheme(this.selectedItem.index);
        $('#theme').val(path);
//            if (input)
//                input.value = i;
    }
};
$(function() {
    List.init();
});
function getPathTheme(index) {
    var file;
    switch (index)
    {
        case 1:
            file = "tp001";
            break;
        case 2:
            file = "tp002";
            break;
        case 3:
            file = "tp003";
            break;
        case 4:
            file = "tp004";
            break;
        case 5:
            file = "tp005";
            break;
        case 6:
            file = "tp006";
            break;
        case 7:
            file = "tp007";
            break;
        case 8:
            file = "tp008";
            break;
        case 9:
            file = "tp009";
            break;
        case 10:
            file = "tp010";
            break;
        default:
            file = "";
    }
    return file;
}