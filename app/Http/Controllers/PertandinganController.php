<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertandinganController extends Controller
{
    public function index()
    {
        return view('management.pertandingan.pertandingan', [
            'title' => 'pertandingan'
        ]);
    }
}
