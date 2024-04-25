@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
<<<<<<< HEAD
    .btn-primary{
        background-color:rgb(55, 88, 188) ; 
=======
    .h-w{
        height:auto;
        width:auto;
>>>>>>> f83660ecc40e0586656c9bed0b583ddeef10ef79
    }
</style>

<div class="container-fluid mt-5 h-w">
    <form action="">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h6>Type de réclamation :</h6>
                <select class="form-control mb-3">
                    <option value="internat">Réclamation d'internat</option>
                    <option value="suptech">Réclamation de Suptech</option>
                    <option value="transport">Réclamation de Transport</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Description :</h6>
                <input type="text" class="form-control mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Télécharger  un fichier :</h6>
                <div class="input-group mb-3">
                    <input type="file" class="form-control">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
@endsection
