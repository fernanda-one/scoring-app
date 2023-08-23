<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DewanController extends Controller
{
    public function index()
    {
        return view('dewan', [
            'title' => 'dewan'
        ]);
    }
}
