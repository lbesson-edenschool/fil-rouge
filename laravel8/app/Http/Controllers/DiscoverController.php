<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discover;

class DiscoverController extends Controller
{
    public function show()
    {
        $discovers = Discover::all();

        return view('discover', compact('discovers'));
    }
}
