@extends('etudiant.layouts.navbaretudiant')

@section('contenu')
<style>
    .style-demande{ background-color: #173165;
    font-family: Arial, sans-serif; /* Police de caractère */
    width: 100%;
    height:65px;
    margin-top:20px;
   cursor: pointer;
    }
    .h-w{
        height:auto;
        width:auto;
    }
    .style-demande:hover{
        background-color: #1858b1;
        transform: translateY(-6px);
    }
    .white-color{
        color:white;
    }
    .col-md-9 {
        -ms-flex: 0 0 75%;
        flex: 0 0 88%;
        max-width: 441%;
    }
    .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -38px;
    margin-left: -118px;
}
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

</div></div>
</form>
</div>
@endsection
