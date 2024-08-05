<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header-left img {
            width: 100px;
        }

        .header-center {
            text-align: center;
        }

        .header-center h1,
        .header-center h2 {
            margin: 0;
        }

        .header-right p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background-color: #f2f2f2;
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
        }

        tbody td {
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
            vertical-align: top;
        }

        .day-column {
            width: 12.5%;
        }

        .time-slot {
            background-color: #fff;
            min-height: 50px;
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="header-left">
                <img src="{{ public_path('logo.png') }}" alt="SUPTECH SANTE">
            </div>
            <div class="header-center">
                <h1>Emploi du Temps (Semestre 2)</h1>
                <h2>1ère Année Classe préparatoire<br>Groupe 1</h2>
            </div>
            <div class="header-right">
                <p>Site : Mohammedia</p>
                <p>Année universitaire : 2023 - 2024</p>
            </div>
        </header>
        <table>
            <thead>
                <tr>
                    <th class="day-column">Les jours</th>
                    @foreach (['08:30:00' => '08:30 - 10:25', '10:35:00' => '10:35 - 12:30', '12:30:00' => '12:30 - 13:30', '13:30:00' => '13:30 - 15:25', '15:35:00' => '15:35 - 17:30'] as $timeRange)
                        <th>{{ $timeRange }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($events->groupBy(
        fn($event) => Carbon\Carbon::parse($event['date']['date'])->locale('fr')->translatedFormat('l'),
    ) as $day => $dayEvents)
                    <tr>
                        <td style="text-align: center;">{{ $day }}</td>
                        @foreach (['08:30:00', '10:35:00', '12:30:00', '13:30:00', '15:35:00'] as $timeSlot)
                            <td class="time-slot">
                                @php
                                    $event = $dayEvents->firstWhere('heure_debut.time', $timeSlot);
                                @endphp
                                @if ($event)
                                    <strong>Module: {{ $event['module']['name'] }}</strong><br>
                                    <strong>Element: {{ $event['element']['name'] }}</strong><br>
                                    <strong>Pr. {{ $event['prof']['first_name'] }}
                                        {{ $event['prof']['last_name'] }}</strong><br>
                                    <strong>Salle: {{ $event['salle']['name'] }}</strong><br>
                                    <strong>Groupe: {{ $event['N_groupe'] }}</strong>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <footer>
            <p>*Les cours de vendredi après-midi commencent à 14h30 au lieu de 13h30</p>
        </footer>
    </div>
</body>

</html>
