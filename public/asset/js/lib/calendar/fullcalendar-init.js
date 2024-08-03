!function ($) {
    "use strict";

    var CalendarApp = function () {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
            this.$event = ('#external-events div.external-event'),
            this.$calendar = $('#calendar'),
            this.$saveCategoryBtn = $('.save-category'),
            this.$categoryForm = $('#add-category form'),
            this.$extEvents = $('#external-events'),
            this.$calendarObj = null
    };

    CalendarApp.prototype.onDrop = function (eventObj, date) {
        var $this = this;
        var originalEventObject = eventObj.data('eventObject');
        var $categoryClass = eventObj.attr('data-class');
        var copiedEventObject = $.extend({}, originalEventObject);
        copiedEventObject.start = date;
        if ($categoryClass)
            copiedEventObject['className'] = [$categoryClass];
        $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
        if ($('#drop-remove').is(':checked')) {
            eventObj.remove();
        }
    };

    CalendarApp.prototype.onEventClick = function (calEvent, jsEvent, view) {
        var $this = this;
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var eventId = calEvent.id;
        if (!eventId) {
            console.error('Event ID is undefined');
            return;
        }

        // Fetch the specific event data
        $.ajax({
            url: '/get-events', // URL to fetch event data
            method: 'GET',
            success: function (data) {
                console.log("Fetched events data:", data); // Debug: Log fetched events data

                var eventData = data.find(event => event.id === calEvent.id); // Find the selected event
                console.log("Selected event data:", eventData); 

                if (eventData) {
                    var formUpdate = $("<form action='/update-event-url/" + calEvent.id + "' method='POST'></form>");
                    formUpdate.append('<input type="hidden" name="_token" value="' + csrfToken + '">'); // CSRF token

                    // Populate form with event data
                    formUpdate.append("<label>Change module name</label>");
                    formUpdate.append("<div class='form-group'><select class='form-control' name='module' id='module-select'><option value='" + eventData.id_module + "'>" + eventData.module.name + "</option></select></div>");

                    formUpdate.append("<label>Change professor name</label>");
                    formUpdate.append("<div class='form-group'><select class='form-control' name='professor' id='professor-select'><option value='" + eventData.id_prof + "'>" + eventData.prof.last_name + " " + eventData.prof.first_name + "</option></select></div>");

                    formUpdate.append("<label>Change element name</label>");
                    formUpdate.append("<div class='form-group'><select class='form-control' name='element' id='element-select'><option value='" + eventData.id_element + "'>" + eventData.element.name + "</option></select></div>");

                    formUpdate.append("<label>Change event start date</label>");
                    formUpdate.append("<div class='form-group'><select class='form-control' name='beginning' id='select-heure-depart'><option value='" + eventData.id_heure_debut + "'>" + eventData.heure_debut.time + "</option></select></div>");

                    formUpdate.append("<label>Change event end date</label>");
                    formUpdate.append("<div class='form-group'><select class='form-control' name='ending' id='select-heure-fin'><option value='" + eventData.id_heure_fin + "'>" + eventData.heure_fin.time + "</option></select></div>");

                    formUpdate.append("<label>Change event room</label>");
                    formUpdate.append("<div class='form-group'><select class='form-control' name='room' id='select_salle'><option value='" + eventData.id_salle + "'>" + eventData.salle.name + "</option></select></div>");

                    formUpdate.append("<label>Change group</label>");
                    formUpdate.append("<div class='input-group'><input class='form-control' type='text' name='group' value='" + eventData.N_groupe + "'/></div>");

                    formUpdate.append("<label>Change date</label>");
                    formUpdate.append("<div class='input-group'><input class='form-control' type='date' name='date' value='" + eventData.date + "'/></div>");

                    // Display modal
                    $this.$modal.modal({
                        backdrop: 'static'
                    });

                    // Append form to modal body
                    $this.$modal.find('.modal-body').empty().append(formUpdate);

                    // Handle save button click
                    $this.$modal.find('.save-event').unbind('click').on("click", function () {
                        console.log("Save event clicked");
                        formUpdate.submit();
                    });

                    // Populate functions
                    function populateSelect(url, selectId, defaultText, valueField, textField) {
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function (data) {
                                console.log("Fetched data for select:", data); // Debugging line
                                var $select = $(selectId);
                                $select.empty();
                                $select.append($('<option>', {
                                    value: '',
                                    text: defaultText
                                }));

                                $.each(data, function (index, item) {
                                    console.log("Processing item for select:", item); // Debugging line
                                    var textValue = item[textField];
                                    if (Array.isArray(textField)) {
                                        textValue = textField.map(function (field) {
                                            return item[field];
                                        }).join(' ');
                                    }
                                    $select.append($('<option>', {
                                        value: item[valueField],
                                        text: textValue
                                    }));
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error('Failed to load ' + defaultText.toLowerCase(), error); // Improved error logging
                            }
                        });
                    }

                    // $(document).ready(function () {
                    //     populateSelect("/get-professor-options", '#professor-select', 'Select a professor', 'id_personnel', ['nom', 'prenom']);
                    //     populateSelect("/get-module-options", '#module-select', 'Select a module', 'id_module', 'intitule');
                    //     populateSelect("/get-element-options", '#element-select', 'Select an element', 'id_element', 'intitule');
                    //     populateSelect("/get-heure-debut", '#select-heure-depart', 'Select a start time', 'id_heure_debut', 'heure_debut');
                    //     populateSelect("/get-heure-fin", '#select-heure-fin', 'Select an end time', 'id_heure_fin', 'heure_fin');
                    //     populateSelect("/get-salle", '#select_salle', 'Select a room', 'id_salle', 'num_salle');
                    // });
                } else {
                    console.error("Event not found");
                }
            },
            error: function (xhr, status, error) {
                console.error("Failed to fetch events", error);
            }
        });
    };


    CalendarApp.prototype.onSelect = function (start, end, allDay) {
        var $this = this;
        $this.$modal.modal({
            backdrop: 'static'
        });

        var form = $("<form></form>");
        var rowDiv = $("<div class='row'></div>");

        rowDiv.append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Nom de module</label><select class='form-control' name='module' id='module-select'><option value=''>Sélectionner un module</option></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Nom professeur</label><select class='form-control' name='professor' id='professor-select'><option value=''>Sélectionner un professeur</option></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Nom d'élément</label><select class='form-control' name='element' id='element-select'><option value=''>Sélectionner un élément</option></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Numéro de groupe</label><input class='form-control' type='text' name='group'/></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Salle</label><select class='form-control' name='room' id='select_salle'><option value=''>Sélectionner une salle</option></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Heure de début</label><select class='form-control' name='beginning' id='select-heure-depart'><option value=''>Sélectionner une heure de début</option></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Heure de fin</label><select class='form-control' name='ending' id='select-heure-fin'><option value=''>Sélectionner une heure de fin</option></select></div></div>")
            .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Date</label><input class='form-control' type='date' name='date'/></div></div>");
        form.append(rowDiv);

        // Populate professors
        function populateProfessors() {
            $.ajax({
                url: "http://127.0.0.1:8000/get-professor-options",
                dataType: 'json',
                success: function (data) {
                    var $select = $('#professor-select');
                    $select.empty();
                    $select.append($('<option>', {
                        value: '',
                        text: 'Sélectionner un professeur'
                    }));
                    $.each(data, function (index, professor) {
                        $select.append($('<option>', {
                            value: professor.id_personnel,
                            text: professor.nom + ' ' + professor.prenom
                        }));
                    });
                },
                error: function (xhr, status, error) {
                    alert('Failed to load professors');
                }
            });
        }

        // Populate modules
        function populateModules() {
            $.ajax({
                url: "http://127.0.0.1:8000/get-module-options",
                dataType: 'json',
                success: function (data) {
                    var $select = $('#module-select');
                    $select.empty();
                    $select.append($('<option>', {
                        value: '',
                        text: 'Sélectionner un module'
                    }));
                    $.each(data, function (index, module) {
                        $select.append($('<option>', {
                            value: module.id_module,
                            text: module.intitule
                        }));
                    });
                },
                error: function (xhr, status, error) {
                    alert('Failed to load modules');
                }
            });
        }

        // Populate elements
        function populateElements() {
            $.ajax({
                url: "http://127.0.0.1:8000/get-element-options",
                dataType: 'json',
                success: function (data) {
                    var $select = $('#element-select');
                    $select.empty();
                    $select.append($('<option>', {
                        value: '',
                        text: 'Sélectionner un élément'
                    }));
                    $.each(data, function (index, element) {
                        $select.append($('<option>', {
                            value: element.id_element,
                            text: element.intitule
                        }));
                    });
                },
                error: function (xhr, status, error) {
                    alert('Failed to load elements');
                }
            });
        }

        // Populate heure debut
        function populateHeureDebut() {
            $.ajax({
                url: "http://127.0.0.1:8000/get-heure-debut",
                dataType: 'json',
                success: function (data) {
                    var $select = $('#select-heure-depart');
                    $select.empty();
                    $select.append($('<option>', {
                        value: '',
                        text: 'Sélectionner une heure de début'
                    }));
                    $.each(data, function (index, heureD) {
                        $select.append($('<option>', {
                            value: heureD.id_heure_debut,
                            text: heureD.heure_debut
                        }));
                    });
                },
                error: function (xhr, status, error) {
                    alert('Failed to load les heures');
                }
            });
        }

        function populateHeureFin() {
            $.ajax({
                url: "http://127.0.0.1:8000/get-heure-fin",
                dataType: 'json',
                success: function (data) {
                    var $select = $('#select-heure-fin');
                    $select.empty();
                    $select.append($('<option>', {
                        value: '',
                        text: 'Sélectionner une heure de fin'
                    }));
                    $.each(data, function (index, heureF) {
                        $select.append($('<option>', {
                            value: heureF.id_heure_fin,
                            text: heureF.heure_fin
                        }));
                    });
                },
                error: function (xhr, status, error) {
                    alert('Failed to load les heures');
                }
            });
        }

        function populateSalle() {
            $.ajax({
                url: "http://127.0.0.1:8000/get-salle",
                dataType: 'json',
                success: function (data) {
                    var $select = $('#select_salle');
                    $select.empty();
                    $select.append($('<option>', {
                        value: '',
                        text: 'Sélectionner une salle'
                    }));
                    $.each(data, function (index, salle) {
                        $select.append($('<option>', {
                            value: salle.id_salle,
                            text: salle.num_salle
                        }));
                    });
                },
                error: function (xhr, status, error) {
                    alert('Failed to load les salles');
                }
            });
        }
        $(document).ready(function () {
            populateProfessors();
            populateModules();
            populateElements();
            populateHeureDebut();
            populateHeureFin();
            populateSalle();
        });

        $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').on("click", function () {
            console.log("Save event clicked");
            form.submit();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle form submission
        $this.$modal.find('form').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var professor = form.find("select[name='professor']").val();
            var module = form.find("select[name='module']").val();
            var element = form.find("select[name='element']").val();
            var group = form.find("input[name='group']").val();
            var room = form.find("select[name='room']").val(); // Changed from input to select
            var beginning = form.find("select[name='beginning']").val(); // Changed from input to select
            var ending = form.find("select[name='ending']").val(); // Changed from input to select
            var date = form.find("input[name='date']").val();

            console.log("Form data:", {
                professor,
                module,
                element,
                group,
                room,
                beginning,
                ending,
                date
            });

            // Check if any of the required fields are empty
            if (!professor || !module || !element || !group || !room || !beginning || !ending || !date) {
                alert('Tous les champs sont obligatoires');
                return false;
            }

            // Logging types to ensure they match expected types
            console.log("Data types:", {
                professor: typeof professor,
                module: typeof module,
                element: typeof element,
                group: typeof group,
                room: typeof room,
                beginning: typeof beginning,
                ending: typeof ending,
                date: typeof date
            });

            var eventData = {
                professor: professor,
                module: module,
                element: element,
                group: group,
                room: room,
                beginning: beginning,
                ending: ending,
                date: date // Use formatted date
            };

            $.ajax({
                url: 'http://127.0.0.1:8000/store-assurer-cour',
                type: 'POST',
                data: eventData,
                success: function (response) {
                    console.log("Event saved successfully:", response);

                    // Use the returned date_id from the response
                    eventData.id_date = response.date_id;

                    $this.$calendar.fullCalendar('renderEvent', eventData, true);
                },
                error: function (xhr, status, error) {
                    console.error("Error saving event:", error);
                    alert('Failed to save event');
                }
            });

            $this.$modal.modal('hide');
            return false;
        });

        $this.$calendarObj.fullCalendar('unselect');
    };

    CalendarApp.prototype.enableDrag = function () {
        $(this.$event).each(function () {
            var eventObject = {
                title: $.trim($(this).text())
            };
            $(this).data('eventObject', eventObject);
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });
        });
    };

    CalendarApp.prototype.init = function () {
        this.enableDrag();
        var defaultEvents = [];

        var $this = this;
        $this.$calendar = $('#calendar');
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:30:00',
            minTime: '08:00:00',
            maxTime: '19:00:00',
            defaultView: 'agendaWeek',
            handleWindowResize: true,
            height: $(window).height() - 200,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: defaultEvents,
            editable: true,
            droppable: true,
            eventLimit: true,
            selectable: true,
            drop: function (date) {
                $this.onDrop($(this), date);
            },
            select: function (start, end, allDay) {
                $this.onSelect(start, end, allDay);
            },
            eventClick: function (calEvent, jsEvent, view) {
                $this.onEventClick(calEvent, jsEvent, view);
            },
            eventRender: function (event, element) {
                element.find('.fc-title').append(`<br/><b>Module:</b> ${event.module}<br/><b>Element:</b> ${event.element}<br/><b>Salle:</b> ${event.salle}<br/><b>Groupe:</b> ${event.groupe}`);
            }
        });

        function populateEvents() {
            $.ajax({
                url: 'http://127.0.0.1:8000/get-events',
                method: 'GET',
                success: function (events) {
                    const fullCalendarEvents = events.map(event => ({
                        id: event.id, 
                        title: `${event.prof.first_name} ${event.prof.last_name}`,
                        start: event.date.date + 'T' + event.heure_debut.time,
                        end: event.date.date + 'T' + event.heure_fin.time,
                        description: `Salle: ${event.salle.name} - Groupe: ${event.N_groupe} - Module: ${event.module.name}- Element: ${event.element.name}`,
                        module: event.module.name,
                        element: event.element.name,
                        salle: event.salle.name,
                        groupe: event.N_groupe,
                        backgroundColor: event.backgroundColor,
                        borderColor: event.borderColor
                    }));
                    $('#calendar').fullCalendar('addEventSource', fullCalendarEvents);
                },
                error: function (error) {
                    console.error('Error fetching events:', error);
                }
            });
        }

        // Populate events after initializing the calendar
        populateEvents();
    };
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp;
}(window.jQuery),

    function ($) {
        "use strict";
        $.CalendarApp.init();
    }(window.jQuery);