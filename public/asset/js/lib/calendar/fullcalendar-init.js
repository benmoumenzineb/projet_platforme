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
        var form = $("<form></form>");
        form.append("<label>Change event name</label>");
        form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>");
        $this.$modal.modal({
            backdrop: 'static'
        });
        $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').on("click", function () {
            $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                return (ev._id == calEvent._id);
            });
            $this.$modal.modal('hide');
        });
        $this.$modal.find('form').on('submit', function () {
            calEvent.title = form.find("input[type=text]").val();
            $this.$calendarObj.fullCalendar('updateEvent', calEvent);
            $this.$modal.modal('hide');
            return false;
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

        function populateEvents() {
            $.ajax({
                url: 'http://127.0.0.1:8000/get-events', // Replace with your actual endpoint
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Assuming 'data' is an array of events
                    console.log('Events fetched successfully:', data);

                    // Process the events (e.g., display on a calendar)
                    processEvents(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching events:', status, error);
                    alert('Failed to fetch events');
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
        var today = new Date($.now());

        var defaultEvents = [];

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:30:00',
            minTime: '08:00:00',
            maxTime: '19:00:00',
            defaultView: 'month',
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
            }
        });

        this.$saveCategoryBtn.on('click', function () {
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="external-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }
        });
    };

    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp;
}(window.jQuery),

    function ($) {
        "use strict";
        $.CalendarApp.init();
    }(window.jQuery);