<!DOCTYPE html>
<html>
<head>
    <title>CV Comptable</title>
    <style>
        body { font-family: 'Georgia', serif; }
        .header { background-color: #003366; color: #fff; padding: 20px; text-align: center; }
        .section { margin-bottom: 20px; }
        .section h2 { border-bottom: 2px solid #003366; padding-bottom: 5px; color: #003366; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $cv->prenom }} {{ $cv->nom }}</h1>
        <p>Comptable</p>
    </div>
    <div class="section">
        <h2>Objectif</h2>
        <p>{{ $cv->objectif }}</p>
    </div>
    <div class="section">
        <h2>Expériences</h2>
        @foreach($cv->experiences as $exp)
            <h3>{{ $exp->poste }} chez {{ $exp->entreprise }}</h3>
            <p>{{ $exp->periode }}</p>
            <p>{{ $exp->description }}</p>
        @endforeach
    </div>
    <div class="section">
        <h2>Formation</h2>
        @foreach($cv->educations as $edu)
            <h3>{{ $edu->diplome }} - {{ $edu->etablissement }}</h3>
            <p>{{ $edu->dates }}</p>
        @endforeach
    </div>
    <div class="section">
        <h2>Compétences</h2>
        <ul>
            @foreach($cv->skills as $skill)
                <li>{{ $skill->nom }} - {{ $skill->niveau }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
