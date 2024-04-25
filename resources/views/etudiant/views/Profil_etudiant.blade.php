@extends('etudiant.layouts.navbaretudiant')

@section('contenu')

    <style>
       

        /* Ajout de style pour les boutons */
        #btn-info-etudiant,
        #btn-cursus {
            margin-bottom: 20px;
            margin-right: 10px;
            background: #173165;
            border: none;
        }

        #btn-info-etudiant:hover,
        #btn-cursus:hover {
            background: #3966c2;
        }

        .th-color {
            background-color: #3966c2;
            color: rgb(255, 255, 255);
        }

        #renseignement-academique-baccalaureat-content,
        #renseignement-academique-cursus-externe-content,
        #renseignement-academique-cursus-interne-content,
        #renseignement-academique-bourse-content,
        #renseignement-academique-cursus-interne-content{

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
            /* Adjust margin-left for larger screens */
            .content {
                margin-left: 300px;
            }
            .suptech_sante_radio {
                margin-left: 270px;
            }
        }
    </style>

    

    <!-- Boutons pour accéder aux informations -->
    <div style="margin-left: 300px; margin-top: 100px;">
        <button id="btn-info-etudiant" class="btn btn-primary">Informations Étudiant</button>
        <button id="btn-cursus" class="btn btn-primary">Cursus</button>
    </div>

    <!-- Formulaire pour Etablissement -->
    <div class="content">
        <div class="content" style="margin-left: -20px;">
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Etablissment</strong></legend>
                <form id="etablissment">
                    <div class="form-group">
                        <label for="Suptech"><strong>Suptech Santé :</strong></label>
                        <div class="suptech_sante_radio">
                            <label style="margin-right: 100px;">
                                <input type="radio" name="suptech_sante" value="Mohammedia">
                                Mohammedia
                            </label>
                            <label>
                                <input type="radio" name="suptech_sante" value="Essouira">
                                Essouira
                            </label>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>

    <!-- Autres formulaires et sections existants ici -->

    <!-- Formulaire pour Identifiants étudiant-->
    <div id="identifiants-etudiant-content" class="content" style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Identifiants étudiant</strong>
                </legend>

                <form id="identifiants_etudiant">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_etudiant" class="form-label"><strong>ID étudiant :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="id_etudiant" name="id_etudiant" required>

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
                                    <input type="text" class="form-control" id="Code_National" name="Code_National"
                                        required>
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
                                    <input type="text" class="form-control" id="cycle" name="cycle" required>

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
                                    <input type="date" class="form-control" id="date_inscription" name="date_inscription"
                                        required>

                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label"><strong>Prénom :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom" name="prenom" required>
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
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sexe" class="form-label"><strong>Sexe :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="sexe" name="sexe" required>
                                        <option value="" disabled selected></option>
                                        <option value="homme">Homme</option>
                                        <option value="femme">Femme</option>
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
                                    <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cin" class="form-label"><strong>CIN :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="cin" name="cin" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N_passeport" class="form-label"><strong>N° Passeport (Pour les étrangers)
                                            :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="N_passeport" name="N_passeport"
                                        required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="adresse" class="form-label"><strong>Adresse :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="adresse" name="adresse" required>
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
                                    <input type="text" class="form-control" id="tele" name="tele" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label"><strong>E-mail :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="handicap" class="form-label"><strong>Handicap:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="handicap" id="handicap_oui"
                                            value="oui">
                                        <label class="form-check-label" for="handicap_oui">Oui</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="handicap" id="handicap_non"
                                            value="non">
                                        <label class="form-check-label" for="handicap_non">Non</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="handicap_oui" class="form-label"><strong>Si,Oui lequel :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="handicap_oui" name="handicap_oui"
                                        required>
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
                                    <input type="text" class="form-control" id="nom_pere" name="nom-pere" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom_pere" class="form-label"><strong>Prenom pére :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom_pere" name="prenom_pere"
                                        required>
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
                                    <input type="text" class="form-control" id="N_tele" name="N_tele" required>
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
                                        name="Profession_pere" required>
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
                                    <input type="text" class="form-control" id="nom_mére" name="nom_mére" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prenom_mere" class="form-label"><strong>Prenom mére:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prenom_mere" name="prenom_mere"
                                        required>
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
                                    <input type="text" class="form-control" id="N_tele" name="N_tele" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prof_mere" class="form-label"><strong>Profession mére :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="prof_mere" name="prof_mere" required>
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
                                        name="persone_urgence" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N_tele" class="form-label"><strong>N° Téléphone :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="N_tele" name="N_tele" required>
                                </div>
                            </div>
                        </div>
                    </div>



                </form>
            </fieldset>
        </div>
    </div>

    <div class="modifier-content" style="margin-top: 20px; margin-right:10px; overflow: hidden;">
        <div class="row justify-content-end">
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <button type="submit" id="modifier" name="modifier" class="btn btn-primary"
                        style="background-color: #173165;border:none;">Modifier</button>
                </div>
            </div>
        </div>
    </div>

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
                            <table class="table" id="renseignement-academique" style="background-color:#ccc">
                                <!-- Entête du tableau -->
                                <thead>
                                    <!-- Entête du tableau -->
                                    <tr>
                                        <th class="th-color th-color border" scope="col">Année Bac</th>
                                        <th class="th-color th-color border" scope="col">Etablissment</th>
                                        <th class="th-color th-color border" scope="col">Bac</th>
                                        <th class="th-color th-color border" scope="col">Mention</th>
                                        <th class="th-color th-color border" scope="col">Ville</th>

                                    </tr>
                                </thead>
                                <!-- Corps du tableau -->
                                <tbody style="background-color:#ccc">
                                    <!-- Ligne de données de démonstration -->
                                    <tr>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                    </tr>
                                    <!-- Ajoutez plus de lignes selon vos besoins -->
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cursus externe-->
    <div id="renseignement-academique-cursus-externe-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top: 20px;">

            <div class="container">
                <div class="row">
                    <div class="col">

                        <fieldset class="border p-3">
                            <legend class="w-auto" style="font-size: 16px; color:#173165"><strong>Cursus Externe</strong>
                            </legend>
                            <table class="table" id="renseignement-academique">
                                <!-- Entête du tableau -->
                                <thead>
                                    <!-- Entête du tableau -->
                                    <tr>
                                        <th class="th-color th-color border" scope="col">Année universitaire </th>
                                        <th class="th-color th-color border" scope="col">Diplôme</th>
                                        <th class="th-color th-color border" scope="col">Obtenu</th>
                                        <th class="th-color th-color border" scope="col">Etablissement</th>
                                        <th class="th-color th-color border" scope="col">Mention</th>
                                        <th class="th-color th-color border" scope="col">Ville</th>

                                    </tr>
                                </thead>
                                <!-- Corps du tableau -->
                                <tbody style="background-color:#ccc">
                                    <!-- Ligne de données de démonstration -->
                                    <tr>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                    </tr>
                                    <!-- Ajoutez plus de lignes selon vos besoins -->
                                </tbody>
                            </table>
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
                            <table class="table" id="renseignement-academique">
                                <!-- Entête du tableau -->
                                <thead>
                                    <!-- Entête du tableau -->
                                    <tr>
                                        <th class="th-color th-color border" scope="col">Année universitaire </th>
                                        <th class="th-color th-color border" scope="col">Inscription</th>
                                        <th class="th-color th-color border" scope="col">Mention</th>
                                        <th class="th-color th-color border" scope="col">Etat</th>


                                    </tr>
                                </thead>
                                <!-- Corps du tableau -->
                                <tbody style="background-color:#ccc">
                                    <!-- Ligne de données de démonstration -->
                                    <tr>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>
                                        <td class="border"></td>

                                    </tr>

                                    <!-- Ajoutez plus de lignes selon vos besoins -->
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--bourse-->
    <div id="renseignement-academique-bourse-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top: 20px;">

            <div class="container">
                <div class="row">
                    <div class="col">

                        <fieldset class="border p-3">
                            <legend class="w-auto" style="font-size: 16px; color:#173165"><strong>Bourse</strong></legend>
                            <table class="table" id="renseignement-academique">
                                <!-- Entête du tableau -->
                                <thead>
                                    <!-- Entête du tableau -->
                                    <tr>
                                        <th class="th-color th-color border" scope="col">Etat de Bourse </th>
                                        <th class="th-color th-color border" scope="col">Pourcenyage de Bourse</th>


                                    </tr>
                                </thead>
                                <!-- Corps du tableau -->
                                <tbody style="background-color:#ccc">
                                    <!-- Ligne de données de démonstration -->
                                    <tr>
                                        <td class="border"></td>
                                        <td class="border"></td>


                                    </tr>

                                    <!-- Ajoutez plus de lignes selon vos besoins -->
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const btnInfoEtudiant = document.getElementById('btn-info-etudiant');
        const btnCursus = document.getElementById('btn-cursus');
        const etablissmentContent = document.getElementById('etablissment-content');
        const identifiantsEtudiantContent = document.getElementById('identifiants-etudiant-content');
        const renseignementsEtudiantContent = document.getElementById('renseignements-etudiant-content');
        const informationsParentsContent = document.getElementById('informations-parents-content');
        const renseignementAcademiquebacContent = document.getElementById('renseignement-academique-baccalaureat-content');
        const renseignementAcademiquecursusexterneContent = document.getElementById('renseignement-academique-cursus-externe-content');
        const renseignementAcademiquecursusinterneContent = document.getElementById('renseignement-academique-cursus-interne-content');
        const ModifierContent = document.getElementById('modifier');
        const renseignementAcademiquebourseContent = document.getElementById('renseignement-academique-bourse-content');

        btnInfoEtudiant.addEventListener('click', function() {
            //  contenu pour les informations de l'établissement 
            etablissmentContent.style.display = 'block';
            identifiantsEtudiantContent.style.display = 'block';
            renseignementsEtudiantContent.style.display = 'block';
            informationsParentsContent.style.display = 'block';
            ModifierContent.style.display = 'block';
            renseignementAcademiquebourseContent.style.display = 'none';
            renseignementAcademiquebacContent.style.display = 'none';
            renseignementAcademiquecursusexterneContent.style.display = 'none';
            renseignementAcademiquecursusinterneContent.style.display = 'none';
        });

        btnCursus.addEventListener('click', function() {
            //  contenu pour les renseignements académiques
            etablissmentContent.style.display = 'none';
            identifiantsEtudiantContent.style.display = 'none';
            renseignementsEtudiantContent.style.display = 'none';
            informationsParentsContent.style.display = 'none';
            ModifierContent.style.display = 'none';
            renseignementAcademiquebourseContent.style.display = 'block';
            renseignementAcademiquebacContent.style.display = 'block';
            renseignementAcademiquecursusexterneContent.style.display = 'block';
            renseignementAcademiquecursusinterneContent.style.display = 'block';
        });
    </script>