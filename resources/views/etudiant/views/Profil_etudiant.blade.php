<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')

@section('contenu')

    <style>
       input :read-only{
        background-color: #ffffff;
       }
       #boutonInformations, #boutonCursus{
    background-color: #173165; 
    color: white; 
   
    text-align: center; 
    text-decoration: none; 
 padding: 5px;
    font-size: 17px; 
    margin: 4px 2px; 
    cursor: pointer;
    border-radius: 5px;
    border: 5px #173165; 
    transition-duration: 0.4s; 
}
tr{
    color: rgb(105, 101, 101)
}

    #boutonInformations:hover{
        background-color: #3966c2;
    border: 5px #3966c2;
    }
    #boutonCursus:hover{
        background-color: #3966c2;
    border: 5px #3966c2;
    }
        .th-color {
            background-color: #3966c2;
            color: rgb(255, 255, 255);
        }
        #renseignement-academique-bourse-content,
#renseignement-academique-baccalaureat-content,
#renseignement-academique-cursus-interne-content,
#renseignement-academique-cursus-externe-content,
#documents-content{
    display: none;
}

       



        .content {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .suptech_sante_radio {
            margin-left: 0px;
        }

        @media (min-width: 768px) {

           
            .content {
                margin-left: 300px;
            }

            .suptech_sante_radio {
                margin-left: 270px;
            }
        }
        .form-control:disabled, .form-control[readonly] {
    background-color: #ffffff;
   
}
        
    </style>



   
    <div   style=" margin-top:20px; overflow: hidden;">
    <div style="margin-left: 0px; margin-top: 100px;">
        <div class="content">
            <button id="boutonInformations">Informations étudiant</button>
            <button id="boutonCursus">Cursus</button>
            
        </div>
        
    </div></div>
    <form>
    
        <div class="content">
            <div id="image-content" style="margin-left: -20px;">
                <fieldset class="border p-3">
                    <legend class="w-auto" style="font-size: 16px; color:#173165"><strong>Image Profile</strong></legend>
                    <form method="POST" action="{{ route('upload.image') }}" enctype="multipart/form-data" style="display: flex; align-items: center;">
                        @csrf
                        <div id="imagePreview" style="width: 120px; height: 120px; overflow: hidden; border: 1px solid #ddd;">
                            @if(auth()->guard('etudient')->user()->image)
                                <img src="{{ asset(auth()->guard('etudient')->user()->image) }}" alt="Image de profil" id="profileImage" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <img id="profileImage" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                            @endif
                        </div>
                        <div style="margin-left: 10px;">
                            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <button type="submit" style="margin-top: 10px;">Enregistrer l'image</button>
                        </div>
                    </form>
                    
                    
                    
                </fieldset>
            </div>
        </div>



  

    <!-- Formulaire pour Etablissement -->
    <div class="content">
        <div class="etablissment-content" style="margin-left: -20px;">
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong>Etablissment</strong></legend>
                <form id="etablissment">
                    <div class="form-group">
                        <label for="Suptech"><strong>Suptech Santé :</strong></label>
                        <div class="suptech_sante_radio">
                            <label style="margin-right: 100px;">
                                <input type="radio" name="Etablissement" value="{{ $etablissement->ville ?? '' }}" {{ $etablissement ? 'checked' : '' }}  readonly>
                                Mohammedia
                            </label>
                            <label>
                                <input type="radio" name="Etablissement" value="{{ $etablissement->ville ?? '' }}" {{ $etablissement ? 'checked' : '' }} readonly>
                                Essouira
                            </label>
                        </div>
                        
                    </div>
                </form>
            </fieldset>
        </div>
    </div>

   
    <div id="identifiants-etudiant-content" class="content" style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Identifiants étudiant</strong>
                </legend>

                <form id="identifiants_etudiant" action="" method="" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_etudiant" class="form-label"><strong>Code Apogee :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="id_etudiant" name="apogee" value="{{ $user->apogee ?? '' }}"readonly>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Code_National" class="form-label"><strong>Code National de l'Etudiant(CNE)
                                 :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="Code_National" name="Cne"
                                    value="{{ $user->CNE ?? '' }}" readonly>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cycle" class="form-label"><strong>Cycle :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="cycle" name="Cycle" value="{{ $filiere->cycle ?? '' }}" readonly>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date_inscription" class="form-label"><strong>Date d'inscription
                                            :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="date_inscription" name="num_annee"  value="{{ $inscription->num_annee ?? '' }}"
                                    readonly>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cycle" class="form-label"><strong>Pourcentage de Bourse :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="Pourcentage_bourse" name="Pourcentage_bourse"  value="{{ $user->Pourcentage_bourse ?? '' }}" readonly>

                                </div>
                            </div>
                        </div></div>
                </form>
            </fieldset>
        </div>
    </div>



    <!-- Formulaire pour Renseignements étudiant ou personnels-->
    <div id="renseignements-etudiant-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Renseignements étudiant</strong>
                </legend>
                <form id="renseignements_etudiant">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nom" class="form-label"><strong>Nom :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Nom ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label"><strong>Prénom :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom" name="Prenom" value="{{ $user->Prenom ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date_naissance" class="form-label"><strong>Date de naissance
                                            :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="date_naissance" name="Date_naissance" value="{{ $user->Date_naissance ?? '' }}"
                                    readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sexe" class="form-label"><strong>Sexe :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="sexe" name="Sexe" required disabled>
                                        <option value="" disabled selected></option>
                                        <option value="M" {{ $user->Sexe == 'M' ? 'selected' : '' }}>M</option>
                                        <option value="F" {{ $user->Sexe == 'F' ? 'selected' : '' }}>F</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="lieu_naissance" class="form-label"><strong>Lieu de naissance
                                            :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="lieu_naissance" name="Lieu_naissance"
                                    readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cin" class="form-label"><strong>CNI /N° Passeport (Pour les étrangers)
                                        :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="cin" name="Cni" value="{{ $user->CNI ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mt-3">
                       


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="adresse" class="form-label"><strong>Adresse :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="adresse" name="Adresse" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Pays" class="form-label"><strong>Pays:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="Pays" name="Pays" value="{{ $user->Pays ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="telephone" class="form-label"><strong>Téléphone :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="tele" name="Telephone" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label"><strong>E-mail :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="email" name="Email" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                              
                        </div>
                    </div>


                </form>
            </fieldset>
        </div>
    </div>


    <!-- Formulaire pour les informations parents-->


    <div id="informations-parents-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Informations parents</strong>
                </legend>
                <form id="informations-parents">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nom_pere" class="form-label"><strong>Nom pére :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nom_pere" name="Nom_pere" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom_pere" class="form-label"><strong>Prenom pére :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom_pere" name="Prenom_pere"
                                    readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N_tele" class="form-label"><strong>N° Téléphone :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="N_tele" name="Telephone_pere" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Profession_pere" class="form-label"><strong>Profession pére
                                            :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="Profession_pere"
                                        name="Profession_pere" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nom_mére" class="form-label"><strong>Nom mére:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nom_mére" name="Nom_mere" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom_mere" class="form-label"><strong>Prenom mére:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom_mere" name="Prenom_mere"
                                    readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N_tele" class="form-label"><strong>N° Téléphone:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="N_tele" name="Telephone_mere" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prof_mere" class="form-label"><strong>Profession mére :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prof_mere" name="Profesion_mere" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="persone_urgence" class="form-label"><strong>Tuteur:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="persone_urgence"
                                        name="Nom_tuteur" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N_tele" class="form-label"><strong>N° Téléphone :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="N_tele" name="Telephone_tuteur" readonly>
                                </div>
                            </div>
                        </div>
                    </div>



                </form>
            </fieldset>
        </div>
    </div>

    
</form>
    <!--Tableau pour Renseignements Académique -->
    <div id="renseignement-academique-baccalaureat-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top: 20px;">

            <div class="container">
                <div class="row">
                    <div class="col">

                        <fieldset class="border p-3">
                            <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Baccalauréat</strong>
                            </legend>
                            <form id="informations-parents">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nom_pere" class="form-label"><strong>Année Bac:</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="annee_bac" name="annee_bac"  readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="prenom_pere" class="form-label"><strong> Etablissment:</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="prenom_pere" name="Prenom_pere" value="{{ $user->Etablissement_bac ?? '' }}" readonly
                                                   >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="N_tele" class="form-label"><strong>Bac :</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="N_tele" name="Telephone_pere" value="{{ $user->Serie_bac ?? '' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Profession_pere" class="form-label"><strong>Mention
                                                        :</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="Profession_pere"
                                                    name="Profession_pere" value="{{ $user->Mention_bac ?? '' }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        

                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="renseignement-academique-cursus-externe-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top: 20px;">

            <div class="container">
                <div class="row">
                    <div class="col">

                        <fieldset class="border p-3">
                            <legend class="w-auto" style="font-size: 16px; color:#173165"><strong>Cursus Externe</strong>
                            </legend>
                            <form id="informations-parents">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nom_pere" class="form-label"><strong>Année universitaire :</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="annee_bac" name="annee_bac"readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="prenom_pere" class="form-label"><strong> Diplôme:</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="prenom_pere" name="Prenom_pere" value="{{ $user->Specialite_diplome ?? '' }}" readonly
                                                   >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="N_tele" class="form-label"><strong>Obtenu :</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="N_tele" name="Telephone_pere" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Profession_pere" class="form-label"><strong>Etablissement
                                                        :</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="Profession_pere"
                                                    name="Profession_pere" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                        

                                   
                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="renseignement-academique-cursus-interne-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top: 20px;">

            <div class="container">
                <div class="row">
                    <div class="col">

                        <fieldset class="border p-3">
                            <legend class="w-auto" style="font-size: 16px; color:#173165"><strong>Cursus Interne</strong>
                            </legend>
                            
                            <form id="informations-parents">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nom_pere" class="form-label"><strong>Année universitaire :</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="annee_bac" name="annee_bac" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="prenom_pere" class="form-label"><strong> Inscription:</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="prenom_pere" name="Prenom_pere"readonly
                                                   >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="N_tele" class="form-label"><strong>Mention:</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="N_tele" name="Telephone_pere" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Profession_pere" class="form-label"><strong>Etat
                                                        :</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="Profession_pere"
                                                    name="Profession_pere" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                        

                                       


                        </div>
                </div>
            </div>
        </div>
    </div>
  

    


    <script>
        const boutonInformations = document.getElementById('boutonInformations');
        const boutonCursus = document.getElementById('boutonCursus');
        
        
        boutonInformations.addEventListener('click', function() {

            document.getElementById('image-content').style.display = 'block';
            document.querySelector('.etablissment-content').style.display = 'block';
            document.getElementById('identifiants-etudiant-content').style.display = 'block';
            document.getElementById('renseignements-etudiant-content').style.display = 'block';
            document.getElementById('informations-parents-content').style.display = 'block';
            
           
        
            
            document.getElementById('renseignement-academique-baccalaureat-content').style.display = 'none';
            document.getElementById('renseignement-academique-cursus-externe-content').style.display = 'none';
            document.getElementById('renseignement-academique-cursus-interne-content').style.display = 'none';
            

        });
        
       
        boutonCursus.addEventListener('click', function() {
    
    document.getElementById('renseignement-academique-baccalaureat-content').style.display = 'block';
    document.getElementById('renseignement-academique-cursus-externe-content').style.display = 'block';
    document.getElementById('renseignement-academique-cursus-interne-content').style.display = 'block';
    
    
    
    document.getElementById('image-content').style.display = 'none';
    document.querySelector('.etablissment-content').style.display = 'none';
    document.getElementById('identifiants-etudiant-content').style.display = 'none';
    document.getElementById('renseignements-etudiant-content').style.display = 'none';
    document.getElementById('informations-parents-content').style.display = 'none';
   
    
    
});
</script>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profileImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>



    
