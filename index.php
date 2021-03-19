<?php
//index.php




?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="node_modules/js/script.js"></script>
    <script src="fullcalendar/locale/fr.js"></script>
    <script>
        $(document).ready(function() {

            var calendar = $('#calendar').fullCalendar({
                locale: 'fr',
                eventTextColor: 'white',
                eventBorderColor: 'rgb(61, 152, 255)',
                defaultView: 'month',
                editable: true,
                customButtons: {
                    myCustomButton: {
                        text: 'Créer RDV',
                        click: function(event) {
                            $(".modal").modal("show");

                            ;
                        },
                    },
                },


                header: {
                    left: 'prev,next today,myCustomButton, myCustomButton1',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                events: 'load.php',
                // eventColor: 'red',
                selectable: true,
                selectHelper: true,
                weekNumbers: true,
                editable: true,
                navLinks: true,
                eventLimit: true,
                eventResize: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        // success: function() {
                        //     calendar.fullCalendar('refetchEvents');
                        //     alert('Evenement mis a jour');
                        // }
                    })
                },

                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    var color = event.color;
                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            color: color,
                        },
                        // success: function() {
                        //     calendar.fullCalendar('refetchEvents');
                        //     alert("Evenement mis a jour");
                        // }
                    });
                },

                eventClick: function(event) {
                    if (confirm("Êtes-sur sûr de vouloir supprimer?")) {
                        var id = event.id;
                        $.ajax({
                            url: "delete.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                // alert("Evenement supprimé");
                            }
                        })
                    }
                },

            });
        });
    </script>

    <?php
    // include './assets/js/scriptbefore.html';
    include './assets/css/css_agenda.html';
    ?>
</head>

<body>
    <?php
    include './templates/header.html';

    ?>
    <div class="container">
        <div class="row col-12 d-flex justify-content-center">
            <div id="calendar" style=" width: 100%; background: rgb(61, 152, 255); margin:0; padding:0; margin-left: 11vw; margin-top: 7vh;"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body flex justify-content-end">
                    <form class="was-validated" action="insert.php" method="POST">
                        <div class="col-md-4">
                            <label for="validationServer02" class="form-label">Description</label>
                            <input type="text" class="form-control is-valid" id="validationServer02" name="title" required>
                        </div>
                        <div class="col-6 align-items-center justify-content-end">
                            <label for="event_start" class="form-label col-2">Rdv Démarre</label>
                            <input type="datetime-local" class="form-control is-valid" id="name" name="start_event" required>
                        </div>
                        <div class="col-6 align-items-center justify-content-end">
                            <label for="event_start" class="form-label col-2">Rdv Fin</label>
                            <input type="datetime-local" class="form-control is-valid" id="name" name="end_event" required>
                        </div>
                        <select class="col-6 form-select is-invalid" aria-label="Choisissez l'intervenant" name="color" required>
                            <option selected>Attribuer RDV</option>
                            <option value="#EB8A76">Dominique</option>
                            <option value="#8CCE8B">Loic</option>
                        </select>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                    <!-- <form action="insert.php" method="POST">
                            <div class="col-12 d-md-flex align-items-center justify-content-between">
                                <label for="title" class="form-label col-2">Title</label>
                                <input class="form-control" type="text" id="last" name="title">
                            </div> -->

                </div>
            </div>
        </div>


        <div>
        </div>

</body>

</html>