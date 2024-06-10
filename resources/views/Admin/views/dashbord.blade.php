<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    @extends('Admin.layouts.navbaradmin')
    <style>
        .card {
            width:210px;
            border-radius: 15px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
    body{
        background-color: rgb(0, 0, 0);
    }
        .card:hover {
            transform: translateY(-5px);
        }
    
        .card-body {
            padding: 20px;
            text-align: center rgb(191, 139, 6);
            box-shadow: 0 8px 14px rgba(16, 16, 16, 0.1);
        }
    
        .card-title, .card-text {
            font-size: 24px;
            font-weight: bold;
        }
    
        .content {
            margin-left: 230px;
            margin-top: 100px;
            overflow: hidden;
        }
        canvas{
            padding: 20px;
            margin: 20px;
            background-color: rgb(255, 250, 250);
            box-shadow: 0 6px 12px rgba(16, 16, 16, 0.1);
        }
    </style>
    
 
@section('contenu')
<body style="background-color: #f4f4f4;">
<div style="margin-left: 240px;margin-top:100px;">
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                <div class="card-body" style="color: rgb(26, 131, 160)">
                    <h5 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16" style="color: rgb(26, 131, 160);">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
                            <path d="M4.176 9.032a.5.5 0 0 1-.656.327l-.5 1.7a.5.5 0 0 1 .294.605l4.5 1.8a.5.5 0 0 1 .372 0l4.5-1.8a.5.5 0 0 1 .294-.605l-.5-1.7a.5.5 0 0 1-.656-.327L8 10.466z"/>
                        </svg>&nbsp;Étudiants
                    </h5>
                    <p class="card-text">{{ $etudiantsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                <div class="card-body">
                    <h5 class="card-title" style="color:rgb(71, 0, 85); ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(71, 0, 85);">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>&nbsp;Enseignant
                    </h5>
                    <p class="card-text" style="color:rgb(71, 0, 85);">{{ $enseignantsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                <div class="card-body">
                    <h5 class="card-title" style="color:rgb(23, 49, 101); ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(23, 49, 101);">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>&nbsp;Personnel
                    </h5>
                    <p class="card-text" style="color:rgb(23, 49, 101);">{{ $personnelCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color: rgb(255, 250, 250);">
                <div class="card-body" style=" color:rgb(227, 108, 22);">
                    <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16" style=" color:rgb(227, 108, 22);">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                      </svg>&nbsp;Filières</h5>
                    <p class="card-text" style="color:rgb(227, 108, 22);">{{ $filieresCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                <div class="card-body" style="color:rgb(6, 129, 51);">
                    <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16" style="color:rgb(6, 129, 51);">
                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                      </svg>&nbsp;Éléments</h5>
                    <p class="card-text">{{ $elementsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                <div class="card-body" style="color:rgb(180, 0, 24);">
                    <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16" style="color:rgb(180, 0, 24);">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z"/>
                      </svg>&nbsp;Demandes</h5>
                    <p class="card-text" style="color:rgb(180, 0, 24);">{{ $demandesCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                <div class="card-body" style="color:rgb(57, 102, 194)">
                    <h5 class="card-title">Réclamations</h5>
                    <p class="card-text" style="color:rgb(57, 102, 194)" >{{ $reclamationsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card text-white" style="background-color:rgb(255, 250, 250);">
                <div class="card-body" style="color:rgb(174, 6, 109)">
                    <h5 class="card-title">Etablissement</h5>
                    <p class="card-text" style="color:rgb(174, 6, 109)" >{{ $etablissementCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
   

    <div class="row">
        <div class="col-md-6">
            <canvas id="etudiantsChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="personnelChart"></canvas>
        </div>
        <div class="col-md-12">
           
            <canvas id="elementsPieChart"></canvas>
        </div>
       

        
        <div class="col-md-6 ">
            <canvas id="demandesChart"></canvas>
        </div>
        
        <div class="col-md-6">
            <canvas id="elementsChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="reclamationsChart" width="800" height="400"></canvas></div>

            <div class="col-md-6">
                <canvas id="demandessChart" width="800" height="400"></canvas></div>
            
        
        <div class="col-md-12">
            <canvas id="filieresBubbleChart" width="300" height="200"></canvas>
        </div>
        <div class="col-md-8">
            <canvas id="etablissementsBubbleChart" width="300" height="200"></canvas>
        </div>
        
</div></div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart pour le personnel
    var personnelCtx = document.getElementById('personnelChart').getContext('2d');
    var personnelChart = new Chart(personnelCtx, {
        type: 'line',
        data: {
            labels: ['Personnel'],
            datasets: [{
                label: 'Nombre de personnel',
                data: [{{ $personnelCount }}],
                backgroundColor: 'rgb(23, 49, 101)',
                borderColor: 'rgb(23, 49, 101)', 
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    
    // Chart pour les étudiants
    var etudiantsCtx = document.getElementById('etudiantsChart').getContext('2d');
    var etudiantsChart = new Chart(etudiantsCtx, {
        type: 'bar',
        data: {
            labels: ['Etudiants'],
            datasets: [{
                label: 'Nombre d\'étudiants',
                data: [{{ $etudiantsCount }}],
                backgroundColor: 'rgb(26, 131, 160)',
                borderColor: 'rgb(26, 131, 160)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <script>
    var elementsCtx = document.getElementById('elementsChart').getContext('2d');
    var elementsChart = new Chart(elementsCtx, {
        type: 'bar',
        data: {
            labels: ['Element'],
            datasets: [{
                label: 'Nombre des elements',
                data: [{{ $elementsCount }}],
                backgroundColor: 'rgb(6, 129, 51)',
                borderColor: 'rgb(6, 129, 51)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
   </script>
<script>
    var demandesCtx = document.getElementById('demandesChart').getContext('2d');
    var demandesChart = new Chart(demandesCtx, {
        type: 'line',
        data: {
            labels: ['Demande'],
            datasets: [{
                label: 'Nombre de Demande',
                data: [{{ $demandesCount }}],
                backgroundColor: 'rgb(180, 0, 24)',
                borderColor: 'rgb(180, 0, 24)',
                width:100,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
<script>
    var elementsCtx = document.getElementById('elementsPieChart').getContext('2d');
var elementsChart = new Chart(elementsCtx, {
    type: 'bar',
    data: {
        labels: ['Etudiants','Enseignant', 'Personnel', 'Filières', 'Éléments'],
        datasets: [{
            label: 'Distribution',
            data: [{{ $etudiantsCount }},{{ $enseignantsCount }}, {{ $personnelCount }}, {{ $filieresCount }}, {{ $elementsCount }}],
            backgroundColor: [
                'rgb(26, 131, 160)',
                'rgb(71, 0, 85)',
                'rgb(23, 49, 101)',
                'rgb(227, 108, 22)',
                'rgb(6, 129, 51)'
            ],
            borderColor: [
                'rgb(26, 131, 160)',
                'rgb(71, 0, 85)',
                'rgb(23, 49, 101)',
                'rgb(227, 108, 22)',
                'rgb(6, 129, 51)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        indexAxis: 'y', // Pour afficher les barres horizontalement
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw;
                    }
                }
            }
        }
    }
});
</script>
<script>
var data = {
            bubbleData: @json($bubbleData)
        };

        var datasets = [];
        for (var i = 0; i < data.bubbleData.length; i++) {
            var filiere = data.bubbleData[i];
            datasets.push({
                label: filiere.intitule,
                data: [{
                    x: filiere.x,
                    y: filiere.y,
                    r: 10 
                }],
                backgroundColor: ' rgb(16, 87, 239)',
                borderColor: ' rgb(16, 87, 239)',
                borderWidth: 1
            });
        }

        // Create the bubble chart
        var filieresCtx = document.getElementById('filieresBubbleChart').getContext('2d');
        var filieresChart = new Chart(filieresCtx, {
            type: 'bar',
            data: {
                datasets: datasets
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Filiére' // Adjust this title as needed
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre d\'étudiants'
                        }
                    }
                }
            }
        });
</script>


<script>
    var data = {
                $lineData: @json($lineData)
            };
    
            var datasets = [];
            for (var i = 0; i < data.$lineData.length; i++) {
                var etablissement = data.$lineData[i];
                datasets.push({
                    label: etablissement.ville,
                    data: [{
                        x: etablissement.x,
                        y: etablissement.y,
                        r: 10 
                    }],
                    backgroundColor: 'rgb(174, 6, 109)',
                    borderColor: 'rgb(174, 6, 109)',
                    borderWidth: 1
                });
            }
    
            // Create the bubble chart
            var etablissementsCtx = document.getElementById('etablissementsBubbleChart').getContext('2d');
            var etablissementsChart = new Chart(etablissementsCtx, {
                type: 'bar',
                data: {
                    datasets: datasets
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Etablissement' // Adjust this title as needed
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nombre d\'étudiants'
                            }
                        }
                    }
                }
            });
    </script>
    
<script>
const moisLabels = <?php echo json_encode($moisLabels); ?>;
        const reclamationsData = <?php echo json_encode($reclamationsData); ?>;

        // Créer le contexte du graphique
        var reclamationsCtx = document.getElementById('reclamationsChart').getContext('2d');

        // Initialiser le graphique avec les données
        var reclamationsChart = new Chart(reclamationsCtx, {
            type: 'line',
            data: {
                labels: moisLabels,
                datasets: [{
                    label: 'Nombre de réclamations par mois',
                    data: reclamationsData,
                    backgroundColor: 'rgb(57, 102, 194)',
                    borderColor: 'rgb(57, 102, 194)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>

<script>

 const moisLabel = <?php echo json_encode($moisLabel); ?>;
        const demandesData = <?php echo json_encode($demandesData); ?>;

        // Créer le contexte du graphique
        var demandesCtx = document.getElementById('demandessChart').getContext('2d');

        // Initialiser le graphique avec les données
        var demandessChart = new Chart(demandesCtx, {
            type: 'line',
            data: {
                labels: moisLabel,
                datasets: [{
                    label: 'Nombre de demande par mois',
                    data: demandesData,
                    backgroundColor: 'rgb(191, 139, 6)',
                    borderColor: 'rgb(191, 139, 6)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>
</body>

@endsection