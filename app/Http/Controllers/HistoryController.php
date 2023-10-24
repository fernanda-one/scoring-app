<?php

namespace App\Http\Controllers;

use App\Models\Partai;
use App\Models\Record;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return view('management.history.history', [
            'title' => 'history'
            ]);
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'partai' => 'required|unique:log_pertandingan',
            'kelas' => 'required',
            'sudut_biru' => 'required',
            'sudut_merah' => 'required',
            'kontingen_merah' => 'required',
            'kontingen_biru' => 'required',
            'babak' => 'required',
            'pemenang' => 'required',
            'round_time' => 'required',
        ]);
        $pertandingan = Partai::findOrFail($validatedData['partai']);
        $pertandingan->update(['status'=>false]);

        Record::create($validatedData);
    }
}
