<?php

namespace App\Http\Controllers;

use App\Models\UserGelanggang;
use Illuminate\Http\Request;

class KetuaPertandingaController extends Controller
{
    public function index()
    {
        if (env("MANAGEMENT_ROLE")){
            $this->authorize("ketua");
        }
        $gelangang = UserGelanggang::where('user_id', auth()->user()->id)->first();
        return view('ketuaPertandingan', [
            'title' => 'ketua pertandingan',
            'gelanggang' => $gelangang,
        ]);
    }
}
