<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
   

.container {
    max-width: 1280px; 
    margin: 0 auto; 
    padding: 0 15px; 
}

.style-demande {
    background-color: #173165;
    font-family: Arial, sans-serif;
    width: 100%;
    height: 60px;
    margin-top: 20px;
    margin-left: 280px;
    cursor: pointer;
    color: #f0f0f0;
}
.style-demande:hover {
    background-color: #1858b1;
    transform: translateY(-15px);
    color: #f0f0f0;
}
.white-color {
    color: white;
}

/* Ajout de styles pour la version mobile */

</style>
<div class="col-md-9 mt-5 " ></div>
<div class="container h-w">
    <form action="">
<div class="  row">
   
<div class="col-md-9 mt-5  style-demande mt-5 d-flex justify-content-center">
   <button class="btn white-color ">Attestation Inscription</button>

</div></div>
<div class="  row" >
    
<div class="col-md-9 mt-4  style-demande mt-3 d-flex justify-content-center">
   <button class="btn white-color  ">Attestation réussite</button>

</div></div>
<div class="  row">
   
<div class="col-md-9 mt-4  style-demande mt-3 d-flex justify-content-center">
   <button class="btn white-color ">Certificat Scolarité</button>

</div>
<div class="col-md-9 mt-4  style-demande mt-3 d-flex justify-content-center">
    <button class="btn white-color">Relvé Note</button>
 
 </div></div>
</form>
</div>
@endsection

