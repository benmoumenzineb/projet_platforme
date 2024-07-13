<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #ffffff;
        }
        .card {
            transition: transform 0.3s, background-color 0.3s;
            background-color: #173165;
        }
        .card:hover {
            transform: scale(1.05);
            background-color: #;
        }
        @media (max-width: 767.98px) {
            .card {
                margin-bottom: 20px;
            }
        }
        h5 {
            color: #ffffff;
            font-weight: 700;
        }
        p {
            color: #ffffff;
            font-weight: 600;
            text-decoration: none;
        }
        .card-body {
            padding: 2rem;
        }
        .card-body i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #ffffff;
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
                        <div class="card-body text-center">
                            <i class="fas fa-user-shield"></i>
                            <h5 class="card-title">Espace Admin</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <a href="{{route('login.scolarite')}}">
                        <div class="card-body text-center">
                            <i class="fas fa-user-graduate"></i>
                            <h5 class="card-title">Espace Scolarité</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <a href="{{route('login.prof')}}">
                        <div class="card-body text-center">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <h5 class="card-title">Professeurs</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <a href="{{route('login.RH')}}">
                        <div class="card-body text-center">
                            <i class="fas fa-user-tie"></i>
                            <h5 class="card-title">Ressources humaines</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <a href="{{route('login.accueil')}}">
                        <div class="card-body text-center">
                            <i class="fas fa-concierge-bell"></i>
                            <h5 class="card-title">Accueil</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
