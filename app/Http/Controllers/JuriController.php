<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuriController extends Controller
{
    public function index()
    {
        return view('juri', [
            'title' => 'juri'
        ]);
    }
}
