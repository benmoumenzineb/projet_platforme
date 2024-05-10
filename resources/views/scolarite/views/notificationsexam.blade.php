<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('scolarite.layouts.navbarscolarite')
          
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
</style>
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
    <form id="informations-personnelles" >
        @csrf
       

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
                        <input type="text" class="form-control" id="Martiere" name="Nom_Element"
                            required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="somme" class="form-label"><strong>Date Exam:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="somme" name="Date_exam" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="N_passeport" class="form-label"><strong>Heure Exam:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Horaire" name="heure_exam" placeholder="De ... à ...." required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="date" class="form-label"><strong>Date Rattrapage:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="Date" name="Date_ratt" required>
                    </div>
                </div>
            </div>

           
        </div>
        <div class="row mt-3">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <label for="date" class="form-label"><strong>Heure Rattrapage:</strong></label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="Date" name="heure_ratt" required>
                </div>
            </div>
        </div></div>

        <div class="row mt-3">
            <div class="col-md-12">
                <label for="mode"><strong>Message:</strong></label>
              
                </div>
                <div class="col-md-12"> <textarea name="Description" id="activite" cols="90" rows="9"></textarea></div>
            </div>
        

            <div class="row mt-3">
                <div class="col-md-12">
        <button type="submit" id="modifier" name="enregistrer" class="btn btn-primary">Envoyer</button>
            </div></div>
       
    </form>
</fieldset>
</div>
</div>



@endsection