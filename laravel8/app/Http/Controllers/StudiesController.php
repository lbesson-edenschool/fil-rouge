<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studies;

class StudiesController extends Controller
{
    public function studies() 
    {

        $studies = Studies::query()->join('content', 'content.id_content', '=', 'cards_school.id_content')->get();
        return view('studies', compact('studies'));

    }
}
