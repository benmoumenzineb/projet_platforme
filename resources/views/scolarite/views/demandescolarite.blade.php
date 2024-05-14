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
                    <table class="table table-striped" id="demandescolarite">
                        <thead>
                            <tr>
                               
                <th class="th-color border" scope="col">Nom</th>
                <th class="th-color border" scope="col">Prénom</th>
                <th class="th-color border" scope="col">Numero de Téléphone</th>
                <th class="th-color border" scope="col">Email</th>
                <th class="th-color border" scope="col">Type</th>
                <th class="th-color border" scope="col">Actions</th>
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
  
        $('#demandescolarite').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDataDemande')}}",
            columns: [
              
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'Numero', name: 'Numero' },
                { data: 'Email', name: 'Email' },
                { data: 'Type', name: 'Type' },
               
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    
</script>


@endsection