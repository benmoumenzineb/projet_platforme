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

               <!-- <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Éditer les notes</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="update-form" action="" method="POST">
                                   
                                    <div class="form-group">
                                        <label for="CTR1">CTR1</label>
                                        <input type="text" class="form-control" id="CTR1" name="CTR1">
                                    </div>
                                    <div class="form-group">
                                        <label for="CTR2">CTR2</label>
                                        <input 
                                        ùùtype="text" class="form-control" id="CTR2" name="CTR2">
                                    </div>
                                    <div class="form-group">
                                        <label for="EF">EF</label>
                                        <input type="text" class="form-control" id="EF" name="EF">
                                    </div>
                                    <div class="form-group">
                                        <label for="TP">TP</label>
                                        <input type="text" class="form-control" id="TP" name="TP">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>-->

                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
                                <th class="th-color border">Code Apogee</th>
                                <th class="th-color border">CNE</th>
                                <th class="th-color border">CNI</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">CTR1</th>
                                <th class="th-color border">CTR2</th>
                                <th class="th-color border">EF</th>
                                <th class="th-color border">TP</th>
                               
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
    ajax: '{{ route("fetch.etudiants") }}',
    columns: [
        { data: 'apogee', name: 'apogee' },
        { data: 'CNE', name: 'CNE' },
        { data: 'CNI', name: 'CNI' },
        { data: 'Nom', name: 'Nom' },
        { data: 'Prenom', name: 'Prenom' },
        { data: 'CTR1', name: 'CTR1' },
        { data: 'CTR2', name: 'CTR2' },
        { data: 'EF', name: 'EF' },
        { data: 'TP', name: 'TP' }
    ]
});



  




</script>

@endsection
