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
        var path = '/img/layout/' + getPathTheme(this.selectedItem.index);
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
            file = "TP015.jpg";
            break;
        case 2:
            file = "TP014.jpg";
            break;
        case 3:
            file = "TP013.jpg";
            break;
        case 4:
            file = "TP012.jpg";
            break;
        case 5:
            file = "TP011.jpg";
            break;
        case 6:
            file = "TP010.jpg";
            break;
        case 7:
            file = "TP009.jpg";
            break;
        case 8:
            file = "TP008.jpg";
            break;
        case 9:
            file = "TP007.jpg";
            break;
        case 10:
            file = "TP006.jpg";
            break;
        default:
            file = "";
    }
    return file;
}