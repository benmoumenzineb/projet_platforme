<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('scolarite.layouts.navbarscolarite')
    
@section('contenu')

<link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>


<style>
    /* Styles personnalisés pour réduire la taille des icônes de pagination */
   /* Styles personnalisés pour la pagination */


.pagination .page-link {
    font-size: 8px; /* Taille de police */
    color: #fff; /* Couleur du texte */
    background-color: #3966c2; /* Couleur de fond */
   
   
}


th{
    color: #173165
}


   
      
        
@media (width: 2560px) {
    table {
      margin-left: -250px; 
      /* Rétablir la largeur maximale pour les écrans plus grands */
    }
    
   
}

</style>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un étudiant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
        <div class="modal-body">
            <form id="formAjouterEtudiant" action="{{route('ajouter.etudiant')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNom">Nom</label>
                        <input type="text" class="form-control" id="inputNom" name="Nom" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPrenom">Prénom</label>
                        <input type="text" class="form-control" id="inputPrenom" name="Prenom" required>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <label for="inputCNE">CNE</label>
                        <input type="text" class="form-control" id="inputCNE" name="CNE" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCNI">CNI</label>
                        <input type="text" class="form-control" id="inputCNI" name="CNI" required>
                    </div>
                </div>
                <!-- Ajoutez d'autres paires de champs ici -->
                <div class="form-row">
                   
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Date Naissance</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Date_naissance" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Sexe</label>
                        <input type="text" class="form-control" id="inputCNI" name="Sexe" required>
                    </div>
                </div>
                <div class="form-row">
                   
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Pays</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Pays" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Série de bac</label>
                        <input type="text" class="form-control" id="inputCNI" name="Serie_bac" required>
                    </div>
                </div>
                <div class="form-row">
                   
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Diplôme d'acces</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Diplome_acces" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Date inscription</label>
                        <input type="text" class="form-control" id="inputCNI" name="Date_inscription" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Mention Bac</label>
                        <input type="text" class="form-control" id="inputCNI" name="Mention_bac" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Specialite de diplôme</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Specialite_diplome">
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Etablissement du diplôme</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Etablissement_bac" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Pourcentage Bourse</label>
                        <div class="col-md-6">
                            <select class="form-select" id="Pourcentage_bourse" name="Pourcentage_bourse" required>
                                <option value="" disabled selected></option>
                                <option value="0%">0%</option>
                                <option value="10%">10%</option>
                                <option value="20%">20%</option>
                                <option value="30%">30%</option>
                                <option value="40%">40%</option>
                                <option value="50%">50%</option>
                                <option value="60%">60%</option>
                                <option value="70%">70%</option>
                                <option value="80%">80%</option>
                                <option value="90%">90%</option>
                                <option value="100%">100%</option>
                            </select>
                        </div>
                    </div>
                    
                    
                </div>
               
                    
                  
               
                <!-- Ajoutez d'autres paires de champs ici -->
                <button type="submit" class="btn btn-primary" style="width: 100%; background-color:#173165;">Ajouter</button>
            </form>
            
        </div>
      </div>
    </div>
  </div>
  
  <!-- Ajoutez ce bouton où vous voulez déclencher l'ouverture du modal -->
 
  
  
<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 100px;" >
    
        
    <div class="container  barrecherche fixed-top-barre" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-9">
               
                <div class="col-md-12"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color: #173165; margin:5px;">Ajouter un étudiant</button>
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
            
       
    </div></div>
  <!-- Modal -->
  <!-- Ajoutez ce code HTML à votre vue Blade -->
 
<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de l'étudiant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModifierEtudiant" action="{{ route('modifier.etudiant') }}" method="POST">
                    @csrf
                    <!-- Champs de formulaire pour la modification -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputNom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="inputNom" name="Nom">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputPrenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="inputPrenom" name="Prenom">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCNE">CNE</label>
                        <input type="text" class="form-control" id="inputCNE" name="CNE" >
                    </div>
                </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCNI">CNI</label>
                            <input type="text" class="form-control" id="inputCNI" name="CNI" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Date Naissance</label>
                            <input type="text" class="form-control" id="inputDateNaissance" name="Date_naissance" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCNI">Sexe</label>
                            <input type="text" class="form-control" id="inputCNI" name="Sexe" >
                        </div>
                    </div>
                    <!-- Ajoutez d'autres paires de champs ici -->
                   
                    <div class="form-row">
                       
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Pays</label>
                            <input type="text" class="form-control" id="inputDateNaissance" name="Pays" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCNI">Série de bac</label>
                            <input type="text" class="form-control" id="inputCNI" name="Serie_bac" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Diplôme d'acces</label>
                            <input type="text" class="form-control" id="inputDateNaissance" name="Diplome_acces" >
                        </div>
                    </div>
                   
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCNI">Date inscription</label>
                            <input type="text" class="form-control" id="inputCNI" name="Date_inscription" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCNI">Mention Bac</label>
                            <input type="text" class="form-control" id="inputCNI" name="Mention_bac" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateNaissance">Specialite diplôme</label>
                            <input type="text" class="form-control" id="inputDateNaissance" name="Specialite_diplome">
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="inputDateNaissance">Etablissement du diplôme</label>
                            <input type="text" class="form-control" id="inputDateNaissance" name="Etablissement_bac" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCNI">Pourcentage Bourse</label>
                            <div class="col-md-6">
                                <select class="form-select" id="Pourcentage_bourse" name="Pourcentage_bourse" >
                                    <option value="" disabled selected></option>
                                    <option value="0%">0%</option>
                                    <option value="10%">10%</option>
                                    <option value="20%">20%</option>
                                    <option value="30%">30%</option>
                                    <option value="40%">40%</option>
                                    <option value="50%">50%</option>
                                    <option value="60%">60%</option>
                                    <option value="70%">70%</option>
                                    <option value="80%">80%</option>
                                    <option value="90%">90%</option>
                                    <option value="100%">100%</option>
                                </select>
                            </div>
                        </div>
                        
                        
                    </div>
                   
                        
                      
                    <!-- Ajoutez les autres champs de formulaire ici -->
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
<div class="d-flex justify-content-center pagination-container fixed-bottom-barre">
    {{ $etudians->links() }}
</div></div>
<!-- Pagination -->

</div>

<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Inclure Bootstrap JavaScript -->


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
   


@endsection