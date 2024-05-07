<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('scolarite.layouts.navbarscolarite')
    
@section('contenu')


<style>
    /* Styles personnalisés pour réduire la taille des icônes de pagination */
   /* Styles personnalisés pour la pagination */
.pagination-container {
    margin-top: 20px; /* Ajoutez un espace au-dessus de la pagination */
    border:none;
    
}

.pagination .page-link {
    font-size: 8px; /* Taille de police */
    color: #fff; /* Couleur du texte */
    background-color: #3966c2; /* Couleur de fond */
    border-color: #3966c2; /* Couleur de la bordure */
   
}

.pagination .page-link:hover {
    background-color: #173165; /* Couleur de fond au survol */
    
}



   
      
        .fixed-bottom-barre {
    position: absolute;
    bottom: -800px; 
  
    right: 10px;
    z-index: -999;
    background-color: #fff; /* Couleur de fond */
    padding: 1px 0; /* Espacement intérieur pour un meilleur aspect */
    /* Ajoutez une ombre pour plus de distinction */
}


.th-color {
            background-color: #3966c2;
            color: rgb(255, 255, 255);
        }  
</style>

    
<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 120px;" >
    
        
    <div class="container fixed-top-barre" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <form action="{{ route('etudiant.search.scolarite') }}" method="GET" class="mb-3 fixed-top-barre"> <!-- Ajoutez la classe ici -->
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
    </div>
    

    
    <div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th class="th-color border" scope="col">CNE</th>
            <th class="th-color border" scope="col">CNI</th>
            <th class="th-color border" scope="col">Nom</th>
            <th class="th-color border" scope="col">Prénom</th>
            <th class="th-color border" scope="col">Sexe</th>
            <th class="th-color border" scope="col">Date Naissance</th>
            <th class="th-color border" scope="col">Pays</th>
            <th class="th-color border" scope="col">Diplome d'acces</th>
            <th class="th-color border" scope="col">Serie de bac</th>
            <th class="th-color border" scope="col">Date inscription</th>
            <th class="th-color border" scope="col">Specialite de diplome</th>
            <th class="th-color border" scope="col">Mention BAC</th>
            <th class="th-color border" scope="col">Etablissement de diplome</th>
            <th class="th-color border" scope="col">Pourcentage de bourse</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($etudians as $etudiant)
        <tr>
            
            <td class="border">{{ $etudiant->CNE }}</td>
            <td class="border">{{ $etudiant->CNI }}</td>
            <td class="border">{{ $etudiant->Nom }}</td>
            <td class="border">{{ $etudiant->Prenom }}</td>
            <td class="border">{{ $etudiant->Sexe }}</td>
            <td class="border">{{ $etudiant->Date_naissance }}</td>
            <td class="border">{{ $etudiant->Pays }}</td>
           <td class="border">{{ $etudiant->Diplome_acces }}</td>
            <td class="border">{{ $etudiant->Serie_bac }}</td>
            <td class="border">{{ $etudiant->Date_inscription}}</td>
            <td class="border">{{ $etudiant->Specialite_diplome }}</td>
            <td class="border">{{ $etudiant->Mention_bac }}</td>
            <td class="border">{{ $etudiant->Etablissement_bac }}</td>
            <td class="border">{{ $etudiant->Pourcentage_bourse }}</td>
        </tr>
        @endforeach
    </tbody>
</table></div>
<!-- Pagination -->
<div class="d-flex justify-content-center pagination-container fixed-bottom-barre">
    {{ $etudians->links() }}
</div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection







