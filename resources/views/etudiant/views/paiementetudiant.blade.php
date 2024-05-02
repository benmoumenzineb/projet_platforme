<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        .month-btn {
            background-color: rgb(210, 9, 9);
            /* Changez la couleur selon vos préférences */
            color: white;
            /* Changez la couleur du texte si nécessaire */
            width: 100px;
        }

        .month-btn:not(:disabled):not(.disabled).active {
            background-color: #4CAF50;
        }


        .btn-primary {
            background-color: #3966c2;
            width: 100px;
        }

        .month-btn {
            margin: 5px;
        }

        .btn-close {
            background-color: #3966c2;
        }

        #modifier {
            background-color: #173165;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            width: 110px;
            height: 40px;
        }

        #modifier:hover {
            background-color: #3966c2
        }

        .camera-button {

            background-color: transparent;
            border: none;

        }

        /* Style pour les boutons cochés avec la couleur de fond verte */
    </style>









    <div id="informations-personnelles-content" class="content" style="margin-left: -20px; margin-top:90px; overflow: hidden;">
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
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Informations Paiement</strong>
                </legend>
                <form id="informations-personnelles" action="{{ route('enpaiement') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Button pour afficher le modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monthModal">
                        Mois
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="monthModal" tabindex="-1" role="dialog" aria-labelledby="monthModalLabel"
                        aria-hidden="true">
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
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne" style="background-color: red;"> Janvier
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Février
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Mars
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Avril
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Mai
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Juin
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Juillet
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Août
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Septembre
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Octobre
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Novembre
                                        </label>
                                        <label class="btn btn-outline-secondary month-btn">
                                            <input type="checkbox" class="month-checkbox" id="paiement_id"
                                                name="mois_concerne"> Décembre
                                        </label>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        style="background-color: #3966c2">Fermer</button>
                                    <button type="button" id="savebtn" class="btn btn-primary"
                                        style="background-color: #3966c2">Enregistrer</button>
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
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label"><strong>Prénom :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="filiere" class="form-label"><strong>Filiére
                                            :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="filiere" name="filiere" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="CIN" class="form-label"><strong>CNI :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="CIN" name="cni" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N-telephone" class="form-label"><strong>N° Téléphone:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="N-telephone" name="n_telephone"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="somme" class="form-label"><strong>La somme totale en
                                            chiffre:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="somme" name="montant" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N_passeport" class="form-label"><strong>Choix:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="choix" name="choix" required>
                                        <option value="Internat">Internat</option>
                                        <option value="Ecole">Ecole</option>
                                        <option value="Salle de sport">Salle de sport</option>
                                        <option value="Transport">Transport</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="mode"><strong>Mode de règlement Scolaire:</strong></label>
                            <div class="mode-reglement_radio d-flex justify-content-start">
                                <label class="mr-3">
                                    <input type="radio" name="mode_paiement" value="Especes">
                                    Espèces
                                </label>
                                <label class="mr-3">
                                    <input type="radio" name="mode_paiement" value="Chéque">
                                    Chéque
                                </label>
                                <label>
                                    <input type="radio" name="mode_paiement" value="Virment">
                                    Virement
                                </label>
                            </div>
                        </div>
                    </div>


                    <button type="submit" id="modifier" name="modifier" class="btn btn-primary">Valider</button>

                    <label for="inputFile" class="camera-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                            class="bi bi-camera-fill ml-2" viewBox="0 0 16 16" style="color: #173165">
                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                        </svg>
                        Choisir un image
                    </label>
                    <input type="file" id="inputFile" name="image" style="display: none;">
                </form>
            </fieldset>
        </div>
    </div>
    </div>


    <!--Informations Payment-->





    <div class="content" style="margin-top: 20px; overflow: hidden;">
        <div class="row justify-content-end">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript pour gérer le clic sur les boutons des mois
        document.querySelectorAll('.month-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Récupérer le mois à partir de l'attribut data-month
                const month = this.getAttribute('data-month');
                // Vous pouvez ajouter votre propre logique pour gérer le clic sur le mois sélectionné
            });
        });
        // Sélectionnez tous les éléments avec la classe "month-btn"
        const monthButtons = document.querySelectorAll('.month-btn');

        // Parcourez chaque bouton
        monthButtons.forEach(button => {
            // Ajoutez un écouteur d'événements pour le clic
            button.addEventListener('click', () => {
                // Vérifiez si le bouton a déjà la classe "active"
                const isActive = button.classList.contains('active');

                // Si le bouton est actif, supprimez la classe "active", sinon ajoutez-la
                if (isActive) {
                    button.classList.remove('active');
                } else {
                    button.classList.add('active');
                }
            });
        });





        $(document).ready(function() {
            // Gérez le clic sur le bouton Enregistrer
            $('#savebtn').click(function() {
                // Récupérez les mois sélectionnés
                var selectedMonths = $('.month-checkbox:checked').map(function() {
                    return $(this).attr('id');
                }).get();

                // Envoyez les mois sélectionnés au serveur via une requête AJAX
                $.ajax({
                    type: 'POST',
                    url: '{{ route('enpaiement') }}',
                    data: {
                        months: selectedMonths
                    },
                    success: function(response) {
                        // Affichez un message de succès ou effectuez d'autres actions
                        alert(response.message);
                    },
                    error: function(xhr, status, error) {
                        // Gérez les erreurs en conséquence
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
