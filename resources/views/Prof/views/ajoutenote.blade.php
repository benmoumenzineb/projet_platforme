<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('prof.layouts.navbarprof')
@section('contenu')





<style>
    /* Styles personnalisés pour réduire la taille des icônes de pagination */
   /* Styles personnalisés pour la pagination */


.pagination .page-link {
    font-size: 8px; /* Taille de police */
    color: #fff; /* Couleur du texte */
    background-color: #3966c2; /* Couleur de fond */
    border-color: #3966c2; /* Couleur de la bordure */
   
}





   
      
        
@media (width: 2560px) {
    table {
      margin-left: -250px; 
      /* Rétablir la largeur maximale pour les écrans plus grands */
    }
    
    
}
th{
    color: #173165
}
</style>

    
<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 120px;" >
    
        
    <div class="container  barrecherche fixed-top-barre" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <form action="{{ route('ajouternote.search') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Rechercher un étudiant...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Affichage des résultats de recherche -->
                   
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Apogee</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>CNE</th>
                                    <!-- Autres colonnes si nécessaire -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudians as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->apogee }}</td>
                                        <td>{{ $etudiant->Nom }}</td>
                                        <td>{{ $etudiant->Prenom }}</td>
                                        <td>{{ $etudiant->CNE }}</td>
                                        <!-- Autres colonnes si nécessaire -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                 
                    


</div>


<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->






@endsection