@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
@media  (width: 1024px) {
    #reclamation {
      margin-right:100px; /* Hide the sidebar by default on smaller screens */
    }
}
@media  (min-width: 1025px) and  (max-width:1444 px) {
    #reclamation {
      margin-left:0px; /* Hide the sidebar by default on smaller screens */
    }
}
@media (min-width: 768px) {
        #reclamation {
          margin-left: 214px; /* Set max-width to match iPad Air width */
        }
    }
</style>

<div  id="reclamation" class="container mt-5 mr-5">
    <form action="">
        <div class="row ml-5">
            <div class="col-md-6 mt-5">
                <h6>Type de réclamation :</h6>
                <select class="form-control ">
                    <option value="internat">Réclamation d'internat</option>
                    <option value="suptech">Réclamation de Suptech</option>
                    <option value="transport">Réclamation de Transport</option>
                </select>
            </div>
        </div><br>
        <div class="row ml-5">
            <div class="col-md-6">
                <h6>Description :</h6>
                <input type="texterea" class="form-control ">
            </div>
        </div>
        <br>
        <div class="row ml-5">
            <div class="col-md-6">
                <h6>Télécharger  un fichier :</h6>
              
                    <input type="file" >
                    <button class="btn btn-outline-secondary" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                            class="bi bi-camera-fill" viewBox="0 0 16 16">
                            <path
                                d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                        </svg>
                    </button>
              
            </div>
        </div><br>
        <div class="row  ml-5">
            <div class="col-md-6">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
@endsection
