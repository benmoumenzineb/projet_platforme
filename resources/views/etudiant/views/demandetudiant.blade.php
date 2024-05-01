<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        /* Style pour le conteneur du formulaire */
        #demande {
            margin: 80px auto 50px;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            height: auto;
        }

        @media (width: 1440px) {

            #demande {
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

        

      
       
       

    </style>

    <div id="demande" class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
       <ul>
         @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>
        <form action="{{route('endemande') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <h6>Nom</h6>
                    <input class="form-control" type="text" placeholder="Votre nom" name="Nom" id="" required>
                </div>
              
                <div class="col-md-6">
                    <h6>Prénom</h6>
                    <input class="form-control" type="text" placeholder="Votre prénom" name="Prenom" id="" required>
                </div>  </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Votre numéro de téléphone</h6>
                        <input class="form-control" type="text" name="Numero" id="" placeholder="Téléphone" required>
                    </div>
                    <div class="col-md-6">
                        <h6>Votre Email</h6>
                        <input class="form-control" type="email" name="Email" id="" placeholder="Email" required>
                    </div> </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Type de demande :</h6>
                    <select class="form-control" name="Type" required>
                        
                        <option value="Attestation de réussite">Attestation de Réussite</option>
                        <option value="Attestation inscription">Attestation d'Inscription</option>
                        <option value="Relevé de notes">Relevé de Note</option>
                        <option value="Certificat Scolarité ">Certificat Scolarité</option>
                        

                    </select>
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