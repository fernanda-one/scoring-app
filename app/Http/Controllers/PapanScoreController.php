<?php

namespace App\Http\Controllers;

use App\Models\UserGelanggang;
use Illuminate\Http\Request;

class PapanScoreController extends Controller
{
    public function index()
    {
        $gelangang = UserGelanggang::where('user_id', auth()->user()->id)->first();
        return view('papanScore', [
            'title' => 'papan score',
            'gelangang'=>$gelangang
        ]);
    }
}
