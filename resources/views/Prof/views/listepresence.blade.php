<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('prof.layouts.navbarprof')
@section('contenu')

<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 120px;">
    <div class="container barrecherche fixed-top-barre" style="margin-top: 50px;">

        <div class="row">
            <div class="col-md-9">

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
                                <div class="modal-body">
                                    <form id="formModifierEtudiant" action="{{ route('updateAbsence') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="apogee" name="apogee" value="">
                                       
                                        
                                        <div class="form-group col-md-4">
                                            <label for="inputAbsence">Absence</label>
                                            <input type="text" class="form-control" id="inputAbsence" name="absence" min="0" max="20">
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="width: 100%;background-color:#173165">Enregistrer les modifications</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
                                <th class="th-color border">Numéro</th>
                      
                                <th class="th-color border">CNE</th>
                                <th class="th-color border">CNI</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">Date</th>
                                <th class="th-color border">heure</th>
                                <th class="th-color border">Absence</th>
                                <th class="th-color border">Actions</th>
                               
                                
                               
                            </tr>
                        </thead>
                    </table>
                </div>
             

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

<script>

$('#etudiants-table').DataTable({
  
    processing: true,
    serverSide: true,
    ajax: "{{ route('dataetudiant') }}",
    columns: [
        { data: 'Apogee', name: 'Apogee' },
       
        { data: 'CNE', name: 'CNE' },
        { data: 'CNI', name: 'CNI' },
        { data: 'Nom', name: 'Nom' },
        { data: 'Prenom', name: 'Prenom' },
        { data: 'Date', name: 'Date' },
        { data: 'Heure', name: 'Heure' },
        { data: 'absence', name: 'absence' },
        {  data: 'actions',
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

            var absence = row.find('td:eq(7)').text();
        
        $('#apogee').val(etudiantId);
        $('#inputAbsence').val(absence);
        $('#exampleModalEdit').modal('show');
        });
    });
</script>
<script>
   $(document).ready(function() {
    $('#formModifierEtudiant').submit(function(e) {
      
        var absence = $('#inputAbsence').val().toUpperCase().trim(); // Convertir en majuscules pour la comparaison

        // Vérifier si l'entrée n'est pas égale à A, P ou R
        if (absence !== "R" && absence !== "P" && absence !== "A") {
            alert("Tu dois entrer soit A, P ou R en majuscules ou minuscules.");
            return false;
        }

    });
});


</script>

    
@endsection