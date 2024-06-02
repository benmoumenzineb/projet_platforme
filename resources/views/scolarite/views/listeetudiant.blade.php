<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('scolarite.layouts.navbarscolarite')
@section('contenu')
    <style>
        th {
            color: #173165;
        }

        /* Style général pour la select box */
        .form-select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 100%;
        }

        /* Style pour l'état hover */
        .form-select:hover {
            border-color: #356895;
        }

        /* Style pour l'état focus */
        .form-select:focus {
            border-color: #4e73df;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        @media (width: 2560px) {
        .container {
            max-width: 2600px;
            
        }

        .modal-dialog {
            max-width: 800px;
        }
    }
    @media (max-width: 320px) {
            .container {
                margin-left: 0;
                margin-top: 20px;
            }

            .btn {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
    <body>
    <div class="container" style="margin-left: 150px; margin-top:140px; ">

        <div class="row">
            <div class="col-md-9">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    style="background-color: #173165;margin-left: 70px;">
                    Ajouter un étudiant
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un étudiant</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="modal-body">
                                <form id="formAjouterEtudiant" action="{{ route('ajouter.etudiant') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputNom">Nom</label>
                                            <input type="text" class="form-control" id="Nom" name="Nom"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPrenom">Prénom</label>
                                            <input type="text" class="form-control" id="Prenom" name="Prenom"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNE">CNE</label>
                                            <input type="text" class="form-control" id="CNE" name="CNE"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Ajoutez d'autres paires de champs ici -->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">CNI</label>
                                            <input type="text" class="form-control" id="CNI" name="CNI"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Date Naissance</label>
                                            <input type="text" class="form-control" id="DateNaissance"
                                                name="Date_naissance" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Sexe</label>
                                            <input type="text" class="form-control" id="Sexe" name="Sexe"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Pays</label>
                                            <input type="text" class="form-control" id="Pays" name="Pays"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Série de bac</label>
                                            <input type="text" class="form-control" id="Serie_bac" name="Serie_bac"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Email</label>
                                            <input type="text" class="form-control" id="Diplome_acces"
                                                name="Email" required>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                       
                                        <div class="form-group col-md-4">
                                            <label for="inputCNI">Mention Bac</label>
                                            <input type="text" class="form-control" id="Mention_bac"
                                                name="Mention_bac" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Adresse</label>
                                            <input type="text" class="form-control" id="apogee"
                                                name="Adresse">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Specialite diplôme</label>
                                            <input type="text" class="form-control" id="Specialite_diplome"
                                                name="Specialite_diplome">
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Etablissement du diplôme</label>
                                            <input type="text" class="form-control" id="Etablissement_bac"
                                                name="Etablissement_bac" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCNI">Pourcentage Bourse</label>
                                            <div class="col-md-6">
                                                <select class="form-select" id="Pourcentage_bourse"
                                                    name="Pourcentage_bourse" required>
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

                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">Téléphone</label>
                                            <input type="text" class="form-control" id="Etablissement_bac"
                                                name="telephone" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateNaissance">date inscription</label>
                                            <input type="text" class="form-control" id="Etablissement_bac"
                                                name="num_annee" required>
                                        </div>
                                    </div>




                                    
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 100%; background-color:#173165;">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modfier modal--><div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de l'étudiant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formModifierEtudiant" action="{{ url('update-etudiant') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id" value="">
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
                            <input type="text" class="form-control" id="inputDateNaissance" name="Date_naissance">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputSexe">Sexe</label>
                            <input type="text" class="form-control" id="inputSexe" name="Sexe">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Pays</label>
                            <input type="text" class="form-control" id="inputPays" name="Pays"
                            >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCNI">Série de bac</label>
                            <input type="text" class="form-control" id="inputSerie_bac" name="Serie_bac"
                            >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Email</label>
                            <input type="text" class="form-control" id="inputDiplome_acces"
                                name="Diplome_acces">
                        </div>
                    </div>


                    <div class="form-row">
                        
                           
                        <div class="form-group col-md-4">
                            <label for="inputCNI">Mention Bac</label>
                            <input type="text" class="form-control" id="inputMention_bac"
                                name="Mention_bac">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Specialite diplôme</label>
                            <input type="text" class="form-control" id="inputSpecialite_diplome"
                                name="Specialite_diplome">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Adresse</label>
                            <input type="text" class="form-control" id="inputAdresse"
                                name="Adresse">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Etablissement du diplôme</label>
                            <input type="text" class="form-control" id="inputEtablissement_bac"
                                name="Etablissement_bac">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCNI">Pourcentage Bourse</label>
                            <div class="col-md-6">
                                <select class="form-select" id="inputPourcentage_bourse"
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




                    <button type="submit" class="btn btn-primary" style="width: 100%;background-color:#173165">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
                                <th class="th-color border">Id étudiant</th>
                               
                                <th class="th-color border">CNE</th>
                                <th class="th-color border">CNI</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">Téléphone</th>
                                <th class="th-color border">Email</th>
                                <th class="th-color border">Adresse</th>
                                <th class="th-color border">Sexe</th>
                                <th class="th-color border">Date Naissance</th>
                                <th class="th-color border">Pays</th>
                               
                                <th class="th-color border">Serie de bac</th>
                                <th class="th-color border">Année bac</th>
                                <th class="th-color border">Specialite diplome</th>
                                <th class="th-color border">Mention BAC</th>
                                <th class="th-color border">Etablissement diplome</th>
                                <th class="th-color border">Pourcentage bourse</th>
                                <th class="th-color border">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
       
    $('#etudiants-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('getDataEtudients') }}",
        columns: [
            { data: 'id', name: 'id' },
           
            { data: 'CNE', name: 'CNE' },
            { data: 'CNI', name: 'CNI' },
            { data: 'Nom', name: 'Nom' },
            { data: 'Prenom', name: 'Prenom' },
            { data: 'telephone', name: 'telephone' },
            { data: 'Email', name: 'Email' },
            { data: 'Adresse', name: 'Adresse' },
            { data: 'Sexe', name: 'Sexe' },
            { data: 'Date_naissance', name: 'Date_naissance' },
            { data: 'Pays', name: 'Pays' },
            
            { data: 'Serie_bac', name: 'Serie_bac' },
            { data: 'Annee_bac', name: 'Annee_bac' },
            { data: 'Specialite_diplome', name: 'Specialite_diplome' },
            { data: 'Mention_bac', name: 'Mention_bac' },
            { data: 'Etablissement_bac', name: 'Etablissement_bac' },
            { data: 'Pourcentage_bourse', name: 'Pourcentage_bourse' },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            }
        ]
    });
</script>

   

    <script>
      
      $(document).ready(function() {
    $('#etudiants-table').on('click', '.edit-btn', function(e) {
        e.preventDefault();

        var etudiantId = $(this).data('id');
        var row = $(this).closest('tr');
        var nom = row.find('td:eq(3)').text();
        var prenom = row.find('td:eq(4)').text();
        var cne = row.find('td:eq(2)').text();
        var cni = row.find('td:eq(5)').text();
        var dateNaissance = row.find('td:eq(9)').text(); 
        var sexe = row.find('td:eq(8)').text();
        var pays = row.find('td:eq(10)').text();
        var Email = row.find('td:eq(6)').text();
        var Serie_bac = row.find('td:eq(11)').text();
        var telephone = row.find('td:eq(5)').text();
        var Mention_bac= row.find('td:eq(14)').text();
        var Etablissement_bac = row.find('td:eq(15)').text();
        var Pourcentage_bourse = row.find('td:eq(16)').text();
        var Adresse = row.find('td:eq(7)').text();



        $('#id').val(etudiantId);
        $('#inputNom').val(nom);
        $('#inputPrenom').val(prenom);
        $('#inputCNE').val(cne);
        $('#inputCNI').val(cni);
        $('#inputDateNaissance').val(dateNaissance);
        $('#inputSexe').val(sexe);
        $('#inputPays').val(pays);
        $('#inputSerie_bac').val(Serie_bac);
        $('#inputDiplome_acces').val(Email);
        $('#inputMention_bac').val(Mention_bac);
        $('#inputEtablissement_bac').val(Etablissement_bac);
        $('#inputPourcentage_bourse').val(Pourcentage_bourse);
        $('#inputAdresse').val(Adresse);
        $('#exampleModalEdit').modal('show');
        
    });
});


    </script>
   <script>
       document.getElementById('formAjouterEtudiant').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();

    xhr.open('POST', '{{ route('ajouter.etudiant') }}', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                $('#exampleModal').modal('hide');
                window.location.reload();
            } else {
                console.error('Error:', xhr.statusText);
            }
        }
    };
    xhr.onerror = function() {
        console.error('Request failed');
    };
    xhr.send(formData);
});

    </script>
    
  
    <script>
        function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this student?")) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
    </script>
    
   </body>
@endsection