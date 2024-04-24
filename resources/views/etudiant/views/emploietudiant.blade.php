


@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
.style-btn{
    border:2px solid;
}
.background-section {
            position: relative;
            top: 60px; 
            left: 250px; 
            width: calc(100% - 250px); 
            height: calc(27vh - 60px); 
            background-color: #3966c2; 
            color: white; 
            font-size: 24px; 
            text-align: center; 
            padding: 39px; 
            z-index: 997; 
        }
       
.h2{
    
    font-size: 32px; 
    font-family: Arial, sans-serif; 
    font-weight: bold; 
}
</style>
<div class="background-section">
    <div><strong>Emploi du Temps</strong></div>
</div>
<div class="col-md-9 mr-5 mt-5 margin:100px">
    </div>
    
<div class="container">
<div class="  row">
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-3"></div>
<div class="col-md-9 mt-5">
   
    <img src="{{ asset('asset/images/emploi.jpg') }}" width="500px"alt="emploi">


</div></div>

<div class="row">
<div class="col-md-9 mt-3 ">
</div>
<div class="col-md-3 mt-3 ">
    <button class="btn style-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
</svg> Télécharger Emploi</button>
</div> </div></div>
@endsection
