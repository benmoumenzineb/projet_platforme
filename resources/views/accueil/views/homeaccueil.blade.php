<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('accueil.layouts.navbaracceuil')
   
 
@section('contenu')


    <style>
        .custom-background:hover{
background-color:#1858b1;
        transform: translateY(-5px);
        }
        .custom-background{
            background-color:#173165;
        } 
        

@media screen and (max-width: 320px) {
   
    #page-content {
        margin-left: 10px;
        margin-right: 10px;
        padding: 20px;
    }
}

/* For screens between 321px and 375px */
@media screen and (min-width: 321px) and (max-width: 375px) {
    /* Adjust the margin and padding for smaller screens */
    #page-content {
        margin-left: 20px;
        margin-right: 20px;
        padding: 30px;
    }
}

/* For screens between 376px and 425px */
@media screen and (min-width: 376px) and (max-width: 425px) {
    /* Adjust the margin and padding for smaller screens */
    #page-content {
        margin-left: 30px;
        margin-right: 30px;
        padding: 40px;
    }
}

/* For screens between 426px and 768px */
@media screen and (min-width: 426px) and (max-width: 768px) {
    /* Adjust the margin and padding for medium screens */
    #page-content {
        margin-left: 50px;
        margin-right: 50px;
        padding: 50px;
    }
}

/* For screens between 769px and 1024px */
@media screen and (min-width: 769px) and (max-width: 1024px) {
    /* Adjust the margin and padding for medium screens */
    #page-content {
        margin-left: 100px;
        margin-right: 100px;
        padding: 60px;
        
    }
}


@media screen and (min-width: 1025px) and (max-width: 1440px) {
    
    #page-content {
        margin-left: 150px;
        margin-right: 150px;
        padding: 70px;
        overflow-x: hidden;
    }
}


@media screen and (min-width: 1441px) and (max-width: 2560px) {
   
    #page-content {
        margin-left: 200px;
        margin-right: 200px;
        padding: 80px;
        
    }
}


@media screen and (min-width: 2561px) {
   
    #page-content {
        margin-left: 250px;
        margin-right: 250px;
        padding: 90px;
    }
   
}


    </style>

<div id="page-content" class="d-flex flex-column" style="margin-left: 250px; padding: 20px;
margin-right:10px;margin-top:30px; padding: 40px;
">
    <div class="d-flex justify-content-left">
       <a href="{{ route('absence.accueil') }}"> <div class="card mb-3 mr-3 mt-4  custom-background" style="width: 300px;color:#ffffff; margin-right: 20px;"style="color: #ffffff;">
           
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16"style="color: #ffffff;">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('absence.accueil') }}" style="color: #ede8e8; text-decoration:none;">Présence Enseignant</a></h5>
                
            </div>
         </div></a>

       <a href="{{route('cahiertextprof')}}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
          
            <div class="card-body text-center">
                <svg class=" icon-color" xmlns="http://www.w3.org/2000/svg" width="70"
                                    height="70" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16" style="color: #ffffff;">
                                    <path
                                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>
                <h5 class="card-title" style="color: #ede8e8"><a href="{{route('cahiertextprof')}}" class="{{ Request::is('emploi') ? 'active' : '' }}" style="color: #ede8e8;text-decoration:none;">Emploi du temps</a></h5>
               
            </div>
        </div></a>
        
       </div>

          
    </div>

    
      
                    








@endsection

