<?php

namespace App\Http\Controllers;

use App\Models\Partai;
use App\Models\UserGelanggang;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $partai = Partai::orderBy('id', 'asc');
        $idToSkip = $partai->paginate(1)[0]->id;

        $gelangang = UserGelanggang::where('user_id', auth()->user()->id)->first();
        return view('operator', [
            'title' => 'operator',
            'partai_pertama'=>$partai->paginate(1),
            'partai_kedua'=>$partai->where('id', '!=', $idToSkip)->paginate(1),
            'gelanggang'=>$gelangang
        ]);
    }
}
