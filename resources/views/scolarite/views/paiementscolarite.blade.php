<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('scolarite.layouts.navbarscolarite')
@section('contenu')


<style>
    /* Styles personnalisés pour réduire la taille des icônes de pagination */
    
    th{
    color: #173165
}
      
.pagination .page-link {
    font-size: 8px; /* Taille de police */
    color: #fff; /* Couleur du texte */
    background-color: #3966c2; /* Couleur de fond */
    border-color: #3966c2; /* Couleur de la bordure */
   
}


@media (width: 2560px) {
    table {
      margin-left: -400px; 
      width: 100%;/* Rétablir la largeur maximale pour les écrans plus grands */
    }
    .barrecherche{
        margin-left: -400px;
    }
}


   
      
       
       
    /* Styles pour les cases à cocher "Valider" et "Non valider" */
    


</style>
<div class="container" style="margin-left: 210px; margin-top:90px; ">
    <div class="container-fluid mt-5 barrecherche fixed-top-barre">
        <div class="row">
            <div class="col-md-9">
                
                <form action="{{ route('paiementscolarite.search') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Rechercher un étudiant...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" style="background-color:#173165;">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="th-color border" scope="col">Numero de demande</th>
                <th class="th-color border" scope="col">Mois</th>
                <th class="th-color border" scope="col">Nom</th>
                <th class="th-color border" scope="col">Prenom</th>
                <th class="th-color border" scope="col">Filiére</th>
                <th class="th-color border" scope="col">CNI</th>
                <th class="th-color border" scope="col">Numero de Téléphone</th>
                <th class="th-color border" scope="col">Montant</th>
                <th class="th-color border" scope="col">Choix</th>
                <th class="th-color border" scope="col">Mode de Paiement</th>
                <th class="th-color border" scope="col">Image</th>
                <th class="th-color border" scope="col">E-mail</th>
                <th class="th-color border" scope="col">Actions</th>
               <!-- <th class="th-color border" scope="col">Actions</th>--> <!-- Nouvelle colonne pour les cases à cocher -->
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $paiement)
            <tr>
                <td class="border">{{ $paiement->id }}</td>
                <td class="border">{{ $paiement->mois_concerne }}</td>
                <td class="border">{{ $paiement->nom }}</td>
                <td class="border">{{ $paiement->prenom }}</td>
                <td class="border">{{ $paiement->filiere}}</td>
                <td class="border">{{ $paiement->cni }}</td>
                <td class="border">{{ $paiement->n_telephone }}</td>
                <td class="border">{{ $paiement->montant}}</td>
                <td class="border">{{ $paiement->choix }}</td>
                <td class="border">{{ $paiement->mode_paiement }}</td>
                <td class="border"><a href="{{ asset('asset/images/' . $paiement->image) }}">{{ $paiement->image }}</a></td>

                <td class="border">{{ $paiement->Email }}</td>
                <td class="border">
                <div class="btn-group" role="group" aria-label="Actions">
                    <input type="button" class="btn btn-success" value="OUI" onclick="validerDemande({{ $paiement->id }})" style="width: 70px; margin-right: 5px;">
                    <input type="button" class="btn btn-danger" value="NON" onclick="nonValiderDemande({{ $paiement->id }})" style="width: 70px;">
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $paiements->links() }}
    </div>
    </div>



@endsection
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>