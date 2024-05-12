<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('scolarite.layouts.navbarscolarite')
    
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
.th-color {
            background-color: #3966c2;
            color: rgb(255, 255, 255);
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
            <form id="formAjouterEtudiant" action="{{route('ajoute.etudiant')}}" method="POST">
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
                </div>
                <!-- Ajoutez d'autres paires de champs ici -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCNI">CNI</label>
                        <input type="text" class="form-control" id="inputCNI" name="CNI" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Date Naissance</label>
                        <input type="date" class="form-control" id="inputDateNaissance" name="Date_naissance" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Sexe</label>
                        <input type="text" class="form-control" id="inputCNI" name="Sexe" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Pays</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Pays" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Série de bac</label>
                        <input type="text" class="form-control" id="inputCNI" name="Serie_bac" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Diplôme d'acces</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Diplome_acces" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Date inscription</label>
                        <input type="text" class="form-control" id="inputCNI" name="Date_inscription" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Specialite de diplôme</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Specialite_diplome">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCNI">Mention Bac</label>
                        <input type="text" class="form-control" id="inputCNI" name="Mention_bac" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDateNaissance">Etablissement du diplôme</label>
                        <input type="text" class="form-control" id="inputDateNaissance" name="Etablissement_bac" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputCNI">Pourcentage Bourse</label>
                        <input type="text" class="form-control" id="inputCNI" name="Pourcentage_bourse" required>
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
 

  
  
    <div class="container">
<table class="table table-striped">
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
                <input type="button" class="btn btn-success btn-modifier" value="Modifier" data-apogee="{{ $etudiant->apogee }}" style="width: 90px; margin-right: 5px;">
<input type="button" class="btn btn-danger btn-supprimer" value="Supprimer" data-apogee="{{ $etudiant->apogee }}" style="width: 90px;">

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


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // JavaScript pour gérer l'envoi du formulaire
    document.getElementById('formAjouterEtudiant').addEventListener('submit', function(event) {
      event.preventDefault(); // Empêche la soumission du formulaire par défaut
  
      // Récupérer les données du formulaire
      var formData = new FormData(this);
  
      // Envoyer les données via AJAX
      $.ajax({
        url: '{{ route('ajoute.etudiant') }}', // URL de l'action du formulaire
        method: 'POST', // Méthode de l'action du formulaire (POST)
        data: formData, // Données du formulaire
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
    });
  </script>

@endsection

<!-- Inclure jQuery -->
