<?php

namespace App\Http\Controllers;

use App\Models\UserGelanggang;
use Illuminate\Http\Request;

class KetuaPertandingaController extends Controller
{
    public function index()
    {
        $gelangang = UserGelanggang::where('user_id', auth()->user()->id)->first();
        return view('ketuaPertandingan', [
            'title' => 'ketua pertandingan',
            'gelanggang' => $gelangang,
        ]);
    }
}
