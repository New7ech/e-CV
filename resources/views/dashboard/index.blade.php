<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de Bord</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <header class="mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Tableau de Bord</h1>
            <p class="mt-2 text-lg text-gray-600">Gérez vos CV, candidatures et opportunités.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- CVs Section -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold border-b pb-4 mb-6">Mes CV Créés</h2>
                <div class="space-y-4">
                    @forelse($cvs as $cv)
                        <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50">
                            <div>
                                <h3 class="font-bold text-lg">{{ $cv->prenom }} {{ $cv->nom }}</h3>
                                <p class="text-sm text-gray-500">Créé le {{ $cv->created_at->format('d/m/Y') }} - Template: {{ ucfirst($cv->template) }}</p>
                                <p class="text-sm text-gray-600 font-semibold">Vues: {{ $cv->views_count }}</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <a href="{{ route('cv.pdf', ['cv' => $cv, 'template' => $cv->template]) }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-semibold">Voir PDF</a>
                                <a href="#" class="text-green-500 hover:text-green-700 font-semibold">Télécharger Word</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 py-8">Vous n'avez pas encore créé de CV.</p>
                        <div class="text-center">
                            <a href="{{ route('cv.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">
                                Créer mon premier CV
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Job Tracking & Alerts Section -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold border-b pb-4 mb-6">Suivi & Alertes</h2>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-lg mb-2">Suivi des Candidatures</h3>
                        <p class="text-gray-600">Cette fonctionnalité arrive bientôt !</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2">Alertes d'Offres</h3>
                        <p class="text-gray-600">Recevez des offres correspondant à votre profil. Bientôt disponible !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
