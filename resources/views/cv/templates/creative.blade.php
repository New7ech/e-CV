<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV de {{ $cv->prenom }} {{ $cv->nom }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Pacifico&display=swap');
        body { font-family: 'Montserrat', sans-serif; color: #444; background-color: #f0f2f5; }
        .container { width: 800px; margin: 50px auto; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); border-radius: 15px; }
        .header { text-align: center; margin-bottom: 40px; color: #fff; }
        .photo { width: 160px; height: 160px; border-radius: 50%; object-fit: cover; margin: 0 auto 20px; border: 7px solid rgba(255,255,255,0.8); }
        .header h1 { font-family: 'Pacifico', cursive; font-size: 3.5em; margin: 0; }
        .header h2 { font-size: 1.3em; margin: 10px 0 0; font-weight: 400; }
        .content-wrapper { background-color: #fff; border-radius: 10px; padding: 30px; }
        .section { margin-bottom: 30px; }
        .section h3 { font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 1.6em; color: #764ba2; border-bottom: 3px solid #764ba2; padding-bottom: 8px; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px; }
        .experience { position: relative; padding-left: 30px; margin-bottom: 20px; }
        .experience:before { content: ''; position: absolute; left: 5px; top: 5px; width: 10px; height: 10px; background-color: #667eea; border-radius: 50%; }
        .experience .date { float: right; font-weight: bold; color: #667eea; }
        .experience .company { font-size: 1.2em; font-weight: bold; color: #555; }
        .skills ul { list-style: none; padding: 0; display: flex; flex-wrap: wrap; gap: 15px; }
        .skills li { background-color: #f0f2f5; color: #555; padding: 10px 20px; border-radius: 8px; font-size: 1em; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @if($cv->photo)
                <img src="{{ storage_path('app/public/' . $cv->photo) }}" alt="Photo de profil" class="photo">
            @endif
            <h1>{{ $cv->prenom }} {{ $cv->nom }}</h1>
            <h2>{{ $cv->email }} | {{ $cv->telephone }} | {{ $cv->adresse }}</h2>
        </div>
        <div class="content-wrapper">
            @if($cv->objectif)
            <div class="section">
                <h3>Mon Objectif</h3>
                <p>{{ $cv->objectif }}</p>
            </div>
            @endif

            @if($cv->experiences->count())
            <div class="section">
                <h3>Expériences Créatives</h3>
                @foreach($cv->experiences as $experience)
                <div class="experience">
                    <div class="date">{{ $experience->periode }}</div>
                    <div class="company">{{ $experience->entreprise }}</div>
                    <div><strong>{{ $experience->poste }}</strong></div>
                    <p>{{ $experience->description }}</p>
                </div>
                @endforeach
            </div>
            @endif

            @if($cv->educations->count())
            <div class="section">
                <h3>Parcours Inspirant</h3>
                @foreach($cv->educations as $education)
                <div class="experience">
                    <div class="date">{{ $education->dates }}</div>
                    <div class="company">{{ $education->etablissement }}</div>
                    <div><strong>{{ $education->diplome }}</strong></div>
                </div>
                @endforeach
            </div>
            @endif

            @if($cv->skills->count())
            <div class="section skills">
                <h3>Mes Atouts</h3>
                <ul>
                    @foreach($cv->skills as $skill)
                    <li>{{ $skill->nom }} - {{ $skill->niveau }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
