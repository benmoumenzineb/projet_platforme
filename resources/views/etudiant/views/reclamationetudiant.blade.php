@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        .background-section {
            position: relative;
            top: 52px;
            left: -73px;
            width: 982px;
            height: calc(22vh - 50px);
            background-color: #3966c2;
            color: white;
            font-size: 24px;
            text-align: center;
            padding: 30px;
        }
        .row{
            
    
    margin-right: -40px;
    margin-left: -319px}
    
    </style>
    <div class="col-md-9 mt-3"></div>
    <div class="background-section">
        <div> <strong>Réclamation</strong> </div>
    </div>
    <div class="container mt-5">
       <div class="row">
            <div class="col-md-9">

            </div>
        </div>
        <form action="">
            <div class="row">

                <div class="col-md-3"></div>
                <div class="col-md-3 mt-3 ">
                    <h6>Type de réclamation :</h6>
                </div>
                <div class="col-md-3 mt-3">
                    <select class="form-control my-5">
                        <option value="internat">Reclamation d'internat</option>
                        <option value="suptech">Reclamation de Suptech</option>
                        <option value="suptech">Reclamation de Transport</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3 mr-sm-0 mr-md-8 ml-sm-0 ml-md-8 pl-5">
                    <h6>Description:</h6>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-4 m-8 pt-sm-5">
                    <input type="file">
                    <button class="btn"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                            fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 m-8 pt-sm-5">
                    <button class="btn w-50" style="background: #3966c2; color:rgb(255, 255, 255);">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
