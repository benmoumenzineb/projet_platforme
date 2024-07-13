<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body{
            background-color: #ffffff;
        }
        .card {
            transition: transform 0.3s;
            background-color:#173165;
        }
        .card:hover {
            transform: scale(1.05);
        }
        h5{
            color: #ffffff;
            font-weight: 700;
        }
        p{
            color: #ffffff;
            font-weight: 600;
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <img class="m-0 p-0 mt-0 img-logo mx-auto d-block" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="30%">
    <div class="container mt-5">
       
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                
                <div class="card">
                    <a href="{{route('homeadmin')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('homeadmin')}}">
                        <h5 class="card-title"> Admin</h5></a>
            
                    </div></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card"> <a href="{{route('homescolarite')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('homescolarite')}}">
                        <h5 class="card-title">Scolarité</h5></a>
                       
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card"><a href="{{route('homeprof')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('homeprof')}}">
                        <h5 class="card-title">Professeurs</h5></a>
                     
                    </div>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card"><a href="{{route('homeRH')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('homeRH')}}">
                        <h5 class="card-title">Ressources humaines</h5></a>
                       
                    </div></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card"><a href="{{route('homeacceuil')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('homeacceuil')}}">
                        <h5 class="card-title">Accueil</h5></a>
                       
                    </div></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card"><a href="{{route('etudient.login')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('etudient.login')}}">
                        <h5 class="card-title"> Étudiant</h5></a>
                       
                    </div></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>