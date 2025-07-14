<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generate(Cv $cv)
    {
        $template = $cv->template ?? 'default';
        $view = "cv.templates.{$template}";

        if (!view()->exists($view)) {
            // Fallback to a default template if the specific one doesn't exist
            $view = 'cv.template';
        }

        $pdf = Pdf::loadView($view, ['cv' => $cv]);
        return $pdf->stream('cv.pdf');
    }
}
