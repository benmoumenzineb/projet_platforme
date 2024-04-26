@extends('etudiant.layouts.navbaretudiant')
@section('contenu')

<style>
    
    .btn-primary {
        background-color: #3966c2;
        width: 100px;
    }
    .month-btn {
        margin: 5px;
    }
.btn-secondary {
    width: 97px;
    background-color: red;
    border: none;
   
}
.btn-close{
    background-color: #3966c2;
}
#modifier{
    background-color: #173165;
    color: rgb(255, 255, 255);
    border: none;
    border-radius: 5px;
    width: 110px;
    height: 40px;
}
#modifier:hover{
    background-color: #3966c2
}
.camera-button{
    
    background-color:transparent;
    border: none;
   
}

</style>



<div style="margin-left: 300px; margin-top: 80px;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        mois
    </button>
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mois</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary month-btn" id="janvier" name="janvier">Janvier</button>
                            <button type="button" class="btn btn-secondary month-btn" id="Fevrier" name="fevrier">Février</button>
                            <button type="button" class="btn btn-secondary month-btn" id="mars" name="mars">Mars</button>
                            <button type="button" class="btn btn-secondary month-btn" id="avril" name="avril">Avril</button>
                            <button type="button" class="btn btn-secondary month-btn" id="mai" name="mai">Mai</button>
                            <button type="button" class="btn btn-secondary month-btn" id="juin" name="juin">Juin</button>
                            <button type="button" class="btn btn-secondary month-btn" id="septembre" name="septembre">Septembre</button>
                            <button type="button" class="btn btn-secondary month-btn" id="octobre" name="octobre">Octobre</button>
                            <button type="button" class="btn btn-secondary month-btn" id="novembre" name="novembre">Novembre</button>
                            <button type="button" class="btn btn-secondary month-btn" id="decembre" name="decembre">Décembre</button>
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="informations-personnelles-content" class="content"
        style="margin-left: -20px; margin-top:20px; overflow: hidden;">
        <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
            <fieldset class="border p-3">
                <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Informations Personnelles</strong>
                </legend>
                <form id="informations-personnelles">
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
                                    <label for="filiere" class="form-label"><strong>Filiére
                                            :</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="filiere" name="filiere"
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
                                    <input type="text" class="form-select" id="cin" name="cin" required>
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N-telephone" class="form-label"><strong>N° Téléphone:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="N-telephone" name="N-telephone"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="somme" class="form-label"><strong>La somme totale en chiffre:</strong></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="somme" name="somme" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="N_passeport" class="form-label"><strong>Choix:
                                            </strong></label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="choix" name="choix" required>
                                        <option value="Internat" >Internat</option>
                                        <option value="Ecole">Ecole</option>
                                        <option value="Salle de sport">Salle de sport</option>
                                        <option value="Transport">Transport</option>
                                        
        
                                    </select>
                                </div>
                            </div>
                        </div>


                         </div>
                   

                </form>
            </fieldset>
        </div>
    </div>


<!--Informations Payment-->

<div class="content">
    <div class="content" style="margin-left: 280px;">
        <fieldset class="border p-3">
            <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Informations Paiement</strong></legend>
            <form id="informations-paiement">
                <div class="form-group">
                    <label for="mode"><strong>Mode de règlement Scolaire:</strong></label>
                    <div class="mode-reglement_radio">
                        <label style="margin-right: 100px;">
                            <input type="radio" name="mode" value="Especes">
                            Espèces
                        </label>
                        <label style="margin-right: 100px;">
                            <input type="radio" name="mode" value="Chéque">
                            Chéque
                        </label>
                        <label>
                            <input type="radio" name="mode" value="Virment">
                           Virement
                        </label>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>


    <div class="content" style="margin-top: 20px; overflow: hidden;">
        <div class="row justify-content-end">
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <button type="submit" id="modifier" name="modifier" class="btn btn-primary">Valider</button>
                    <button type="submit" class="camera-button"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-camera-fill ml-2" viewBox="0 0 16 16" style="color: #173165">
                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0"/>
                    </svg>
                </div></button>
            </div>
        </div>
    </div>
    

<script>
    // JavaScript pour gérer le clic sur les boutons des mois
    document.querySelectorAll('.month-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Récupérer le mois à partir de l'attribut data-month
            const month = this.getAttribute('data-month');
            // Vous pouvez ajouter votre propre logique pour gérer le clic sur le mois sélectionné
        });
    });
</script>

@endsection