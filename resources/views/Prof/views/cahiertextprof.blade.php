<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('Prof.layouts.navbarprof')
@section('contenu')




    <style>

        
      
        #modifier {
            background-color: #173165;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            width: 100%;
            height: 40px;
            
        }

        #modifier:hover {
            background-color: #3966c2
        }
h3{
    font-size: 25px;
    font-weight: 700;
}
      

        /* Style pour les boutons cochés avec la couleur de fond verte */
    </style>

<div id="informations-personnelles-content" class="content" style="margin-left: -20px; margin-top:70px; overflow: hidden;">
    <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
        <div id="reclamation" class="container">
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
    <form id="informations-personnelles" action="{{ route('enregistrercahiertext') }}" method="post">
        @csrf
        <div style="text-align: center;">
            <img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="25%">
            <h3 style=" padding:8px;">CAHIER DE TEXTES</h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nom" class="form-label"><strong>Cycle :</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Cycle" name="Cycle" required>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label"><strong>Filiére :</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="filiere" name="Filiere" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="filiere" class="form-label"><strong>Groupe
                                :</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Groupe" name="Groupe" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="Niveau" class="form-label"><strong>Niveau :</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Niveau" name="Niveau">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="Matiere" class="form-label"><strong>Matiére:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Martiere" name="Matiere"
                            required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="somme" class="form-label"><strong>Enseignant:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="somme" name="nom_enseignant" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="N_passeport" class="form-label"><strong>Horaire:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Horaire" name="horaire" placeholder="De ... à ...." required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="date" class="form-label"><strong>Date Seance:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="Date" name="Date" required>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-md-12">
                <label for="mode"><strong>Activités objectifs de la séance :</strong></label>
              
                </div>
                <div class="col-md-12"> <textarea name="Activites" id="activite" cols="90" rows="9"></textarea></div>
            </div>
        

            <div class="row mt-3">
                <div class="col-md-12">
        <button type="submit" id="modifier" name="enregistrer" class="btn btn-primary">Enregistrer</button>
            </div></div>
       
    </form>
</fieldset>
</div>
</div>



@endsection



