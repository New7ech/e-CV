<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LetterController extends Controller
{
    public function create()
    {
        return view('letter.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'body' => 'required|string',
        ]);

        $pdf = Pdf::loadView('letter.template', $validatedData);
        return $pdf->stream('cover-letter.pdf');
    }
}
