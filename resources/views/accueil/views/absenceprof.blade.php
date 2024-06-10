<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('accueil.layouts.navbaracceuil')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
@section('contenu')
<style>

</style>
<div class="container" style="margin-left: 210px; margin-top:140px; ">

    <!-- Button trigger modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Entrez les horaires d'entrée et de sortie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="cin_salarie" name="cin_salarie">
                        <div class="form-group">
                            <label for="heure_depart">Heure d'entrer</label>
                            <input type="time" class="form-control" id="heure_depart" name="heure_depart">
                        </div>
                        <div class="form-group">
                            <label for="heure_fin">Heure de sortie</label>
                            <input type="time" class="form-control" id="heure_fin" name="heure_fin">
                        </div>
                        <div class="form-group">
                            <label for="date_seance">Date</label>
                            <input type="date" class="form-control" id="date_seance" name="date_seance">
                        </div>
                        <div class="form-group">
                            <label for="num_element">Matière</label>
                            <select name="num_element" id="num_element" class="form-control">
                                @foreach($elements as $element)
                                    <option value="{{ $element->num_element }}">{{ $element->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #173165" >Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <table class="table table-striped" id="prof-table">
            <thead>
                <tr>
                    <th class="th-color border">CIN Enseignant</th>             
                    <th class="th-color border">Nom</th>
                    <th class="th-color border">Prénom</th>
                    <th class="th-color border">Etablissement</th>
                    <th class="th-color border">Action</th>
                   
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
   
$('#prof-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('getDataprofs') }}",
    columns: [

        { data: 'cin_salarie', name: 'cin_salarie' },
       
       
        { data: 'nom', name: 'nom' },
        { data: 'prenom', name: 'prenom' },
        { data: 'etablissement', name: 'etablissement' },
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
   $('#prof-table').on('click', '.edit-btn', function() {
        $('#editModal').modal('show');
    });


   

</script>

 
@endsection