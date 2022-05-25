<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studies;

class StudiesController extends Controller
{
    public function studies() 
    { 
        // Récupère les données de studies dans la base de données puis les envoie vers la page
        $studies = Studies::query()->join('content', 'content.id_content', '=', 'cards_school.id_content')->get();
        return view('studies', compact('studies'));

    }
}
