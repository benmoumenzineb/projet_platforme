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
    @media (width: 2560px) {
        .container {
            max-width: 2600px;
            
        }}
    

h3{
font-size: 25px;
font-weight: 700;
}
</style>
@section('contenu')
<div id="informations-personnelles-content" class="content" style="margin-left: -20px; margin-top:190px; overflow: hidden;">
    <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
        <div id="reclamation" class="container">
           
        </ul>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('exams.store') }}" method="POST">
        @csrf


        <div class="row">
          
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="id_filiere"><strong>Filiere:</strong></label>

                    </div>
                    <div class="col-md-6">
                        <select name="id_filiere" id="id_filiere" class="form-control">
                            @foreach($filieres as $filiere)
                                <option value="{{ $filiere->id_filiere }}">{{ $filiere->intitule }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">

                        <label for="num_element"> <strong>Matiére:</strong></label>

                            

                    </div>
                    <div class="col-md-6">
                        <select name="num_element" id="num_element" class="form-control">
                            @foreach($elements as $element)
                                <option value="{{ $element->num_element }}">{{ $element->intitule }}</option>
                            @endforeach</select>


                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
           
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="somme" class="form-label"><strong>Date Exam:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control"  name="date_exam" id="date_exam" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="N_passeport" class="form-label"><strong>Heure Exam:</strong></label>
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="heure_exam" id="heure_exam" placeholder="De ... à ...." required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
           
           
            
        </div>

        
        <div class="row mt-3">
       </div>

      

            <div class="row mt-3">
                <div class="col-md-12">
        <button type="submit" id="modifier" name="enregistrer" class="btn btn-primary">Envoyer</button>
            </div></div>
       
    </form>
</fieldset>
</div>
</div>


<script>
  
    var cycleDropdown = document.getElementById("cycle");
   
    var filiereDropdown = document.getElementById("filiere");
   
    var groupeDropdown = document.getElementById("groupe");
  
    var matiereDropdown = document.getElementById("matiere");
    var niveauDropdown = document.getElementById("niveau");
   
    var options = {
        "CPI": {
            "filieres": [""],
            "niveaux":["","1ère Année","2ème Année"],
            "groupes": ["","Groupe 1", "Groupe 2", "Groupe 3"],
            "matieres": ["","Matière 1", "Matière 2", "Matière 3"]
        },
        "Licence": {
            "filieres": ["","Maintenance Médicale", "Génie Industriel et Logistique Hospitalière", "Informatique Décisionnelle et e-Santé", "Sciences de Gestion", "Techniques de Laboratoires de Biologie Médicale", "Infirmier Polyvalent", "Infirmier en Anesthésie et Réanimation", "Infirmier en Instrumentalisation de Bloc Opératoire"],
            "niveaux":[""],
            "groupes": ["","Groupe A", "Groupe B", "Groupe C"],
            "matieres": ["","Mathématiques", "Physique", "Chimie"]
        },
        "Ingénieur": {
            "filieres": ["","Génie Biomédical", "Génie digital et intelligence Artificielle en santé", "Filière Ingénieur 3"],
            "niveaux":[""],
            "groupes": ["","Groupe X", "Groupe Y", "Groupe Z"],
            "matieres": ["","Informatique", "Électronique", "Mécanique"]
        },
        "Master": {
            "filieres": ["","Master en dispositifs médicaux et affaires réglementaires", "Master en Maintenance et Génie biomédical","Master en entreprenariat et Management Technologique"],
            "niveaux":[""],
            "groupes": ["","Groupe I", "Groupe II", "Groupe III"],
            "matieres": ["","Recherche Opérationnelle", "Machine Learning", "Big Data"]
        }
    };

    
    cycleDropdown.addEventListener("change", function() {
        
        filiereDropdown.innerHTML = "";
        groupeDropdown.innerHTML = "";
        matiereDropdown.innerHTML = "";
       niveauDropdown.innerHTML = "";
        
        var selectedCycle = this.value;
        var selectedOptions = options[selectedCycle];
        
        selectedOptions.filieres.forEach(function(filiere) {
            var option = document.createElement("option");
            option.text = filiere;
            filiereDropdown.add(option);
        });
        selectedOptions.groupes.forEach(function(groupe) {
            var option = document.createElement("option");
            option.text = groupe;
            groupeDropdown.add(option);
        });
        selectedOptions.matieres.forEach(function(matiere) {
            var option = document.createElement("option");
            option.text = matiere;
            matiereDropdown.add(option);
        });
        selectedOptions.niveaux.forEach(function(niveau) {
            var option = document.createElement("option");
            option.text = niveau;
           niveauDropdown.add(option);
        });
    });
    
</script>



@endsection