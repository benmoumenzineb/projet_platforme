<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    @extends('scolarite.layouts.navbarscolarite')
@section('contenu')
<style>
    th{
        color: #173165;
    }
    @media (width: 2560px) {
        .container {
            max-width: 2600px;
            
        }}
</style>
    <div class="container" style="margin-left: 150px; margin-top:140px; ">
        <div class="row">
            <div class="col-md-9">
                
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                <div class="container">
                    <table class="table table-striped" id="reclamationscolarite">
                        <thead>
                            <tr>
                               
                                <th class="th-color border" scope="col">Numero reclamation</th>
                                <th class="th-color border" scope="col">Nom</th>
                                <th class="th-color border" scope="col">Prénom</th>
                                <th class="th-color border" scope="col">Numero de Téléphone</th>
                                <th class="th-color border" scope="col">Email</th>
                                <th class="th-color border" scope="col">Type</th>
                                <th class="th-color border" scope="col">Description</th>
                                <th class="th-color border" scope="col">Image,Fichier</th>
                               
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
  
        $('#reclamationscolarite').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDataReclamation')}}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'Numero', name: 'Numero' },
                { data: 'Email', name: 'Email' },
                { data: 'Type', name: 'Type' },
                { data: 'Description', name: 'Description' },
                { data: 'file_reclamation', name: 'file_reclamation' },
            ]
           
        });
    
</script>



@endsection
