<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
    $educations = Education::orderBy('start_year', 'desc')->get();
    $experiences = Experience::orderBy('start_year', 'desc')->get(); // ambil data experiences
    $projects = Project::latest()->get();

    return view('portofolio.index', compact('educations', 'experiences', 'projects'));
    }
}
