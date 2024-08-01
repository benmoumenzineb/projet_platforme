<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Calendar</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Toastr -->
    <link href="asset/css/lib/toastr/toastr.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="asset/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="asset/css/lib/rangSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="asset/css/lib/rangSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bar Rating -->
    <link href="asset/css/lib/barRating/barRating.css" rel="stylesheet">
    <!-- Nestable -->
    <link href="asset/css/lib/nestable/nestable.css" rel="stylesheet">
    <!-- JsGrid -->
    <link href="asset/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
    <link href="asset/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
    <!-- Datatable -->
    <link href="asset/css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="asset/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <!-- Calender 2 -->
    <link href="asset/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <!-- Weather Icon -->
    <link href="asset/css/lib/weather-icons.css" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link href="asset/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="asset/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="asset/css/lib/select2/select2.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link href="asset/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Calender -->
    <link href="asset/css/lib/calendar/fullcalendar.css" rel="stylesheet" />

    <!-- Common -->
    <link href="asset/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="asset/css/lib/themify-icons.css" rel="stylesheet">
    <link href="asset/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="asset/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/lib/helper.css" rel="stylesheet">
    <link href="asset/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo">
                    <a href="index.html">
                        <!-- <img src="asset/images/logo.png" alt="" /> -->
                        <span>Focus</span>
                    </a>
                </div>
                <ul>
                    <li class="label">Main</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-home"></i> Tableau de bord
                            <span class="badge badge-primary">2</span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="index1.html">Dashboard 2</a>
                            </li>



                        </ul>
                    </li>

                    <li class="label">Apps</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-bar-chart-alt"></i> gestion des comptes
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="chart-flot.html">Fliste </a>
                            </li>
                            <li>
                                <a href="chart-morris.html">Morris</a>
                            </li>
                            <li>
                                <a href="chartjs.html">Chartjs</a>
                            </li>
                            <li>
                                <a href="chartist.html">Chartist</a>
                            </li>
                            <li>
                                <a href="chart-peity.html">Peity</a>
                            </li>
                            <li>
                                <a href="chart-sparkline.html">Sparkle</a>
                            </li>
                            <li>
                                <a href="chart-knob.html">Knob</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="app-event-calender.html">
                            <i class="ti-calendar"></i> Génération emploi du temps </a>
                    </li>
                    <li>
                        <a href="app-email.html">
                            <i class="ti-email"></i> Liste des etudiants</a>
                    </li>
                    <li>
                        <a href="app-profile.html">
                            <i class="ti-user"></i>Liste des enseignants</a>
                    </li>
                    <li>
                        <a href="app-widget-card.html">
                            <i class="ti-layout-grid2-alt"></i> demande de scolarité</a>
                    </li>
                    <li>
                        <a href="app-widget-card.html">
                            <i class="ti-layout-grid2-alt"></i> Réclamation de scolarité</a>
                    </li>

                    <li>
                        <a>
                            <i class="ti-close"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Bienvenue, <span>dans l'espace administrateur</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Calendar</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <a href="#" data-toggle="modal" data-target="#add-category"
                                                class="btn btn-lg btn-success btn-block waves-effect waves-light">
                                                <i class="fa fa-plus"></i> Create New
                                            </a>
                                            <div id="external-events" class="m-t-20">
                                                <br>
                                                <p>Drag and drop your event or click in the calendar</p>
                                                <div class="external-event bg-primary" data-class="bg-primary">
                                                    <i class="fa fa-move"></i>professeur : hajar
                                                </div>
                                                <div class="external-event bg-pink" data-class="bg-pink">
                                                    <i class="fa fa-move"></i>Module: Datascience
                                                </div>
                                                <div class="external-event bg-warning" data-class="bg-warning">
                                                    <i class="fa fa-move"></i>Element: power BI
                                                </div>
                                                <div class="external-event bg-dark" data-class="bg-dark">
                                                    <i class="fa fa-move"></i>Filiere: cyber security
                                                </div>
                                            </div>
                                            <div class="checkbox m-t-40">
                                                <input id="drop-remove" type="checkbox">
                                                <label for="drop-remove">Remove after drop</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-box">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                        <div class="modal fade none-border" id="event-modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Ajouter une séance</strong>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body"></div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="button"
                                                            class="btn btn-success save-event waves-effect waves-light">Créer
                                                            une séance</button>
                                                        <button type="button"
                                                            class="btn btn-danger delete-event waves-effect waves-light"
                                                            data-dismiss="modal">supprimer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade none-border" id="add-category">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Ajouter une categorie </strong>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Nom de module</label>
                                                                    <input class="form-control form-white"
                                                                        placeholder="Enter name" type="text"
                                                                        name="category-name" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Choisir le
                                                                        professeur</label>
                                                                    <select class="form-control form-white"
                                                                        name="professor">
                                                                        @foreach ($data as $professor)
                                                                            <option
                                                                                value="{{ $professor->id_personnel }}">
                                                                                {{ $professor->nom }}
                                                                                {{ $professor->prenom }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light save-category"
                                                            data-dismiss="modal">Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add your JavaScript code here -->
                                    <script src="asset/js/lib/jquery.min.js"></script>
                                    <script src="asset/js/lib/jquery.nanoscroller.min.js"></script>
                                    <script src="asset/js/lib/menubar/sidebar.js"></script>
                                    <script src="asset/js/lib/preloader/pace.min.js"></script>
                                    <script src="asset/js/lib/bootstrap.min.js"></script>
                                    <script src="asset/js/scripts.js"></script>
                                    <script src="asset/js/lib/jquery-ui/jquery-ui.min.js"></script>
                                    <script src="asset/js/lib/moment/moment.js"></script>
                                    <script src="asset/js/lib/calendar/fullcalendar.min.js"></script>
                                    <script src="asset/js/lib/calendar/fullcalendar-init.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
