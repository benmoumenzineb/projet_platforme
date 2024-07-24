<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <title>Informations de Paiement</title>
</head>
<body>
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        .month-btn {
            background-color: rgb(210, 9, 9);
            color: white;
            width: 100px;
            margin: 5px;
        }
        
        .month-btn:not(:disabled):not(.disabled).active {
            background-color: #4CAF50;
        }

        .btn-primary {
            background-color: #3966c2;
            width: 100px;
        }

        .btn-close {
            background-color: #3966c2;
        }

        #modifier {
            background-color: #173165;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            width: 100%;
            height: 40px;
        }

        #modifier:hover {
            background-color: #3966c2;
        }

        .camera-button {
            background-color: transparent;
            border: none;
        }

        @media (max-width: 2065px) {
            #informations-paiement-content {
                width: 2000px;
                margin-left: 30px;
                margin-top: 80px;
            }
        }

        @media (width: 1920px) {
            #informations-paiement-content {
                width: 1700px;
                margin-left: 30px;
                margin-top: 80px;
            }
        }

        @media (max-width: 2028px) {
            form {
                width: 1300px;
            }

            fieldset {
                margin-left: 80px;
            }
        }

        #boutonInformations, #boutonCursus {
            background-color: #173165; 
            color: white; 
            text-align: center; 
            text-decoration: none; 
            padding: 5px;
            font-size: 17px; 
            margin: 4px 2px; 
            cursor: pointer;
            border-radius: 5px;
            border: 5px #173165; 
            transition-duration: 0.4s; 
        }

        #historique-paiement-content {
            display: none;
        }

        .month-btn.selected {
            background-color: #4CAF50; /* Vert */
            color: #fff;
            cursor: not-allowed; /* Curseur non cliquable */
        }
    </style>

    <div id="informations-paiement-content" class="content" style="margin-left: -20px; margin-top:50px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            <fieldset class="border p-4">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong>Informations Paiement</strong></legend>
                <form id="informations-personnelles" action="{{ route('enpaiement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Button pour afficher le modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monthModal" style="background-color: #173165;">
                        Mois
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="monthModal" tabindex="-1" role="dialog" aria-labelledby="monthModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="monthModalLabel">Mois</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Boutons radio pour les mois de l'année -->
                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Janvier" name="mois_concerne[]"> Janvier
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Fevrier" name="mois_concerne[]"> Février
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Mars" name="mois_concerne[]"> Mars
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Avril" name="mois_concerne[]"> Avril
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Mai" name="mois_concerne[]"> Mai
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Juin" name="mois_concerne[]"> Juin
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Juillet" name="mois_concerne[]"> Juillet
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Aout" name="mois_concerne[]"> Août
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Septembre" name="mois_concerne[]"> Septembre
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Octobre" name="mois_concerne[]"> Octobre
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Novembre" name="mois_concerne[]"> Novembre
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" value="Decembre" name="mois_concerne[]"> Décembre
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #3966c2">Fermer</button>
                                    <button type="button" id="savebtn" class="btn btn-primary" style="background-color: #3966c2">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nom" class="form-label"><strong>Nom :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->Nom ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label"><strong>Prénom :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $user->Prenom ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="adresse" class="form-label"><strong>Adresse :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $user->Adresse ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label"><strong>Email :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->Email ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="telephone" class="form-label"><strong>Téléphone :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->Telephone ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cin" class="form-label"><strong>CIN :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="cin" name="cin" value="{{ $user->CIN ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nomBanque" class="form-label"><strong>Nom Banque :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nomBanque" name="nomBanque" value="{{ $user->NomBanque ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="montant" class="form-label"><strong>Montant :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="montant" name="montant" value="{{ $user->Montant ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="compte" class="form-label"><strong>Numéro de Compte :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="compte" name="compte" value="{{ $user->Compte ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="rib" class="form-label"><strong>RIB :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="rib" name="rib" value="{{ $user->RIB ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date" class="form-label"><strong>Date :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="date" name="date" value="{{ $user->Date ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn" id="modifier">Modifier</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Gérer l'affichage des mois sélectionnés
            $('.month-checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $(this).closest('.month-btn').addClass('selected');
                } else {
                    $(this).closest('.month-btn').removeClass('selected');
                }
            });

            // Gérer l'enregistrement des mois sélectionnés
            $('#savebtn').click(function() {
                var selectedMonths = [];
                $('.month-checkbox:checked').each(function() {
                    selectedMonths.push($(this).val());
                });
                console.log('Mois sélectionnés :', selectedMonths);
                $('#monthModal').modal('hide');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
