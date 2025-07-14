<!DOCTYPE html>
<html>
<head>
    <title>CV Développeur</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; }
        .header { background-color: #333; color: #fff; padding: 20px; text-align: center; }
        .section { margin-bottom: 20px; }
        .section h2 { border-bottom: 2px solid #333; padding-bottom: 5px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $cv->prenom }} {{ $cv->nom }}</h1>
        <p>Développeur Web</p>
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
