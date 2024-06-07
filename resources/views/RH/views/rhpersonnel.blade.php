<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('RH.layouts.navbarrh')
@section('contenu')
    <div class="container" style="margin-left: 160px; margin-top:90px; ">

        <div class="row">
            <div class="col-md-9">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAdd" style="background-color: #173165;margin-left:55px">
                    Ajouter Personnel
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
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                                            <label for="inputCNE">CNI Personnel</label>
                                            <input type="text" class="form-control" id="CNE" name="CNE">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Etablissement</label>
                                            <input type="text" class="form-control" id="CNI" name="CNI">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Matricule CNSS</label>
                                            <input type="text" class="form-control" id="DateNaissance"
                                                name="Date_naissance">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">RIB</label>
                                            <input type="text" class="form-control" id="CNI" name="Sexe">
                                        </div>
                                    </div>
                                   
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
                    <table class="table table-striped" id="personnel-table">
                        <thead>
                            <tr>
                                <th class="th-color border">CIN Personnel</th>
                                <th class="th-color border">Matricule CNSS</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">Etablissement</th>
                                <th class="th-color border">RIB</th>
                                <th class="th-color border">Action</th>
                               
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
            <script>
               
            $('#personnel-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getDatapersonnel') }}",
                columns: [
            
                    { data: 'cin_salarie', name: 'cin_salarie' },
                    { data: 'matricule_cnss', name: 'matricule_cnss' },
                   
                    { data: 'nom', name: 'nom' },
                    { data: 'prenom', name: 'prenom' },
                    { data: 'etablissement', name: 'etablissement' },
                    { data: 'RIB', name: 'RIB' },
                    {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                ]
            });
           

        
      
    

    
        document.getElementById('formAjouterEtudiant').addEventListener('submit', function(event) {
            event.preventDefault();

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

                    
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    
                    console.error(error);
                }
            });
        });
    </script>
    <script>
        function confirmDelete(cin_salarie){
        if (confirm("Are you sure you want to delete this student?")) {
            document.getElementById('delete-form-' + cin_salarie).submit();
        }
    }
    </script>
@endsection