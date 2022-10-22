//
// ──────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: C A L E N D A R    A C T I O N : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────
//


$(document).ready(function() {

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: function(start, end, timezone, callback) {
                $.ajax({
                url: './ajax/event.ajax.php',
                dataType: 'json',
                    success: function(data) {
                        var events = [];
                        console.log(data);
                        for (var i=0; i<data.length; i++){
                            events.push({
                                title: data[i]['title'],
                                start: data[i]['start_event'],
                                end: data[i]['end_event'],
                                className: 'bg-'+data[i]['color_event']
                            });
                            
                        }
    
                        //adding the callback
                        callback(events);
                        iziToast.show({
                            icon: 'fa fa-calendar',
                            title: 'Event Calendar',
                            message: 'Loading Completed!',
                            theme: 'light',
                            position: 'topCenter',
                        });
                    }
                });
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
    });



});