<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un CV de Développeur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">CV Développeur</h1>
        <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            <input type="hidden" name="template" value="developpeur">

            <h2 class="text-2xl font-semibold mb-6">Informations Personnelles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="prenom" class="block text-gray-700 font-medium mb-2">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="nom" class="block text-gray-700 font-medium mb-2">Nom</label>
                    <input type="text" name="nom" id="nom" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="telephone" class="block text-gray-700 font-medium mb-2">Téléphone</label>
                    <input type="tel" name="telephone" id="telephone" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="md:col-span-2">
                    <label for="adresse" class="block text-gray-700 font-medium mb-2">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="md:col-span-2">
                    <label for="objectif" class="block text-gray-700 font-medium mb-2">Objectif</label>
                    <textarea name="objectif" id="objectif" rows="4" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label for="photo" class="block text-gray-700 font-medium mb-2">Photo</label>
                    <input type="file" name="photo" id="photo" class="w-full">
                </div>
            </div>

            <h2 class="text-2xl font-semibold mb-6">Expériences Professionnelles</h2>
            <div id="experiences-container">
                <!-- Experiences will be added here -->
            </div>
            <button type="button" id="add-experience" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-6">Ajouter une expérience</button>

            <h2 class="text-2xl font-semibold mb-6">Formation</h2>
            <div id="educations-container">
                <!-- Educations will be added here -->
            </div>
            <button type="button" id="add-education" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-6">Ajouter une formation</button>

            <h2 class="text-2xl font-semibold mb-6">Compétences</h2>
            <div id="skills-container">
                <!-- Skills will be added here -->
            </div>
            <button type="button" id="add-skill" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-6">Ajouter une compétence</button>

            <div class="text-center">
                <button type="submit" class="bg-green-500 text-white px-8 py-3 rounded-md hover:bg-green-600 font-bold text-lg">Générer mon CV</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-experience').addEventListener('click', function() {
            const container = document.getElementById('experiences-container');
            const index = container.children.length;
            const element = document.createElement('div');
            element.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 p-4 border border-gray-200 rounded-md">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Poste</label>
                        <input type="text" name="experiences[${index}][poste]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Entreprise</label>
                        <input type="text" name="experiences[${index}][entreprise]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Période</label>
                        <input type="text" name="experiences[${index}][periode]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea name="experiences[${index}][description]" rows="3" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                </div>
            `;
            container.appendChild(element);
        });

        document.getElementById('add-education').addEventListener('click', function() {
            const container = document.getElementById('educations-container');
            const index = container.children.length;
            const element = document.createElement('div');
            element.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 p-4 border border-gray-200 rounded-md">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Diplôme</label>
                        <input type="text" name="educations[${index}][diplome]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Établissement</label>
                        <input type="text" name="educations[${index}][etablissement]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-2">Dates</label>
                        <input type="text" name="educations[${index}][dates]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>
            `;
            container.appendChild(element);
        });

        document.getElementById('add-skill').addEventListener('click', function() {
            const container = document.getElementById('skills-container');
            const index = container.children.length;
            const element = document.createElement('div');
            element.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 p-4 border border-gray-200 rounded-md">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Compétence</label>
                        <input type="text" name="skills[${index}][nom]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Niveau</label>
                        <input type="text" name="skills[${index}][niveau]" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>
            `;
            container.appendChild(element);
        });
    </script>
</body>
</html>
