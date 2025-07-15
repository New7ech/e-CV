<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
use App\Models\CvView;

    public function generate(Request $request, Cv $cv)
    {
        // Track the view
        CvView::create([
            'cv_id' => $cv->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        $template = $request->get('template', 'classic');
        $view = 'cv.templates.' . $template;

        if (!view()->exists($view)) {
            abort(404, "Template not found");
        }

        $pdf = Pdf::loadView($view, ['cv' => $cv]);
        return $pdf->stream('cv.pdf');
    }
}
