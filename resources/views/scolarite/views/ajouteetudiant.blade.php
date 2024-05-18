<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@extends('scolarite.layouts.navbarscolarite')
@section('contenu')


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
    <form id="informations-personnelles" action="{{ route('ajouteetudiant') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nom" class="form-label"><strong>Code massar :</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="CNE" name="CNE" required>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label"><strong>CNI:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="CNI" name="CNI" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="filiere" class="form-label"><strong>Nom
                                :</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nom" name="Nom" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="Niveau" class="form-label"><strong>Prénom :</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="¨Prenom" name="Prenom">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="Matiere" class="form-label"><strong>Sexe:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="sexe" name="Sexe"
                            required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="somme" class="form-label"><strong>Date Naissance:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Date_naissance" name="Date_naissance" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="N_passeport" class="form-label"><strong>Pays:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Horaire" name="Pays" placeholder="De ... à ...." required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="date" class="form-label"><strong>Diplôme d'acces:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="Date" name="Diplome_acces" required>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-md-12">
                <label for="mode"><strong>Activités objectifs de la séance :</strong></label>
              
                </div>
                <div class="col-md-12">
                    <textarea name="Activites" id="activite" class="form-control" rows="9"></textarea>
                </div>
                
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



