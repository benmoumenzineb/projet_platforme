<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('Prof.layouts.navbarprof')
    
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
                    <form action="" method="GET" class="mb-3 fixed-top-barre"> <!-- Ajoutez la classe ici -->
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
            
          
            <th class="th-color border" scope="col">Nom</th>
            <th class="th-color border" scope="col">Prénom</th>
            
            <th class="th-color border" scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($etudians as $etudiant)
        <tr>
            
          
            <td class="border">{{ $etudiant->Nom }}</td>
            <td class="border">{{ $etudiant->Prenom }}</td>
            <td class="border">
              
                    
                   
                    
               
            </td>
            
    
                

            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>


</div>




@endsection

