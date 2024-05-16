<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<br><br>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Eventos</h4>
                        </div>
                        <div class="card-body">
                            <div id="external-events">
                                <div class="external-event bg-success">Cumpleaños</div>
                                <div class="external-event bg-warning">Decoración</div>
                                <div class="external-event bg-info">Confirmación</div>
                                <div class="external-event bg-primary">Primera Comunión</div>
                                <div class="external-event bg-danger">Grados</div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Crear Eventos</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <input id="new-event" type="text" class="form-control" placeholder="Nombre evento">
                                <div class="input-group-append">
                                    <button id="add-new-event" type="button" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Eliminar Eventos</h3>
                        </div>
                        <div class="card-body">
                            <div id="delete-event-area" class="p-3 mb-2 bg-danger text-white text-center">
                                Arrastra aquí para eliminar
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn-hover" onclick="window.location.href='{{ route('home') }}'">Ir a Home</button>

    </div>
    <style>
    .btn-hover {
        background-color: #d946ef;
        /* Color inicial del botón */
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        /* Suaviza la transición del color */
        position: fixed;
        /* Posición fija en la pantalla */
        bottom: 10px;
        /* Distancia desde el borde inferior */
        right: 10px;
        /* Distancia desde el borde derecho */
    }

    .btn-hover:hover {
        background-color: red;
        /* Color del botón al pasar el ratón */
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(function() {
        function initExternalEvents(ele) {
            ele.each(function() {
                var eventObject = {
                    title: $.trim($(this).text())
                };

                $(this).data('eventObject', eventObject);

                $(this).draggable({
                    zIndex: 1070,
                    revert: true,
                    revertDuration: 0
                });
            });
        }

        initExternalEvents($('#external-events div.external-event'));

        var currColor = '#3c8dbc';
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault();
            currColor = $(this).css('color');
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            });
        });

        $('#add-new-event').click(function(e) {
            e.preventDefault();
            var val = $('#new-event').val();
            if (val.length === 0) {
                return;
            }

            var event = $('<div />');
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event');
            event.html(val);
            $('#external-events').prepend(event);

            initExternalEvents(event);

            $('#new-event').val('');
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true,
            drop: function(date, allDay) {
                var originalEventObject = $(this).data('eventObject');
                var copiedEventObject = $.extend({}, originalEventObject);

                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                copiedEventObject.backgroundColor = $(this).css('background-color');
                copiedEventObject.borderColor = $(this).css('border-color');

                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                if ($('#drop-remove').is(':checked')) {
                    $(this).remove();
                }
            },
            eventDragStop: function(event, jsEvent, ui, view) {
                var trashEl = $('#delete-event-area');
                var ofs = trashEl.offset();

                var x1 = ofs.left;
                var x2 = ofs.left + trashEl.outerWidth(true);
                var y1 = ofs.top;
                var y2 = ofs.top + trashEl.outerHeight(true);

                if (jsEvent.pageX >= x1 && jsEvent.pageX <= x2 &&
                    jsEvent.pageY >= y1 && jsEvent.pageY <= y2) {
                    $('#calendar').fullCalendar('removeEvents', event._id);
                }
            }
        });
    });
    </script>

</body>

</html>