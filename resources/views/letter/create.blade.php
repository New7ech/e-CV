<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Générateur de Lettre de Motivation</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Générateur de Lettre de Motivation</h1>
            <p class="mt-4 text-lg text-gray-600">Remplissez les champs pour créer une lettre de motivation professionnelle.</p>
        </header>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Form Section -->
            <main class="lg:w-2/3 w-full bg-white rounded-lg shadow-lg p-8">
                <form action="{{ route('letter.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="user_name" class="block text-gray-700 font-bold mb-2">Votre Nom Complet</label>
                            <input type="text" id="user_name" name="user_name" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label for="user_email" class="block text-gray-700 font-bold mb-2">Votre Email</label>
                            <input type="email" id="user_email" name="user_email" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label for="company_name" class="block text-gray-700 font-bold mb-2">Nom de l'entreprise</label>
                            <input type="text" id="company_name" name="company_name" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label for="job_title" class="block text-gray-700 font-bold mb-2">Poste Visé</label>
                            <input type="text" id="job_title" name="job_title" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                    </div>
                    <div>
                        <label for="body" class="block text-gray-700 font-bold mb-2">Corps de la lettre</label>
                        <textarea id="body" name="body" rows="12" class="w-full px-4 py-2 border rounded-lg" required>Madame, Monsieur,

C'est avec un grand intérêt que je vous présente ma candidature pour le poste de [Poste Visé]. Ayant une solide expérience en [Votre domaine], je suis convaincu(e) que mes compétences correspondent parfaitement à vos besoins.

Au cours de mes expériences précédentes chez [Ancienne entreprise], j'ai eu l'opportunité de [mentionner une réalisation clé]. Je suis particulièrement attiré(e) par [aspect de l'entreprise] et je suis persuadé(e) de pouvoir contribuer activement à votre succès.

Je me tiens à votre disposition pour un entretien afin de vous exposer plus en détail ma motivation.

Dans l'attente de votre retour, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.
                        </textarea>
                    </div>
                    <div class="text-center mt-8">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-xl">
                            Générer ma lettre
                        </button>
                    </div>
                </form>
            </main>

            <!-- Tips Section -->
            <aside class="lg:w-1/3 w-full bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold border-b pb-2 mb-4">Conseils de Rédaction</h2>
                <div class="space-y-4 text-gray-700">
                    <p><strong>Soyez concis :</strong> Une lettre de motivation doit être claire et aller droit au but. Évitez les phrases trop longues.</p>
                    <p><strong>Personnalisez :</strong> Adaptez votre lettre à chaque entreprise. Montrez que vous avez fait des recherches.</p>
                    <p><strong>Mettez en avant vos réussites :</strong> Utilisez des exemples concrets pour illustrer vos compétences. Chiffrez vos résultats si possible.</p>
                    <p><strong>Évitez le jargon :</strong> Utilisez un langage professionnel mais accessible. Ne supposez pas que le recruteur connaît le jargon de votre ancien poste.</p>
                    <p><strong>Relisez-vous :</strong> Une faute d'orthographe peut être rédhibitoire. Faites relire votre lettre par un proche.</p>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>
