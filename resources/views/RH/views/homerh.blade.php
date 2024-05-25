<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('RH.layouts.navbarrh')
   
 
@section('contenu')


    <style>
        .custom-background:hover{
background-color:#1858b1;
        transform: translateY(-5px);
        }
        .custom-background{
            background-color:#173165;
        } 
        
/* For screens smaller than 320px */
@media screen and (max-width: 320px) {
    /* Adjust the margin and padding for smaller screens */
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


@media screen and (min-width: 426px) and (max-width: 768px) {
    
    #page-content {
        margin-left: 50px;
        margin-right: 50px;
        padding: 50px;
    }
}


@media screen and (min-width: 769px) and (max-width: 1024px) {
   
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
       <a href="{{ route('listPersonnel') }}"> <div class="card mb-3 mr-3 mt-4  custom-background" style="width: 300px;color:#ffffff; margin-right: 20px;"style="color: #ffffff;">
           
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16"  style="color: #ffffff;">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('listPersonnel') }}" style="color: #ede8e8; text-decoration:none;"> Liste Personnel</a></h5>
                
            </div>
         </div></a>

       <a href="{{route('cahiertextprof')}}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
            
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16" style="color: #ffffff;">
                    <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"><a href="{{route('cahiertextprof')}}" class="{{ Request::is('emploi') ? 'active' : '' }}" style="color: #ede8e8;text-decoration:none;"></a></h5>
               
            </div>
        </div></a>
        
      
    </div>
   

          
    </div>

    
      
                    








@endsection

