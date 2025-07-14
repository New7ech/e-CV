<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generate(Cv $cv)
    {
        $pdf = Pdf::loadView('cv.template', ['cv' => $cv]);
        return $pdf->stream('cv.pdf');
    }
}
