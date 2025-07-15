<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer votre CV</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100" x-data="{
    prenom: '', nom: '', email: '', telephone: '', adresse: '', objectif: '', photoPreview: null,
    experiences: [{ poste: '', entreprise: '', periode: '', description: '' }],
    educations: [{ diplome: '', etablissement: '', dates: '' }],
    skills: [{ nom: '', niveau: '' }]
}">
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Form Section -->
        <div class="lg:w-1/2 w-full h-full overflow-y-auto p-8">
            <header class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800">Éditeur de CV</h1>
                <p class="mt-4 text-lg text-gray-600">Remplissez les champs et visualisez le résultat en temps réel.</p>
            </header>

            <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data" id="cv-form">
                @csrf
                <input type="hidden" name="template" :value="currentTemplate">

                <!-- Template Selector -->
                <section class="mb-8 bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold border-b pb-2 mb-4">Choix du Template</h2>
                    <select name="template" class="w-full px-4 py-2 border rounded-lg" x-model="currentTemplate">
                        @foreach($templates as $template)
                            <option value="{{ $template }}">{{ ucfirst($template) }}</option>
                        @endforeach
                    </select>
                </section>

                <!-- Informations Personnelles -->
                <section class="mb-8 bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold border-b pb-2 mb-4">Informations Personnelles</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="prenom" class="block text-gray-700 font-bold mb-2">Prénom</label>
                            <input type="text" id="prenom" name="prenom" class="w-full px-4 py-2 border rounded-lg" x-model="prenom" required>
                        </div>
                        <div>
                            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom</label>
                            <input type="text" id="nom" name="nom" class="w-full px-4 py-2 border rounded-lg" x-model="nom" required>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" x-model="email" required>
                        </div>
                        <div>
                            <label for="telephone" class="block text-gray-700 font-bold mb-2">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" class="w-full px-4 py-2 border rounded-lg" x-model="telephone">
                        </div>
                        <div class="md:col-span-2">
                            <label for="adresse" class="block text-gray-700 font-bold mb-2">Adresse</label>
                            <input type="text" id="adresse" name="adresse" class="w-full px-4 py-2 border rounded-lg" x-model="adresse">
                        </div>
                        <div class="md:col-span-2">
                            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo de profil</label>
                            <input type="file" id="photo" name="photo" class="w-full" @change="photoPreview = URL.createObjectURL($event.target.files[0])">
                        </div>
                        <div class="md:col-span-2">
                            <label for="objectif" class="block text-gray-700 font-bold mb-2">Objectif / Résumé personnel</label>
                            <textarea id="objectif" name="objectif" rows="4" class="w-full px-4 py-2 border rounded-lg" x-model="objectif"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Sections Builder -->
                <div id="sections-builder">
                    <!-- Expériences Professionnelles -->
                    <section class="mb-8 bg-white rounded-lg shadow-lg p-6 sortable-section">
                        <h2 class="text-2xl font-bold border-b pb-2 mb-4 cursor-move">Expériences Professionnelles</h2>
                        <template x-for="(experience, index) in experiences" :key="index">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 border p-4 rounded-lg">
                                <div>
                                    <label :for="'exp_poste_' + index" class="block text-gray-700 font-bold mb-2">Poste</label>
                                    <input type="text" :id="'exp_poste_' + index" :name="'experiences[' + index + '][poste]'" class="w-full px-4 py-2 border rounded-lg" x-model="experience.poste">
                                </div>
                                <div>
                                    <label :for="'exp_entreprise_' + index" class="block text-gray-700 font-bold mb-2">Entreprise</label>
                                    <input type="text" :id="'exp_entreprise_' + index" :name="'experiences[' + index + '][entreprise]'" class="w-full px-4 py-2 border rounded-lg" x-model="experience.entreprise">
                                </div>
                                <div>
                                    <label :for="'exp_periode_' + index" class="block text-gray-700 font-bold mb-2">Période</label>
                                    <input type="text" :id="'exp_periode_' + index" :name="'experiences[' + index + '][periode]'" class="w-full px-4 py-2 border rounded-lg" x-model="experience.periode">
                                </div>
                                <div class="md:col-span-2">
                                    <label :for="'exp_description_' + index" class="block text-gray-700 font-bold mb-2">Description</label>
                                    <textarea :id="'exp_description_' + index" :name="'experiences[' + index + '][description]'" rows="3" class="w-full px-4 py-2 border rounded-lg" x-model="experience.description"></textarea>
                                </div>
                                <div class="md:col-span-2 text-right">
                                    <button type="button" @click="experiences.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                </div>
                            </div>
                        </template>
                        <button type="button" @click="experiences.push({ poste: '', entreprise: '', periode: '', description: '' })" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une expérience</button>
                    </section>

                    <!-- Formation Académique -->
                    <section class="mb-8 bg-white rounded-lg shadow-lg p-6 sortable-section">
                        <h2 class="text-2xl font-bold border-b pb-2 mb-4 cursor-move">Formation Académique</h2>
                        <template x-for="(education, index) in educations" :key="index">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 border p-4 rounded-lg">
                                <div>
                                    <label :for="'edu_diplome_' + index" class="block text-gray-700 font-bold mb-2">Diplôme</label>
                                    <input type="text" :id="'edu_diplome_' + index" :name="'educations[' + index + '][diplome]'" class="w-full px-4 py-2 border rounded-lg" x-model="education.diplome">
                                </div>
                                <div>
                                    <label :for="'edu_etablissement_' + index" class="block text-gray-700 font-bold mb-2">Établissement</label>
                                    <input type="text" :id="'edu_etablissement_' + index" :name="'educations[' + index + '][etablissement]'" class="w-full px-4 py-2 border rounded-lg" x-model="education.etablissement">
                                </div>
                                <div>
                                    <label :for="'edu_dates_' + index" class="block text-gray-700 font-bold mb-2">Dates</label>
                                    <input type="text" :id="'edu_dates_' + index" :name="'educations[' + index + '][dates]'" class="w-full px-4 py-2 border rounded-lg" x-model="education.dates">
                                </div>
                                <div class="md:col-span-2 text-right">
                                    <button type="button" @click="educations.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                </div>
                            </div>
                        </template>
                        <button type="button" @click="educations.push({ diplome: '', etablissement: '', dates: '' })" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une formation</button>
                    </section>

                    <!-- Compétences -->
                    <section class="mb-8 bg-white rounded-lg shadow-lg p-6 sortable-section">
                        <h2 class="text-2xl font-bold border-b pb-2 mb-4 cursor-move">Compétences</h2>
                        <template x-for="(skill, index) in skills" :key="index">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 border p-4 rounded-lg">
                                <div>
                                    <label :for="'skill_nom_' + index" class="block text-gray-700 font-bold mb-2">Compétence</label>
                                    <input type="text" :id="'skill_nom_' + index" :name="'skills[' + index + '][nom]'" class="w-full px-4 py-2 border rounded-lg" x-model="skill.nom">
                                </div>
                                <div>
                                    <label :for="'skill_niveau_' + index" class="block text-gray-700 font-bold mb-2">Niveau</label>
                                    <input type="text" :id="'skill_niveau_' + index" :name="'skills[' + index + '][niveau]'" class="w-full px-4 py-2 border rounded-lg" x-model="skill.niveau">
                                </div>
                                <div class="md:col-span-2 text-right">
                                    <button type="button" @click="skills.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                </div>
                            </div>
                        </template>
                        <button type="button" @click="skills.push({ nom: '', niveau: '' })" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une compétence</button>
                    </section>
                </div>

                <div class="text-center mt-8">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-xl">
                        Générer mon CV
                    </button>
                </div>
            </form>
        </div>

        <!-- Live Preview Section -->
        <div class="lg:w-1/2 w-full h-full bg-white overflow-y-auto p-8 border-l">
            <h2 class="text-3xl font-bold text-center mb-8">Aperçu en direct</h2>
            <div class="w-full max-w-4xl mx-auto bg-white shadow-lg p-8">
                <!-- Template Preview -->
                <div class="cv-preview">
                    <header class="text-center mb-6">
                        <img x-show="photoPreview" :src="photoPreview" class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
                        <h1 class="text-4xl font-bold" x-text="prenom + ' ' + nom"></h1>
                        <p class="text-lg" x-text="email + (telephone ? ' | ' + telephone : '') + (adresse ? ' | ' + adresse : '')"></p>
                    </header>

                    <section class="mb-6" x-show="objectif">
                        <h3 class="text-2xl font-bold border-b-2 border-gray-300 pb-2 mb-3">Objectif</h3>
                        <p x-text="objectif"></p>
                    </section>

                    <section class="mb-6" x-show="experiences.length > 0 && experiences[0].poste">
                        <h3 class="text-2xl font-bold border-b-2 border-gray-300 pb-2 mb-3">Expériences Professionnelles</h3>
                        <template x-for="exp in experiences" :key="exp">
                            <div class="mb-4">
                                <div class="flex justify-between">
                                    <h4 class="text-xl font-semibold" x-text="exp.poste"></h4>
                                    <p class="text-gray-600" x-text="exp.periode"></p>
                                </div>
                                <p class="text-gray-700" x-text="exp.entreprise"></p>
                                <p class="mt-1" x-text="exp.description"></p>
                            </div>
                        </template>
                    </section>

                    <section class="mb-6" x-show="educations.length > 0 && educations[0].diplome">
                        <h3 class="text-2xl font-bold border-b-2 border-gray-300 pb-2 mb-3">Formation</h3>
                        <template x-for="edu in educations" :key="edu">
                            <div class="mb-4">
                                <div class="flex justify-between">
                                    <h4 class="text-xl font-semibold" x-text="edu.diplome"></h4>
                                    <p class="text-gray-600" x-text="edu.dates"></p>
                                </div>
                                <p class="text-gray-700" x-text="edu.etablissement"></p>
                            </div>
                        </template>
                    </section>

                    <section x-show="skills.length > 0 && skills[0].nom">
                        <h3 class="text-2xl font-bold border-b-2 border-gray-300 pb-2 mb-3">Compétences</h3>
                        <div class="flex flex-wrap gap-4">
                            <template x-for="skill in skills" :key="skill">
                                <div class="bg-gray-200 rounded-full px-4 py-2">
                                    <span x-text="skill.nom"></span>: <span class="font-semibold" x-text="skill.niveau"></span>
                                </div>
                            </template>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var el = document.getElementById('sections-builder');
            var sortable = Sortable.create(el, {
                animation: 150,
                handle: '.cursor-move',
            });
        });
    </script>
</body>
</html>
