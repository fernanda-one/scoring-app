<?php

namespace App\Http\Controllers;

use App\Models\UserGelanggang;
use Illuminate\Http\Request;

class DewanController extends Controller
{
    public function index()
    {
        if (env("MANAGEMENT_ROLE")){
            $this->authorize("dewan");
        }
        $gelangang = UserGelanggang::where('user_id', auth()->user()->id)->first();
        return view('dewan', [
            'title' => 'dewan',
            'gelangang'=>$gelangang
        ]);
    }
}
