<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV de {{ $cv->prenom }} {{ $cv->nom }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .container { width: 100%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 2.5em; }
        .header h2 { margin: 0; font-size: 1.2em; font-weight: normal; color: #555; }
        .photo { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin: 0 auto 10px; display: block; }
        .section { margin-bottom: 20px; }
        .section h3 { font-size: 1.5em; border-bottom: 2px solid #333; padding-bottom: 5px; margin-bottom: 10px; }
        .section p, .section ul { margin: 0; padding: 0; list-style: none; }
        .section ul li { margin-bottom: 10px; }
        .experience .date { float: right; font-style: italic; color: #555; }
        .experience .company { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        @if($cv->photo)
            <img src="{{ storage_path('app/public/' . $cv->photo) }}" alt="Photo de profil" class="photo">
        @endif
        <div class="header">
            <h1>{{ $cv->prenom }} {{ $cv->nom }}</h1>
            <h2>{{ $cv->email }} | {{ $cv->telephone }} | {{ $cv->adresse }}</h2>
        </div>

        @if($cv->objectif)
        <div class="section">
            <h3>Objectif</h3>
            <p>{{ $cv->objectif }}</p>
        </div>
        @endif

        @if($cv->experiences->count())
        <div class="section">
            <h3>Expériences Professionnelles</h3>
            <ul>
                @foreach($cv->experiences as $experience)
                <li class="experience">
                    <div class="date">{{ $experience->periode }}</div>
                    <div class="company">{{ $experience->entreprise }}</div>
                    <div><strong>{{ $experience->poste }}</strong></div>
                    <p>{{ $experience->description }}</p>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($cv->educations->count())
        <div class="section">
            <h3>Formation</h3>
            <ul>
                @foreach($cv->educations as $education)
                <li class="experience">
                    <div class="date">{{ $education->dates }}</div>
                    <div class="company">{{ $education->etablissement }}</div>
                    <div><strong>{{ $education->diplome }}</strong></div>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($cv->skills->count())
        <div class="section">
            <h3>Compétences</h3>
            <ul>
                @foreach($cv->skills as $skill)
                <li><strong>{{ $skill->nom }}:</strong> {{ $skill->niveau }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</body>
</html>
