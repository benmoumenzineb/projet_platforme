@extends('etudiant.layouts.navbaretudiant')
  
  @section('contenu')

  <style>
    .card {
      margin-top:80px;
      width: 60rem;
   
      background-color: #f8f9fa;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    .card-title {
      color: #3966c2;
    }
    
    .card-subtitle {
      font-size: 14px;
    }
    
    .card-text {
      color: #6c757d;}
      
    
    </style>

  <div class="container">
  <div class="card" id="myCard">
    <div class="card-body">
      <h5 class="card-title">Thermodynamique | Base de données</h5>
      <h6 class="card-subtitle mb-2 text-muted">24/05/2024 - 30/05/2024</h6>
      <h6 class="card-subtitle mb-2 text-muted">8:30 - 10:30 | 14:30 - 16:30</h6>
      <p class="card-text">Bonjour chers étudiants,vous avez un examen</p>
     
    </div>
  </div>
</div>

<script>
const card = document.getElementById('myCard');

card.addEventListener('mouseenter', function() {
  this.style.transform = 'translateY(-5px)';
});

card.addEventListener('mouseleave', function() {
  this.style.transform = 'translateY(0)';
});

</script>

  @endsection
