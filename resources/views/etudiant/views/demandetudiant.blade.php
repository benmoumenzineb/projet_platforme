<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        /* Style pour le conteneur du formulaire */
        /* Style pour le conteneur du formulaire */
/* Style pour le conteneur du formulaire */
#demande {
    margin: 80px auto 50px;
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    max-width: 800px; /* Augmentez la largeur maximale du formulaire */
    width: 90%; /* Ajoutez cette règle pour étendre la largeur du formulaire sur toute la largeur disponible */
    margin-left: auto; /* Centrez horizontalement le formulaire */
    margin-right: auto; /* Centrez horizontalement le formulaire */
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
    padding: 8px; /* Augmentez la taille de la zone de saisie */
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

/* Media Queries pour la mise en page responsive */
@media (max-width: 320px) {
    #demande {
        padding: 20px; /* Réduire le padding pour les petits écrans */
    }
    .form-control {
        padding: 6px; /* Réduire la taille de la zone de saisie pour les petits écrans */
    }
}

@media (min-width: 375px) {
    #demande {
        max-width: 80%; /* Réduire la largeur du formulaire pour les petits écrans */
    }
}

@media (min-width: 425px) {
    #demande {
        max-width: 90%; /* Réduire la largeur du formulaire pour les écrans moyens */
    }
}

@media (min-width: 768px) {
    #demande {
        max-width: 600px; /* Réduire la largeur du formulaire pour les écrans plus grands */
    }
}
@media (min-width: 1440px) {
    #demande {
        max-width: 900px; /* Réduire la largeur du formulaire pour les écrans plus grands */
    }
}
@media (min-width: 1024px) {
    #demande {
        max-width: 800px; /* Réduire la largeur du formulaire pour les écrans plus grands */
    }
}
@media (width: 2560px) {
    #demande {
     max-width: 1700px; 
     height: 500px;
     margin-left:-80px;
     margin-top: 120px;
      /* Rétablir la largeur maximale pour les écrans plus grands */
    }
    .button-enregistrer{
        margin-top: 40px;
    }
    form{
        margin-top: 10px;
        margin: 20px;
        padding: 30px;
    }
    
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
                    <input class="form-control" type="text" placeholder="Votre nom" name="Nom" id="" value="{{ $user->Nom ?? '' }}" required>
                </div>
              
                <div class="col-md-6">
                    <h6>Prénom</h6>
                    <input class="form-control" type="text" placeholder="Votre prénom" name="Prenom" id="" value="{{ $user->Prenom ?? '' }}" required>
                </div>  </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Votre numéro de téléphone</h6>
                        <input class="form-control" type="text" name="Numero" id="" placeholder="Téléphone"  required>
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