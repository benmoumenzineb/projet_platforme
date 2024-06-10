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






@endsection