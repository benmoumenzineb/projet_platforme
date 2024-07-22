<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    @extends('scolarite.layouts.navbarscolarite')
@section('contenu')
<style>
    th{
        background-color: #ffffff;
        color: black;
    }
   table{
    overflow: auto;
   }
    @media (width: 2560px) {
        .container {
            max-width: 2600px;
            
        }
    img{
        width: 150px;
    }}
        @media (width: 1920px) {
        .container {
            max-width: 3000px;
            margin-left: -20px;
            
        }
        img{
            width: 130px;
        }
    }
    .archived-row {
    background-color: #727272;
}

</style>
    <div class="container" style="margin-left: 150px; margin-top:140px; ">
        <div class="row">
            <div class="col-md-9">
                <a type="button" href="{{ route('demandescolarite.archive') }}" class="btn btn-primary" id="btnArchived" style="margin-left: 60px;">Afficher les demandes archivées</a>

                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                <div class="container">
                    <table class="table table-striped" id="demandescolarite">
                        <thead>
                            <tr>
             <th class="th-color border" scope="col">N°Demande</th>
             <th class="th-color border" scope="col">Apogee</th>
                <th class="th-color border" scope="col">Nom</th>
                <th class="th-color border" scope="col">Prénom</th>
                <th class="th-color border" scope="col">Filiére</th>
                <th class="th-color border" scope="col">Semestre</th>
                <th class="th-color border" scope="col">Numero de Téléphone</th>
                <th class="th-color border" scope="col">Email</th>
                <th class="th-color border" scope="col">Type</th>
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
  
        $('#demandescolarite').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDataDemande')}}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'apogee', name: 'apogee' },
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'filiere', name: 'filiere' },
                { data: 'semestre', name: 'semestre' },
                { data: 'Numero', name: 'Numero' },
                { data: 'Email', name: 'Email' },
                { data: 'Type', name: 'Type' },
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
    if (confirm("Are you sure you want to delete this student?")) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>


    <script>
        function confirmValidation(apogee) {
            
            if (confirm('Êtes-vous sûr de vouloir valider cette demande ?')) {
               
                document.getElementById('validate-form-' + apogee).submit();
            }
        }
    </script>

<script>
    function confirmArchive(apogee) {
    if (confirm('Êtes-vous sûr de vouloir archiver cette demande?')) {
        document.getElementById('archive-form-' + apogee).submit();
    }}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle validation button click
            $('.btn-validate').on('click', function() {
                var apogee = $(this).data('apogee');
                var form = $('#validate-form-' + apogee);

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            // Disable the buttons
                            form.find('button').prop('disabled', true);
                            $('#archive-form-' + apogee).find('button').prop('disabled', true);
                        } else {
                            alert('Une erreur s\'est produite lors de la validation de la demande.');
                        }
                    },
                    error: function() {
                        alert('Une erreur s\'est produite lors de la validation de la demande.');
                    }
                });
            });

            // Handle archive button click
            $('.btn-archive').on('click', function() {
                var apogee = $(this).data('apogee');
                var form = $('#archive-form-' + apogee);

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            // Disable the buttons
                            form.find('button').prop('disabled', true);
                            $('#validate-form-' + apogee).find('button').prop('disabled', true);
                        } else {
                            alert('Une erreur s\'est produite lors de l\'archivage de la demande.');
                        }
                    },
                    error: function() {
                        alert('Une erreur s\'est produite lors de l\'archivage de la demande.');
                    }
                });
            });
        });
    </script>
@endsection