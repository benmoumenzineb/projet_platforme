<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
       
#demande {
    margin: 80px auto 50px;
    background-color: #b7b7b7;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    max-width: 800px; 
    width: 90%; 
    margin-left: auto; 
    margin-right: auto; 
}


h6 {
    color: #173165;
    margin-bottom: 10px;
}


.form-control {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 8px; 
    margin-bottom: 20px;
}


.button-enregistrer {
    width: 100%;
    padding: 10px;
    background-color:#173165;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}


.button-enregistrer:hover {
    background-color: #0d3d82;
}


@media (max-width: 320px) {
    #demande {
        padding: 20px; 
    }
    .form-control {
        padding: 6px;
    }
}

@media (min-width: 375px) {
    #demande {
        max-width: 80%; 
    }
}

@media (min-width: 425px) {
    #demande {
        max-width: 90%; 
    }
}

@media (min-width: 768px) {
    #demande {
        max-width: 600px; 
    }
}
@media (min-width: 1440px) {
    #demande {
        max-width: 900px; 
    }
}
@media (min-width: 1024px) {
    #demande {
        max-width: 800px; 
    }
}
@media (width: 2560px) {
    #demande {
     max-width: 1700px; 
     height: 500px;
     margin-left:-80px;
     margin-top: 120px;
     
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
#historique-demande-content
{
    display: none;
}
        /* Style pour les boutons cochés avec la couleur de fond verte */
    </style>








<div   style=" margin-top:-10px; overflow: hidden;">
    <div style="margin-left: 0px; margin-top: 100px;">
        <div class="content">
            <button id="boutonInformations">Informations Demande</button>
            <button id="boutonCursus">Historique</button>
            
        </div>
        
    </div></div>
    <div class="container"  id="informations-demande-content" style="margin-left: 250px; margin-top:10px; ">
    
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
    <fieldset class="border p-4">
        <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Informations Paiement</strong>
        </legend>
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
                        <input class="form-control" type="text" name="Numero" id="" value="{{ $user->telephone ?? '' }}" placeholder="Téléphone"  required>
                    </div>
                    <div class="col-md-6">
                        <h6>Votre Email</h6>
                        <input class="form-control" type="email" name="Email" id="" value="{{ $user->Email ?? '' }}" placeholder="Email" required>
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
        </form></fieldset>
    </div></div>

    <div class="container" id="historique-demande-content" style="margin-left: 250px; margin-top:90px; ">
        <div class="row">
            <div class="col-md-9">
                
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                <div class="container">
                    <table class="table table-striped" id="demandescolarite">
                        <thead>
                            <tr>
                               
                <th class="th-color border" scope="col">Nom</th>
                <th class="th-color border" scope="col">Prénom</th>
                <th class="th-color border" scope="col">Numero de Téléphone</th>
                <th class="th-color border" scope="col">Email</th>
                <th class="th-color border" scope="col">Type</th>
               
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    
    <script>
      
            $('#demandescolarite').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getDataDemandeetudiant')}}",
                columns: [
                  
                    { data: 'Nom', name: 'Nom' },
                    { data: 'Prenom', name: 'Prenom' },
                    { data: 'Numero', name: 'Numero' },
                    { data: 'Email', name: 'Email' },
                    { data: 'Type', name: 'Type' },
                   
                    
                ]
            });
        
    </script>
    <script>
        const boutonInformations = document.getElementById('boutonInformations');
        const boutonCursus = document.getElementById('boutonCursus');
        
        
        boutonInformations.addEventListener('click', function() {

            
           
            document.getElementById('informations-demande-content').style.display = 'block';
            
           
        
            
            document.getElementById('historique-demande-content').style.display = 'none';
          
        });
        
       
        boutonCursus.addEventListener('click', function() {
    
    document.getElementById('historique-demande-content').style.display = 'block';
    
    
    
   
    document.getElementById('informations-demande-content').style.display = 'none';
   
    
    
});
</script>
    
    @endsection