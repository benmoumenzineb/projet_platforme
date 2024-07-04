
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
        @media (max-width: 767.98px) {
            .card {
                margin-bottom: 20px;
            }
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
       
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
                
                <div class="card">
                    <a href="{{route('admin.login')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('admin.login')}}">
                        <h5 class="card-title">Espace Admin</h5></a>
                        <p class="card-text">Accédez à l'espace administrateur.</p>
                    </div></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card"> <a href="{{route('login.scolarite')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('login.scolarite')}}">
                        <h5 class="card-title">Espace Scolarité</h5></a>
                        <p class="card-text">Accédez à l'espace scolarité.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card"><a href="{{route('login.prof')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('login.prof')}}">
                        <h5 class="card-title">Professeurs</h5></a>
                        <p class="card-text">Accédez à l'espace des professeurs.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card"><a href="{{route('login.RH')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('login.RH')}}">
                        <h5 class="card-title">Ressources humaines</h5></a>
                        <p class="card-text">Accédez à l'espace des RH</p>
                    </div></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card"><a href="{{route('login.accueil')}}">
                    <div class="card-body text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(255, 255, 255);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg><a href="{{route('login.accueil')}}">
                        <h5 class="card-title">Accueil</h5></a>
                        <p class="card-text">Accédez à l'espace d'accueil.</p>
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
