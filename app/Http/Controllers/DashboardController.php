<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cvs = Cv::withCount('views')->latest()->get();
        return view('dashboard.index', ['cvs' => $cvs]);
    }
}
