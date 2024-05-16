<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@extends('prof.layouts.navbarprof')
@section('contenu')

<div class="container-fluid mt-5" style="margin-left:150px;margin-top: 120px;">
    <div class="container  barrecherche fixed-top-barre" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-9">
                
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
                                <th class="th-color border">Numero de seance</th>
                                <th class="th-color border">Enseignant</th>
                                <th class="th-color border">Cycle</th>
                                <th class="th-color border">Filiere</th>
                                <th class="th-color border">Matière</th>
                                <th class="th-color border">Niveau </th>
                                <th class="th-color border">Groupe</th>
                                <th class="th-color border">Horaire</th>
                                <th class="th-color border">Date</th>
                                <th class="th-color border">Activites</th>
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
            ajax: "{{ route('hisroriqueprofesseur') }}",
            columns: [
                { data: 'Num_seance', name: 'Num_seance' },  
                { data: 'nom_enseignant', name: 'nom_enseignant' },
                { data: 'Cycle', name: 'Cycle' },
                { data: 'Filiere', name: 'Filiere' },
                { data: 'Matiere', name: 'Matiere' },
                { data: 'Niveau', name: 'Niveau' },
                { data: 'Groupe', name: 'Groupe' },
                { data: 'horaire', name: 'horaire' },
                { data: 'Date', name: 'Date' },
                { data: 'Activites', name: 'Activites' },
               
            ]
        });
    
</script>


@endsection
