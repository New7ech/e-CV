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
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto px-4">
            <header class="py-12 text-center">
                <h1 class="text-4xl font-bold text-gray-800">Créez un CV professionnel en quelques minutes</h1>
                <p class="mt-4 text-lg text-gray-600">Notre outil simple et intuitif vous guide à chaque étape.</p>
            </header>

            <main>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <div class="rounded-lg bg-white p-6 shadow-lg">
                            <img src="https://via.placeholder.com/300x400.png?text=Modèle+Classique" alt="Modèle Classique" class="rounded-lg mb-4">
                            <h2 class="text-2xl font-bold mb-4">Modèle Classique</h2>
                            <p class="text-gray-600 mb-4">Un design sobre et élégant, parfait pour les secteurs traditionnels.</p>
                            <a href="{{ route('cv.create', ['template' => 'classic']) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Choisir ce modèle
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <div class="rounded-lg bg-white p-6 shadow-lg">
                            <img src="https://via.placeholder.com/300x400.png?text=Modèle+Moderne" alt="Modèle Moderne" class="rounded-lg mb-4">
                            <h2 class="text-2xl font-bold mb-4">Modèle Moderne</h2>
                            <p class="text-gray-600 mb-4">Mettez en avant votre créativité avec ce modèle audacieux.</p>
                            <a href="{{ route('cv.create', ['template' => 'modern']) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Choisir ce modèle
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <div class="rounded-lg bg-white p-6 shadow-lg">
                            <img src="https://via.placeholder.com/300x400.png?text=Modèle+Minimaliste" alt="Modèle Minimaliste" class="rounded-lg mb-4">
                            <h2 class="text-2xl font-bold mb-4">Modèle Minimaliste</h2>
                            <p class="text-gray-600 mb-4">Un CV épuré qui va droit à l'essentiel.</p>
                            <a href="{{ route('cv.create', ['template' => 'minimalist']) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Choisir ce modèle
                            </a>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-12 text-center text-gray-600">
                <p>&copy; {{ date('Y') }} Générateur de CV. Tous droits réservés.</p>
            </footer>
        </div>
    </body>
</html>
