<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    @extends('scolarite.layouts.navbarscolarite')
@section('contenu')
    <div class="container" style="margin-left: 210px; margin-top:90px; ">
        <div class="row">
            <div class="col-md-9">
                
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

<script>
  
        $('#etudiants-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDataEtudients') }}",
            columns: [
                { data: 'apogee', name: 'apogee' },
                { data: 'CNE', name: 'CNE' },
                { data: 'CNI', name: 'CNI' },
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'Sexe', name: 'Sexe' },
                { data: 'Date_naissance', name: 'Date_naissance' },
                { data: 'Pays', name: 'Pays' },
                { data: 'Diplome_acces', name: 'Diplome_acces' },
                { data: 'Serie_bac', name: 'Serie_bac' },
                { data: 'Date_inscription', name: 'Date_inscription' },
                { data: 'Specialite_diplome', name: 'Specialite_diplome' },
                { data: 'Mention_bac', name: 'Mention_bac' },
                { data: 'Etablissement_bac', name: 'Etablissement_bac' },
                { data: 'Pourcentage_bourse', name: 'Pourcentage_bourse' },
                
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    
</script>


@endsection