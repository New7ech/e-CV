<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function create(Request $request)
    {
        $templates = ['classic', 'modern', 'minimalist', 'creative'];
        $template = $request->get('template', 'modern');

        if (!in_array($template, $templates)) {
            abort(404, "Le template demandé n'existe pas.");
        }

        return view('cv.create', [
            'templates' => $templates,
            'currentTemplate' => $template
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'objectif' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'template' => 'required|string|in:classic,modern,minimalist,creative',
            'experiences' => 'nullable|array',
            'experiences.*.poste' => 'nullable|string|max:255',
            'experiences.*.entreprise' => 'nullable|string|max:255',
            'experiences.*.periode' => 'nullable|string|max:255',
            'experiences.*.description' => 'nullable|string',
            'educations' => 'nullable|array',
            'educations.*.diplome' => 'nullable|string|max:255',
            'educations.*.etablissement' => 'nullable|string|max:255',
            'educations.*.dates' => 'nullable|string|max:255',
            'skills' => 'nullable|array',
            'skills.*.nom' => 'nullable|string|max:255',
            'skills.*.niveau' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $path;
        }

        $cv = Cv::create($validatedData);

        if (isset($validatedData['experiences'])) {
            foreach ($validatedData['experiences'] as $experience) {
                $cv->experiences()->create($experience);
            }
        }

        if (isset($validatedData['educations'])) {
            foreach ($validatedData['educations'] as $education) {
                $cv->educations()->create($education);
            }
        }

        if (isset($validatedData['skills'])) {
            foreach ($validatedData['skills'] as $skill) {
                $cv->skills()->create($skill);
            }
        }

        return redirect()->route('cv.pdf', ['cv' => $cv, 'template' => $validatedData['template']]);
    }
}
