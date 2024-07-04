<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('Admin.layouts.navbaradmin')
@section('contenu')

<div class="container" style="margin-left: 220px; margin-top: 60px; width: 100%; overflow: hidden;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header" style="background-color: #173165; color: #ffffff; font-weight: 600;">Créer un compte</div>
                <div class="card-body">
                    @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
                    <form method="POST" action="{{ route('creationcomptes') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="nom" required style="height: 30px;">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required style="height: 30px;">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required style="height: 30px;">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="mot_passe" required style="height: 30px;">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmation du mot de passe</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required style="height: 30px;">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #173165;">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
