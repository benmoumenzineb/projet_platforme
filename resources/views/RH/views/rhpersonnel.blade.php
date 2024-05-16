<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

@extends('RH.layouts.navbarrh')
@section('contenu')
    <div class="container" style="margin-left: 210px; margin-top:90px; ">

        <div class="row">
            <div class="col-md-9">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAdd">
                    Ajouter un étudiant
                </button>
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
                <div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de l'étudiant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formAjouterEtudiant" action="{{ route('ajouter-Personnel') }}" method="POST">
                                    @csrf
                                    <!-- Champs de formulaire pour la modification -->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputNom" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="Nom" name="Nom">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPrenom" class="form-label">Prénom</label>
                                            <input type="text" class="form-control" id="Prenom" name="Prenom">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNE">CNE</label>
                                            <input type="text" class="form-control" id="CNE" name="CNE">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">CNI</label>
                                            <input type="text" class="form-control" id="CNI" name="CNI">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Date Naissance</label>
                                            <input type="text" class="form-control" id="DateNaissance"
                                                name="Date_naissance">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Sexe</label>
                                            <input type="text" class="form-control" id="CNI" name="Sexe">
                                        </div>
                                    </div>
                                    <!-- Ajoutez d'autres paires de champs ici -->

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Pays</label>
                                            <input type="text" class="form-control" id="DateNaissance" name="Pays">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Série de bac</label>
                                            <input type="text" class="form-control" id="CNI" name="Serie_bac">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Diplôme d'acces</label>
                                            <input type="text" class="form-control" id="DateNaissance"
                                                name="Diplome_acces">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Date inscription</label>
                                            <input type="text" class="form-control" id="CNI"
                                                name="Date_inscription">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Mention Bac</label>
                                            <input type="text" class="form-control" id="CNI"
                                                name="Mention_bac">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Specialite diplôme</label>
                                            <input type="text" class="form-control" id="DateNaissance"
                                                name="Specialite_diplome">
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="inputDateNaissance">Etablissement du diplôme</label>
                                            <input type="text" class="form-control" id="DateNaissance"
                                                name="Etablissement_bac">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCNI">Pourcentage Bourse</label>
                                            <div class="col-md-6">
                                                <select class="form-select" id="Pourcentage_bourse"
                                                    name="Pourcentage_bourse">
                                                    <option value="" disabled selected></option>
                                                    <option value="0%">0%</option>
                                                    <option value="10%">10%</option>
                                                    <option value="20%">20%</option>
                                                    <option value="30%">30%</option>
                                                    <option value="40%">40%</option>
                                                    <option value="50%">50%</option>
                                                    <option value="60%">60%</option>
                                                    <option value="70%">70%</option>
                                                    <option value="80%">80%</option>
                                                    <option value="90%">90%</option>
                                                    <option value="100%">100%</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- Ajoutez les autres champs de formulaire ici -->
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 100%;background-color:#173165">Ajouter</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>



                <!-- modfier modal-->
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de l'étudiant
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formModifierEtudiant" action="{{ route('update-Personnel') }}" method="POST">
                                    @csrf
                                    @foreach($etudiants as $etudiant)
                                    <!-- Champs de formulaire pour la modification -->
                                    <input type="hidden" id="id" name="id"  value="{{ $etudiant->id }}">
                                    @endforeach
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputNom" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="inputNom" name="Nom">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPrenom" class="form-label">Prénom</label>
                                            <input type="text" class="form-control" id="inputPrenom" name="Prenom">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNE">CNE</label>
                                            <input type="text" class="form-control" id="inputCNE" name="CNE">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">CNI</label>
                                            <input type="text" class="form-control" id="inputCNI" name="CNI">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Date Naissance</label>
                                            <input type="text" class="form-control" id="inputDateNaissance"
                                                name="Date_naissance">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Sexe</label>
                                            <input type="text" class="form-control" id="inputCNI" name="Sexe">
                                        </div>
                                    </div>
                                    <!-- Ajoutez d'autres paires de champs ici -->



                                    <!-- Ajoutez les autres champs de formulaire ici -->
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 100%;background-color:#173165">Enregistrer les modifications</button>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="container">
                    <table class="table table-striped" id="etudiants-table" >
                        <thead>
                            <tr>
                                <th class="th-color border">ID</th>
                                <th class="th-color border">Code Apogee</th>
                                <th class="th-color border">CNE</th>
                                <th class="th-color border">CNI</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">Sexe</th>
                                <th class="th-color border">Date Naissance</th>
                                <th class="th-color border">Pays</th>
                                <th class="th-color border">Diplome d'acces</th>
                                <th class="th-color border">Serie de bac</th>
                                <th class="th-color border">Date inscription</th>
                                <th class="th-color border">Specialite de diplome</th>
                                <th class="th-color border">Mention BAC</th>
                                <th class="th-color border">Etablissement de diplome</th>
                                <th class="th-color border">Pourcentage de bourse</th>

                                <th class="th-color border">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $('#etudiants-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDataPersonnel') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'apogee',
                    name: 'apogee'
                },
                {
                    data: 'CNE',
                    name: 'CNE'
                },
                {
                    data: 'CNI',
                    name: 'CNI'
                },
                {
                    data: 'Nom',
                    name: 'Nom'
                },
                {
                    data: 'Prenom',
                    name: 'Prenom'
                },
                {
                    data: 'Sexe',
                    name: 'Sexe'
                },
                {
                    data: 'Date_naissance',
                    name: 'Date_naissance'
                },
                {
                    data: 'Pays',
                    name: 'Pays'
                },
                {
                    data: 'Diplome_acces',
                    name: 'Diplome_acces'
                },
                {
                    data: 'Serie_bac',
                    name: 'Serie_bac'
                },
                {
                    data: 'Date_inscription',
                    name: 'Date_inscription'
                },
                {
                    data: 'Specialite_diplome',
                    name: 'Specialite_diplome'
                },
                {
                    data: 'Mention_bac',
                    name: 'Mention_bac'
                },
                {
                    data: 'Etablissement_bac',
                    name: 'Etablissement_bac'
                },
                {
                    data: 'Pourcentage_bourse',
                    name: 'Pourcentage_bourse'
                },

                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    

        
        $('#etudiants-table').on('click', '.edit-btn', function(e) {
            e.preventDefault();
            
            var etudiantId = $(this).closest('tr').find('td:first')
        .text(); 
            var nom = $(this).closest('tr').find('td:eq(4)')
        .text(); 
            var prenom = $(this).closest('tr').find('td:eq(5)')
        .text(); // Supposant que le sixième td contient le prénom de l'étudiant
            var cne = $(this).closest('tr').find('td:eq(2)')
        .text(); // Supposant que le troisième td contient le CNE de l'étudiant
            var cni = $(this).closest('tr').find('td:eq(3)')
        .text(); // Supposant que le quatrième td contient le CNI de l'étudiant
            var dateNaissance = $(this).closest('tr').find('td:eq(7)')
        .text(); // Supposant que le huitième td contient la date de naissance de l'étudiant
            var sexe = $(this).closest('tr').find('td:eq(6)')
        .text(); // Supposant que le septième td contient le sexe de l'étudiant

            // Pré-remplir les champs du formulaire de modification avec les informations récupérées
            $('#id').val(etudiantId);
            $('#inputNom').val(nom);
            $('#inputPrenom').val(prenom);
            $('#inputCNE').val(cne);
            $('#inputCNI').val(cni);
            $('#inputDateNaissance').val(dateNaissance);
            $('#inputSexe').val(sexe);

            
            $('#exampleModalEdit').modal('show');
            console.log(etudiantId);


        });
    

    
        document.getElementById('formAjouterEtudiant').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche la soumission du formulaire par défaut

            // Récupérer les données du formulaire
            var formData = new FormData(this);

            // Envoyer les données via AJAX
            $.ajax({
                url: '{{ route('ajouter-Personnel') }}',
                method: 'POST', // Méthode de l'action du formulaire (POST)
                data: formData, // Données du formulaire
                processData: false,
                contentType: false,
                success: function(response) {
                    // Si la requête est réussie, vous pouvez traiter la réponse ici
                    console.log(response);

                    // Fermer le modal
                    $('#exampleModalAdd').modal('hide');

                    // Recharger la page pour afficher les changements (ou rediriger l'utilisateur vers une autre page)
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    // Si la requête échoue, vous pouvez gérer les erreurs ici
                    console.error(error);
                }
            });
        });
    </script>
@endsection