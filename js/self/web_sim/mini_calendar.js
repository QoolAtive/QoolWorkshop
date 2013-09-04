// FullCalendar v1.5
// Script modified from the "theme.html" demo file

$(document).ready(function() {

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev',
            center: 'title',
            right: 'today next'
            //right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        
    });

});