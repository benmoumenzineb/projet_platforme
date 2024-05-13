<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('prof.layouts.navbarprof')
@section('contenu')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<style>
   


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
                    <form action="" method="POST" class="mb-3" >
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Rechercher un étudiant...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Utilisation de modal-lg pour une largeur maximale -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Notes</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formModifierEtudiant" action="{{ route('update.notes') }}" method="POST" style="width: 100%;">

                                        @csrf
                                        <table style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th rowspan="1" colspan="4" class="border"  style=" text-align:center;">Notes</th>
                                                </tr>
                                                <tr>
                                                    <th class="border" >CTR1</th>
                                                    <th class="border">CTR2</th>
                                                    <th class="border">EF</th>
                                                    <th class="border">TP</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td > <input type="number" class="form-control" name="CTR1" min="0" max="20" step="any"
                                                    data-error="La note doit être comprise entre 0 et 20." 
                                                    oninvalid="this.setCustomValidity('La note doit être comprise entre 0 et 20.')"
                                                    oninput="setCustomValidity('')">
                                             <div class="invalid-feedback">
                                                 La note doit être comprise entre 0 et 20.
                                             </div></td>
                                                <td>   <input type="number" class="form-control" name="CTR1" min="0" max="20"   step="any"
                                                    data-error="La note doit être comprise entre 0 et 20." 
                                                    oninvalid="this.setCustomValidity('La note doit être comprise entre 0 et 20.')"
                                                    oninput="setCustomValidity('')">
                                             <div class="invalid-feedback">
                                                 La note doit être comprise entre 0 et 20.
                                             </div></td>
                                                <td><input type="number" class="form-control" name="CTR1" min="0" max="20" step="any" 
                                                    data-error="La note doit être comprise entre 0 et 20." 
                                                    oninvalid="this.setCustomValidity('La note doit être comprise entre 0 et 20.')"
                                                    oninput="setCustomValidity('')">
                                             <div class="invalid-feedback">
                                                 La note doit être comprise entre 0 et 20.
                                             </div></td>
                                                <td><input type="number" class="form-control" name="CTR1" min="0" max="20"  step="any"
                                                    data-error="La note doit être comprise entre 0 et 20." 
                                                    oninvalid="this.setCustomValidity('La note doit être comprise entre 0 et 20.')"
                                                    oninput="setCustomValidity('')">
                                             <div class="invalid-feedback">
                                                 La note doit être comprise entre 0 et 20.
                                             </div></td>
                                            </tr>
                                        </table>
                                        <button type="submit" class="btn btn-primary" style="width: 100%; background-color:#173165;">Enregistrer </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
          
          
            <div class="container">
        <table class="table table-striped" id="listetuidant">
            <thead>
                <tr>
                    <th class="th-color border" scope="col" rowspan="2">Code Apogee</th>
                    <th class="th-color border" scope="col" rowspan="2">CNE</th>
                    <th class="th-color border" scope="col" rowspan="2">CNI</th>
                    <th class="th-color border" scope="col" rowspan="2">Nom</th>
                    <th class="th-color border" scope="col" rowspan="2">Prénom</th>
                    <th class="th-color border" scope="col-group" rowspan="1" colspan="4" style=" text-align:center;">Notes</th>
                    <th class="th-color border" scope="col" rowspan="2">Actions</th>
                </tr>
                <tr><th class="th-color border" >CTR1</th>
                    <th class="th-color border" >CTR2</th>
                    <th class="th-color border" >EF</th>
                    <th class="th-color border" >TP</th></tr>
            </thead>
            
            <tbody>
                @foreach ($etudians as $etudiant)
                <tr>
                    <td class="border">{{ $etudiant->apogee }}</td>
                    <td class="border">{{ $etudiant->CNE }}</td>
                    <td class="border">{{ $etudiant->CNI }}</td>
                    <td class="border">{{ $etudiant->Nom }}</td>
                    <td class="border">{{ $etudiant->Prenom }}</td>
                    <td class="border">{{ $etudiant->CTR1}}</td>
                    <td class="border">{{ $etudiant->CTR2 }}</td>
                    <td class="border">{{ $etudiant->EF }}</td>
                    <td class="border">{{ $etudiant->TP}}</td>
                    <td class="border"><div class="btn-group" role="group" aria-label="Actions">
                       <a href="#" class="edit-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="color: #173165;">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                      </svg></a> 
                        
        
                    </div></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      
        
        </div>
       
                 
           
 
    


</div>

<script>
    $(document).ready(function() {
        // Gestion du clic sur l'icône crayon
        $('#listetuidant tbody').on('click', 'a.edit-btn', function() {
            // Afficher le modal de modification
            $('#exampleModalEdit').modal('show');
        });

        // Soumission du formulaire pour la modification des notes
        $('#formModifierEtudiant').submit(function(e) {
            e.preventDefault(); // Empêcher la soumission du formulaire par défaut

            var formData = $(this).serialize(); // Récupérer les données du formulaire sérialisées

            // Envoyer les données du formulaire au serveur via une requête AJAX
            $.ajax({
                url: "{{ route('update.notes') }}", // Endpoint de mise à jour des notes
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    // Gérer la réponse du serveur
                    if (response.success) {
                        alert("Les notes ont été mises à jour avec succès !");
                        $('#exampleModalEdit').modal('hide'); // Cacher le formulaire modal après la mise à jour
                    } else {
                        alert("Une erreur s'est produite lors de la mise à jour des notes.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Une erreur s'est produite lors de la communication avec le serveur.");
                }
            });
        });
    });
</script>
          
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->


        
        
        
      
        
        <!-- Inclure Bootstrap JavaScript -->
        
        
        <!-- Inclure jQuery d'abord -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Ensuite, inclure dataTables.min.js -->
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

            
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
         




@endsection