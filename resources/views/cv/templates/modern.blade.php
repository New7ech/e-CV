<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV de {{ $cv->prenom }} {{ $cv->nom }}</title>
    <style>
        body { font-family: 'Helvetica Neue', sans-serif; color: #fff; background-color: #4A4A4A; }
        .container { width: 100%; margin: 0 auto; display: flex; }
        .left-column { background-color: #333; width: 35%; padding: 20px; }
        .right-column { width: 65%; padding: 20px; }
        .photo { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; margin: 0 auto 20px; display: block; border: 5px solid #fff; }
        .header h1 { margin: 0; font-size: 2em; text-transform: uppercase; }
        .header h2 { margin: 0; font-size: 1em; font-weight: normal; color: #ddd; }
        .section h3 { font-size: 1.2em; text-transform: uppercase; border-bottom: 2px solid #fff; padding-bottom: 5px; margin-bottom: 10px; }
        .section p, .section ul { margin: 0; padding: 0; list-style: none; }
        .section ul li { margin-bottom: 10px; }
        .experience .date { font-style: italic; color: #ccc; }
        .experience .company { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-column">
            @if($cv->photo)
                <img src="{{ storage_path('app/public/' . $cv->photo) }}" alt="Photo de profil" class="photo">
            @endif
            <div class="header">
                <h1>{{ $cv->prenom }} {{ $cv->nom }}</h1>
            </div>
            <div class="section">
                <h3>Contact</h3>
                <ul>
                    <li>{{ $cv->email }}</li>
                    <li>{{ $cv->telephone }}</li>
                    <li>{{ $cv->adresse }}</li>
                </ul>
            </div>
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
        <div class="right-column">
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
                        <div class="company">{{ $experience->entreprise }}</div>
                        <div><strong>{{ $experience->poste }}</strong> <span class="date">({{ $experience->periode }})</span></div>
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
                        <div class="company">{{ $education->etablissement }}</div>
                        <div><strong>{{ $education->diplome }}</strong> <span class="date">({{ $education->dates }})</span></div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
