<!-- resources/views/scolarite/views/notificationsexam.blade.php -->
@extends('scolarite.layouts.navbarscolarite')

@section('contenu')
<div id="informations-personnelles-content" class="content" style="margin-left: -20px; margin-top:110px; overflow: hidden;">
    <div class="content" style="margin-left: 300px; margin-top:20px; overflow: hidden;">
        <div id="reclamation" class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            
            <h2>Envoyer une notification d'examen</h2>
            <form action="{{ route('exam.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="num_element">Matière</label>
                    <select name="num_element" id="num_element" class="form-control">
                        @foreach($elements as $element)
                            <option value="{{ $element->num_element }}">{{ $element->intitule }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_filiere">Filière</label>
                    <select name="id_filiere" id="id_filiere" class="form-control">
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id_filiere }}">{{ $filiere->intitule }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exam_date">Date de l'examen</label>
                    <input type="date" name="date_exam" id="exam_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exam_time">Heure de l'examen</label>
                    <input type="time" name="heure_exam" id="exam_time" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
@endsection
