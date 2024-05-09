<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('scolarite.layouts.navbarscolarite')
@section('contenu')


<style>
    /* Styles personnalisés pour réduire la taille des icônes de pagination */
    .pagination .page-link {
        font-size:10px; /* Réduire la taille de la police */
        padding: 1px;
        /* Réduire le rembourrage autour de l'icône */
    }
    .th-color {
            background-color: #3966c2;
            color: rgb(255, 255, 255);
        }
       
    /* Styles pour les cases à cocher "Valider" et "Non valider" */
    


</style>
<div class="container" style="margin-left: 210px; margin-top:90px; overflow-x: hidden ">
    <div class="container-fluid mt-5 barrecherche fixed-top-barre">
        <div class="row">
            <div class="col-md-9">
                
                <form action="{{ route('reclamationscolarite.search') }}" method="GET" class="mb-3">
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
                <th class="th-color border" scope="col">Nom</th>
                <th class="th-color border" scope="col">Prénom</th>
                <th class="th-color border" scope="col">Numero de Téléphone</th>
                <th class="th-color border" scope="col">Email</th>
                <th class="th-color border" scope="col">Type</th>
                <th class="th-color border" scope="col">Description</th>
                <th class="th-color border" scope="col">Image,Fichier</th>
               <!-- <th class="th-color border" scope="col">Actions</th>--> <!-- Nouvelle colonne pour les cases à cocher -->
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamations as $reclamation)
            <tr>
                <td class="border">{{ $reclamation->id }}</td>
                <td class="border">{{ $reclamation->Nom }}</td>
                <td class="border">{{ $reclamation->Prenom }}</td>
                <td class="border">{{ $reclamation->Numero}}</td>
                <td class="border">{{ $reclamation->Email }}</td>
                <td class="border">{{ $reclamation->Type }}</td>
                <td class="border">{{ $reclamation->Description }}</td>
                <td class="border"><a href="{{ asset('asset/images/' . $reclamation->file_reclamation) }}">{{ $reclamation->file_reclamation }}</a></td>
                <!--<td class="border">
                     Button group for Valider and Non valider 
                    <div class="btn-group" role="group" aria-label="Actions">
                        <input type="button" class="btn btn-success" value="OUI" onclick="validerDemande({{ $reclamation->id }})" style="width: 70px; margin-right: 5px;">
                        <input type="button" class="btn btn-danger" value="NON" onclick="nonValiderDemande({{ $reclamation->id }})" style="width: 70px;">
                    </div>-->
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $reclamations->links() }}
    </div>
    </div>
<!-- Paginatio
</div>n -->


@endsection
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
