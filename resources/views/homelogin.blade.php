<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .logo-container {
            margin-top: 20px;
            margin-bottom: 20px; 
            width: 30%; 
            max-width: 300px; 
        }
        .card {
            transition: transform 0.3s, background-color 0.3s;
            background-color: #173165;
            min-height: 200px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.05);
            background-color: #173171;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-body i {
            font-size: 3rem; 
            margin-bottom: 1rem;
            color: #ffffff;
            display: block; 
            margin: auto; 
        }
        h5.card-title {
            color: #ffffff;
            font-weight: 700;
            margin-top: 40px;
            text-align: center;
        }
        p {
            color: #ffffff;
            font-weight: 600;
            text-decoration: none;
        }
        @media (max-width: 992px) {
            .card-columns {
                column-count: 2;
                column-gap: 20px;
            }
            .logo-container {
                width: 50%; 
            }
        }
        @media (max-width: 576px) {
            .card-columns {
                column-count: 1;
            }
            .logo-container {
                width: 70%; 
            }
        }
        
    </style>
</head>
<body>
<<<<<<< HEAD
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
=======
    <div class="logo-container">
        <img class="m-0 p-0 mt-0 img-logo mx-auto d-block" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="100%">
    </div>
    <div class="container mt-4">
        <div class="card-columns">
            <a href="{{route('admin.login')}}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-shield"></i>
                    <h5 class="card-title">administrateur</h5>
                </div>
            </a>
            <a href="{{route('login.scolarite')}}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-graduate"></i>
                    <h5 class="card-title">Scolarité</h5>
>>>>>>> 4eaba6a2f78b8c36f012c2ce9bd47432d98c5849
                </div>
            </a>
            <a href="{{route('login.prof')}}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h5 class="card-title">Professeurs</h5>
                </div>
<<<<<<< HEAD
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card"><a href="{{route('etudient.login')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('etudient.login')}}">
                        <h5 class="card-title"> Étudiant</h5></a>
                       
                    </div></a>
=======
            </a>
            <a href="{{route('login.RH')}}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-tie"></i>
                    <h5 class="card-title">Ressources humaines</h5>
>>>>>>> 4eaba6a2f78b8c36f012c2ce9bd47432d98c5849
                </div>
            </a>
            <a href="{{route('login.accueil')}}" class="card">
                <div class="card-body text-center">
                    <i class="fas fa-concierge-bell"></i>
                    <h5 class="card-title">Accueil</h5>
                </div>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>