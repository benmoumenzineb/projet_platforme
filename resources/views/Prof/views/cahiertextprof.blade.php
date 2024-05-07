
@extends('Prof.layouts.navbarprof')
@section('contenu')
<style>
    h2{
        font-size: 35px;
        font-weight: 700;
    }
    .btn-enreg{
        background-color: #173165;
        border: none;
    }
    @media screen and (max-width: 320px) {
        .content {
            margin-left: 10px !important;
        }

        .img-logo {
            width: 80% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        h2 {
            font-size: 25px !important;
            margin-left: 90px !important;
        }
    }
    @media (width: 1024px) {
        .content {
            margin-left: 120px !important;
        }

        .img-logo {
            width: 30% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        h2 {
            font-size: 25px !important;
            margin-left: 70px !important;
        }
        .btn-enreg{
            margin-left: 240px !important;
        }
    }
   
    @media (width: 1440px) {
        .content {
            margin-left: 90px !important;
        }
        .btn-enreg{
            margin-left: 180px !important;
        }
        .img-logo {
            width: 30% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        h2 {
            font-size: 25px !important;
            margin-left: 70px !important;
        }
    }

    @media screen and (min-width: 321px) and (max-width: 375px) {
        .content {
            margin-left: 30px !important;
        }

        .img-logo {
            width: 80% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        h2 {
            font-size: 30px !important;
            margin-left: 100px !important;
        }
    }

    @media screen and (min-width: 376px) and (max-width: 425px) {
        .content {
            margin-left: 50px !important;
        }

        .img-logo {
            width: 80% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        h2 {
            font-size: 32px !important;
            margin-left: 120px !important;
        }
    }

    @media screen and (min-width: 426px) and (max-width: 768px) {
        .content {
            margin-left: 100px !important;
        }

        .img-logo {
            width: 80% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        h2 {
            font-size: 35px !important;
            margin-left: 210px !important;
        }
    }
    @media (width: 2560px) {
        .content {
            margin-left: -250px !important;
        }

        .img-logo {
            width: 30% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        h2 {
            font-size: 35px !important;
            margin-left: 10px !important;
        }
    }
</style>

<div class="container">
    <div id="renseignements-etudiant-content" class="content" style="margin-top: 50px; margin-left:250px; text-align: center;">
        <img class="m-0 p-0 img-logo mt-4" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="35%" style="margin-left: auto; margin-right: auto;">
        <h2>CAHIER DE TEXTES</h2>

        <div class="content" style="margin-top:10px; overflow: hidden;">
            <form id="renseignements_etudiant">
                <!-- Your form here --><div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <label for="cycle" class="form-label"><strong>Cycle:</strong></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="nom" name="Cycle" required>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <label for="filiere" class="form-label"><strong>Filiére :</strong></label>
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
                <label for="date_naissance" class="form-label"><strong>Groupe
                        :</strong></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="Groupe" name="Groupe"
                    required>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <label for="sexe" class="form-label"><strong>Matiére:</strong></label>
            </div>
            <div class="col-md-6">
               <input type="text" class="form-control" id="Matiere" name="Matiere"
                required>

            </div>
        </div>
    </div>
</div>

<hr>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <label for="Enseignant" class="form-label"><strong>Enseignant :</strong></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="Enseignant" name="Enseignant" required>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label"><strong>Horaire :</strong></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="Horaire " name="Horaire" placeholder="De 15h à 17h" required>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label"><strong>Date :</strong></label>
            </div>
            <div class="col-md-6">
                <input type="date" class="form-control" id="Horaire " name="Horaire" placeholder="De 15h à 17h" required>
            </div>
        </div></div></div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <label for="date" class="form-label"><strong>Activité et objectifs de la séance :</strong></label>
                    </div>
                    <div class="col-md-12">
                        <textarea class="form-control" rows="8"  name="activite" placeholder="......"></textarea>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <div class="col-md-12">
                <button type="submit" class="btn btn-enreg btn-primary" style="width: 100%;">Enregistrer</button></div></div>
            </form>
        </div>
    </div>
</div>

@endsection



