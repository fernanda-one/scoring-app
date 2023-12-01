<?php

namespace App\Http\Controllers;

use App\Models\UserGelanggang;
use Illuminate\Http\Request;

class JuriController extends Controller
{
    public function index()
    {
        if (env("MANAGEMENT_ROLE")){
            $this->authorize("juri");
        }
        $gelangang = UserGelanggang::where('user_id', auth()->user()->id)->first();
        return view('juri', [
            'title' => 'juri',
            'gelanggang'=>$gelangang
        ]);
    }
}
