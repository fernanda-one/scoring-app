<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KetuaPertandingaController extends Controller
{
    public function index()
    {
        return view('ketuaPertandingan', [
            'title' => 'ketua pertandingan'
        ]);
    }
}
