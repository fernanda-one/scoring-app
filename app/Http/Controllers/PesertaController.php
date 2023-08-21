<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        return view('management.peserta.peserta', [
            'title' => 'peserta'
        ]);
    }
}
