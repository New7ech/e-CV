<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generate(Request $request, Cv $cv)
    {
        $template = $request->get('template', 'classic');
        $view = 'cv.templates.' . $template;

        if (!view()->exists($view)) {
            abort(404, "Template not found");
        }

        $pdf = Pdf::loadView($view, ['cv' => $cv]);
        return $pdf->stream('cv.pdf');
    }
}
