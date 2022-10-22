//
// ──────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: C A L E N D A R    A C T I O N : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────
//


$(document).ready(function() {

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: '',
    });


    
    

});