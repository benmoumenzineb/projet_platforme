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
                    <table class="table table-striped" id="paiementscolarite">
                        <thead>
                            <tr>
                               
                         <th class="th-color border" scope="col">Numero de demande</th>
                         <th class="th-color border" scope="col">Date Paiement</th>
                                     
                                                <th class="th-color border" scope="col">Nom</th>
                                                <th class="th-color border" scope="col">Prenom</th>
                                                <th class="th-color border" scope="col">E-mail</th>
                                                <th class="th-color border" scope="col">Numero de Téléphone</th>
                                                <th class="th-color border" scope="col">CNI</th>
                                                <th class="th-color border" scope="col">Montant</th>
                                                <th class="th-color border" scope="col">Mode de Paiement</th>
                                                <th class="th-color border" scope="col">Mois</th>
                                                <th class="th-color border" scope="col">Choix</th>
                                               
 
                                                <th class="th-color border" scope="col">Image</th>
                                               
                                               
                
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
  
        $('#paiementscolarite').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDataPaiement')}}",
            columns: [
                { data: 'id_paiement', name: 'id_paiement' },
                { data: 'date_paiement', name: 'date_paiement' },
                { data: 'nom', name: 'nom' },
                { data: 'prenom', name: 'prenom' },
                { data: 'Email', name: 'Email' },
                { data: 'n_telephone', name: 'n_telephone' },
                { data: 'cni', name: 'cni' },
                { data: 'montant', name: 'montant' },
                { data: 'mode_paiement', name: 'mode_paiement' },  
                  { data: 'mois_concerne', name: 'mois_concerne' },
                  { data: 'choix', name: 'choix' },
               
                { data: 'image', name: 'image' },
               
              
              
              
             
               
              
                
              
            ]
        });
    
</script>


@endsection
