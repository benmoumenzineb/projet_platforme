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
                    <form action="" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Rechercher un étudiant...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="modal-body">
                        <form id="formModifierEtudiant" action="" method="POST">
                            @csrf
                          
                           <tr><th rowspan="1" colspan="4" class="border">Notes</th></tr>
                            <tr>
                            <th class="border">CTR1</th>
                            <th class="border">CTR2</th>
                            <th class="border">EF</th>
                            <th class="border" >TP</th>
                           </tr>

                               
                          
                           
                           
                           
                 
                            <button type="submit" class="btn btn-primary" style="width: 100%;background-color:#173165">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
          
          
            <div class="container">
        <table class="table table-striped" id="listetuidant">
            <thead>
                <tr>
                    <th class="th-color border" scope="col">Code Apogee</th>
                    <th class="th-color border" scope="col">CNE</th>
                    <th class="th-color border" scope="col">CNI</th>
                    <th class="th-color border" scope="col">Nom</th>
                    <th class="th-color border" scope="col">Prénom</th>
                    <th class="th-color border" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudians as $etudiant)
                <tr>
                    <td class="border">{{ $etudiant->apogee }}</td>
                    <td class="border">{{ $etudiant->CNE }}</td>
                    <td class="border">{{ $etudiant->CNI }}</td>
                    <td class="border">{{ $etudiant->Nom }}</td>
                    <td class="border">{{ $etudiant->Prenom }}</td>
                    
                    <td class="border"><div class="btn-group" role="group" aria-label="Actions">
                       <a href="#" class="edit-btn" data-id="{{ $etudiant->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="color: #173165;">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                      </svg></a> 
                        <a href="#" class="delete-btn" data-id="{{ $etudiant->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16" style="color: rgb(237, 17, 17);">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                          </svg></a>
        
                    </div></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
        <!-- Pagination -->
        
        </div>
       
                 
           
 
    


</div>


<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->


        
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <!-- Inclure Bootstrap JavaScript -->
        
        
        
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        
        <script> $(document).ready(function() {
                // Gestion du clic sur l'icône crayon
                $('#listetuidant tbody').on('click', 'a.edit-btn', function () {
                    // Afficher le modal de modification
                    $('#exampleModalEdit').modal('show');
                });
            });</script>
           
           <script>
            
            // JavaScript pour gérer l'envoi du formulaire
            document.getElementById('formAjouterEtudiant').addEventListener('submit', function(event){
              event.preventDefault(); // Empêche la soumission du formulaire par défaut
          
              // Récupérer les données du formulaire
              var etudiant = new etudiant(this);
          
            
              $.ajax({
                url: '{{ route('ajouter.etudiant') }}', e
                method: 'POST', 
                data: etudiant, // Données du formulaire
                processData: false,
                contentType: false,
                success: function(response) {
                  // Si la requête est réussie, vous pouvez traiter la réponse ici
                  console.log(response);
                  
                  // Fermer le modal
                  $('#exampleModal').modal('hide');
                  
                  // Recharger la page pour afficher les changements (ou rediriger l'utilisateur vers une autre page)
                  window.location.reload();
                },
                error: function(xhr, status, error) {
                  // Si la requête échoue, vous pouvez gérer les erreurs ici
                  console.error(error);
                }
              });
            });</script>
            
        
                   
                       




@endsection