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
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Renseignez vos informations</h1>
            <p class="mt-4 text-lg text-gray-600">Complétez les sections ci-dessous pour générer votre CV.</p>
        </header>

        <main class="bg-white rounded-lg shadow-lg p-8" x-data="{
            photoPreview: null,
            experiences: [{ poste: '', entreprise: '', periode: '', description: '' }],
            educations: [{ diplome: '', etablissement: '', dates: '' }],
            skills: [{ nom: '', niveau: '' }]
        }">
            <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Informations Personnelles -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold border-b pb-2 mb-4">Informations Personnelles</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="prenom" class="block text-gray-700 font-bold mb-2">Prénom</label>
                            <input type="text" id="prenom" name="prenom" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom</label>
                            <input type="text" id="nom" name="nom" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label for="telephone" class="block text-gray-700 font-bold mb-2">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div class="md:col-span-2">
                            <label for="adresse" class="block text-gray-700 font-bold mb-2">Adresse</label>
                            <input type="text" id="adresse" name="adresse" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div class="md:col-span-2">
                            <label for="photo" class="block text-gray-700 font-bold mb-2">Photo de profil</label>
                            <input type="file" id="photo" name="photo" class="w-full" @change="photoPreview = URL.createObjectURL($event.target.files[0])">
                            <div x-show="photoPreview" class="mt-4">
                                <img :src="photoPreview" class="w-32 h-32 rounded-full object-cover">
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label for="objectif" class="block text-gray-700 font-bold mb-2">Objectif / Résumé personnel</label>
                            <textarea id="objectif" name="objectif" rows="4" class="w-full px-4 py-2 border rounded-lg"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Expériences Professionnelles -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold border-b pb-2 mb-4">Expériences Professionnelles</h2>
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
                                <button type="button" @click="experiences.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="experiences.push({ poste: '', entreprise: '', periode: '', description: '' })" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter une expérience
                    </button>
                </section>

                <!-- Formation Académique -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold border-b pb-2 mb-4">Formation Académique</h2>
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
                                <button type="button" @click="educations.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="educations.push({ diplome: '', etablissement: '', dates: '' })" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter une formation
                    </button>
                </section>

                <!-- Compétences -->
                <section class="mb-8">
                    <h2 class="text-2xl font-bold border-b pb-2 mb-4">Compétences</h2>
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
                                <button type="button" @click="skills.splice(index, 1)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="skills.push({ nom: '', niveau: '' })" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter une compétence
                    </button>
                </section>

                <div class="text-center">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-xl">
                        Générer mon CV
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
