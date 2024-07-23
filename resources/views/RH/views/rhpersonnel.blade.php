<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    /* Styles par défaut */
    
    label {
        font-weight: 700;
    }
</style>

@extends('RH.layouts.navbarrh')

@section('contenu')
<div class="container mt-5" style="margin-left: 200px; margin-top: 20px;">

        <div class="row">
            <div class="col-md-12 d-flex justify-content-start mb-3 mt-5" >
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalAdd" style="background-color: #173165;">
                    Ajouter Personnel
                </button>
            </div>
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Modal Ajouter -->
                <div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Personnel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formAjouterPersonnel" action="{{ route('ajouter-Personnel') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputNom">Nom</label>
                                            <input type="text" class="form-control" id="inputNom" name="nom">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPrenom">Prénom</label>
                                            <input type="text" class="form-control" id="inputPrenom" name="prenom">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCNE">CNI Personnel</label>
                                            <input type="text" class="form-control" id="inputCNE" name="cin_salarie">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEtablissement">Etablissement</label>
                                            <input type="text" class="form-control" id="inputEtablissement" name="etablissement">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputMatriculeCNSS">Matricule CNSS</label>
                                            <input type="text" class="form-control" id="inputMatriculeCNSS" name="matricule_cnss">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail">E-mail</label>
                                            <input type="email" class="form-control" id="inputEmail" name="mail" placeholder="En cas de Scolarité">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputRIB">RIB</label>
                                            <input type="text" class="form-control" id="inputRIB" name="RIB">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputTypeContrat">Type de Contrat</label>
                                            <input type="text" class="form-control" id="inputTypeContrat" name="type_contrat">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputRIBPDF">RIB PDF</label>
                                            <input type="file" class="form-control" id="inputRIBPDF" name="RIB_pdf">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputContratPDF">Contrat PDF</label>
                                            <input type="file" class="form-control" id="inputContratPDF" name="contrat_pdf">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCVPDF">CV</label>
                                            <input type="file" class="form-control" id="inputCVPDF" name="cv_pdf">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCINPDF">CIN PDF</label>
                                            <input type="file" class="form-control" id="inputCINPDF" name="cin_pdf">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="width: 100%; background-color:#173165;">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modifier Modal -->
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifier les informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formModifierEtudiant" action="{{ route('update-Personnel') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputNom" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="inputNom" name="nom">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPrenom" class="form-label">Prénom</label>
                                            <input type="text" class="form-control" id="inputPrenom" name="prenom">
                                        </div>
                                        <!-- Ajoutez d'autres champs nécessaires ici -->
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputNom" class="form-label">Etablissement</label>
                                            <input type="text" class="form-control" id="inputNom" name="nom">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPrenom" class="form-label">RIB</label>
                                            <input type="text" class="form-control" id="inputPrenom" name="prenom">
                                        </div>
                                        <!-- Ajoutez d'autres champs nécessaires ici -->
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputNom" class="form-label">Matricule CNSS</label>
                                            <input type="text" class="form-control" id="inputNom" name="nom">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPrenom" class="form-label">Type Contrat</label>
                                            <input type="text" class="form-control" id="inputPrenom" name="prenom">
                                        </div>
                                        <!-- Ajoutez d'autres champs nécessaires ici -->
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="width: 100%; background-color:#173165;">Enregistrer les modifications</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Table de personnel -->
                <div class="table-responsive">
                    <table class="table table-striped" id="personnel-table">
                        <thead>
                            <tr>
                                <th class="th-color border">id</th>
                                <th class="th-color border">Matricule CNSS</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">Etablissement</th>
                                <th class="th-color border">RIB</th>
                                <th class="th-color border">RIB PDF</th>
                                <th class="th-color border">Type Contrat</th>
                                <th class="th-color border">Contrat PDF</th>
                                <th class="th-color border">CV</th>
                                <th class="th-color border">Cin PDF</th>
                                <th class="th-color border">Action</th>
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
               
            $('#personnel-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getDatapersonnel') }}",
                columns: [
            
                    { data: 'id', name: 'id' },
                    { data: 'matricule_cnss', name: 'matricule_cnss' },
                   
                    { data: 'nom', name: 'nom' },
                    { data: 'prenom', name: 'prenom' },
                    { data: 'etablissement', name: 'etablissement' },
                    { data: 'RIB', name: 'RIB' },
                    { data: 'RIB_pdf', name: 'RIB_pdf' },
                    { data: 'type_contrat', name: 'type_contrat' },
                    { data: 'contrat_pdf', name: 'contrat_pdf' },
                    { data: 'cv_pdf', name: 'cv_pdf' },
                    { data: 'cin_pdf', name: 'cin_pdf' },
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
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this personnel?")) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>

   <script>
    $(document).ready(function() {
        $('#personnel-table').on('click', '.edit-btn', function(e) {
            e.preventDefault();
            var personnelId = $(this).data('id');
            var row = $(this).closest('tr'); 
            var nom = row.find('td:eq(2)').text(); 
            var prenom = row.find('td:eq(3)').text();

            $('#id').val(personnelId);
            $('#inputNom').val(nom);
            $('#inputPrenom').val(prenom);
            $('#exampleModalEdit').modal('show');
        });
    });
   
</script>
@endsection