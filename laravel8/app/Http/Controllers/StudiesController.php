<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studies;

class StudiesController extends Controller
{
    
    public function studies() {

        $studies = Studies::all();

        return view('studies', compact('studies'));

    }

}
