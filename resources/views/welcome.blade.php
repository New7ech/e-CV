<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Générateur de CV en Ligne</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <!-- Styles -->
        <style>
            body { background-color: #f3f4f6; font-family: 'Instrument Sans', sans-serif; }
            .container { max-width: 1200px; margin: 0 auto; padding: 0 15px; }
            .header { text-align: center; padding: 50px 0; }
            .header h1 { font-size: 2.5rem; font-weight: 600; color: #1f2937; }
            .header p { font-size: 1.125rem; color: #4b5563; margin-top: 1rem; }
            .cv-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; }
            .cv-card { background-color: #fff; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); overflow: hidden; }
            .cv-card img { width: 100%; height: auto; }
            .cv-card-content { padding: 1.5rem; }
            .cv-card-title { font-size: 1.25rem; font-weight: 600; color: #1f2937; }
            .cv-card-button { display: inline-block; background-color: #3b82f6; color: #fff; font-weight: 600; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; margin-top: 1rem; transition: background-color 0.3s; }
            .cv-card-button:hover { background-color: #2563eb; }
            .footer { text-align: center; padding: 50px 0; color: #4b5563; }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1>Créez un CV professionnel en quelques minutes</h1>
                <p>Notre outil simple et intuitif vous guide à chaque étape.</p>
            </header>

            <main>
                <div class="cv-grid">
                    <div class="cv-card">
                        <img src="https://via.placeholder.com/400x500.png/333333/ffffff?text=CV+D%C3%A9veloppeur" alt="Aperçu du CV Développeur">
                        <div class="cv-card-content">
                            <h2 class="cv-card-title">Modèle Développeur</h2>
                            <a href="{{ route('cv.create', ['template' => 'developpeur']) }}" class="cv-card-button">
                                Choisir ce modèle
                            </a>
                        </div>
                    </div>
                    <div class="cv-card">
                        <img src="https://via.placeholder.com/400x500.png/003366/ffffff?text=CV+Comptable" alt="Aperçu du CV Comptable">
                        <div class="cv-card-content">
                            <h2 class="cv-card-title">Modèle Comptable</h2>
                            <a href="{{ route('cv.create', ['template' => 'comptable']) }}" class="cv-card-button">
                                Choisir ce modèle
                            </a>
                        </div>
                    </div>
                    <div class="cv-card">
                        <img src="https://via.placeholder.com/400x500.png/f4b41a/ffffff?text=CV+Designer" alt="Aperçu du CV Designer">
                        <div class="cv-card-content">
                            <h2 class="cv-card-title">Modèle Designer</h2>
                            <a href="{{ route('cv.create', ['template' => 'designer']) }}" class="cv-card-button">
                                Choisir ce modèle
                            </a>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="footer">
                <p>&copy; {{ date('Y') }} Générateur de CV. Tous droits réservés.</p>
            </footer>
        </div>
    </body>
</html>
