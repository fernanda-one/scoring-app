<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PapanScoreController extends Controller
{
    public function index()
    {
        return view('papanScore', [
            'title' => 'papan score'
        ]);
    }
}
