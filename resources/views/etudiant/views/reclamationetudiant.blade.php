<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        /* Style pour le conteneur du formulaire */
        #reclamation {
            margin: 80px auto 50px;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            height: auto;
        }

        @media (width: 1440px) {

            #reclamation {
                max-width: 70%;
                margin-left: 1px;
            }

            /* Adjust input width */
            .form-control {
                width: 100%;
            }
        }

        /* Style pour les titres */
        h6 {
            color: #173165;
            margin-bottom: 10px;
        }

        /* Style pour les inputs */
        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 5px;
            margin-bottom: 20px;
        }

        /* Style pour le bouton "Enregistrer" */
        .button-enregistrer {
            width: 100%;
            padding: 10px;
            background-color: #1858b1;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Style pour le bouton "Enregistrer" au survol */
        .button-enregistrer:hover {
            background-color: #0d3d82;
        }

        /* Style pour le bouton "Télécharger un fichier" */
        .file-input {
            display: none;
        }

        .file-upload-btn {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 6px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style pour l'icône de la caméra */
        .camera-icon {
            margin-right: 5px;
        }
    </style>

    <div id="reclamation" class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
       <ul> @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach</ul>
        <form action="{{route('enreclamation') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <h6>Type de réclamation :</h6>
                    <select class="form-control" name="type">
                       
                        <option value="internat">Réclamation d'internat</option>
                        <option value="suptech">Réclamation de Suptech</option>
                        <option value="transport">Réclamation de Transport</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <h6>Description :</h6>
                    <!-- Remplacer l'input par un textarea -->
                    <textarea class="form-control" rows="5" name="description"></textarea>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h6>Télécharger un fichier :</h6>
                    <input type="file" name="file_reclamation" class="file-input">
                    <label for="file-upload" class="file-upload-btn btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                            class="bi bi-camera-fill camera-icon" viewBox="0 0 16 16">
                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                        </svg>
                        Sélectionner un fichier
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn button-enregistrer">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
@endsection
