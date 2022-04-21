<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discover;

class DiscoverController extends Controller
{
    public function show()
    {
        
        $discovers = Discover::query()->join('content', 'content.id_content', '=', 'cards_discover.id_content')->get();

        return view('discover', compact('discovers'));

    }

    
}
