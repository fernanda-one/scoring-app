<?php

namespace App\Http\Controllers;

use App\Models\Gelanggang;
use Illuminate\Http\Request;

class GelanggangController extends Controller
{
    public function index()
    {
        $gelanggang = Gelanggang::latest();
        return view('management.gelanggang.gelanggang', [
            'title' => 'gelanggang',
            'gelanggangs' =>$gelanggang->paginate(10)
        ]);
    }
}
