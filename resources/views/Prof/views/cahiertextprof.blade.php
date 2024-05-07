@extends('Prof.layouts.navbarprof')
@section('contenu')
<div class="container">
    
    <div id="renseignements-etudiant-content" class="content"
    style="margin-left: -50px; margin-top:180px; overflow: hidden;">
    <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
        
           <h2>CAHIER DE TEXTES</h2>

            <form id="renseignements_etudiant">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nom" class="form-label"><strong>Cycle:</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="nom" name="Nom" required>
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
                                <input type="date" class="form-control" id="date_naissance" name="Date_naissance"
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
                                <select class="form-select" id="sexe" name="Sexe" required>
                                    <option value="" disabled selected></option>
                                    <option value="homme">M</option>
                                    <option value="femme">F</option>
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
                                    required>
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
                                <input type="text" class="form-control" id="cin" name="Cni" required>
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
                                <input type="text" class="form-control" id="adresse" name="Adresse" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Pays" class="form-label"><strong>Pays:</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Pays" name="Pays" required>
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
                                <input type="text" class="form-control" id="tele" name="Telephone" required>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="form-label"><strong>E-mail :</strong></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="email" name="Email" required>
                            </div>
                        </div>
                    </div>
                </div>
               
                          
                    </div>
                </div>
            </div>

            </form>
        
    </div>
</div>









@endsection
   