<?php

namespace App\Http\Controllers;

use App\Models\Partai;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PertandinganController extends Controller
{
    public function index()
    {
        $kelas =[
            (object)[
                'name'=>'A',
                'value'=>'A'
            ],(object)[
                'name'=>'B',
                'value'=>'B'
            ],(object)[
                'name'=>'C',
                'value'=>'C'
            ],(object)[
                'name'=>'D',
                'value'=>'D'
            ],(object)[
                'name'=>'E',
                'value'=>'E'
            ],(object)[
                'name'=>'F',
                'value'=>'F'
            ],
        ];
        $partai = Partai::orderBy('id', 'asc');
        $search = \request('search') ?? '';
        if ($search != ''){
            $partai->where('id','like', '%'.$search.'%')
                ->orWhere('nama_pertandingan','like', '%'.$search.'%')
                ->orWhere('sudut_biru','like', '%'.$search.'%')
                ->orWhere('sudut_merah','like', '%'.$search.'%');
        }
        return view('management.pertandingan.pertandingan', [
            'title' => 'pertandingan',
            'kelas'=>$kelas,
            'partais'=>$partai->paginate(10),
        ]);
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:pertandingan',
            'nama_pertandingan' => 'required',
            'sudut_biru'=> 'required|max:100|min:3',
            'sudut_merah'=> 'required|max:100|min:3',
            'kelas'=> 'required|max:100|min:3',
            'jenis_kelamin'=> 'required|max:100|min:3',
        ]);
        Partai::create($validatedData);

        return redirect('/management/pertandingan')->with('success', 'Registration successfully!');
    }

    public function edit(Request $request,$id)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:pertandingan',
            'nama_pertandingan' => 'required',
            'sudut_biru'=> 'required|max:100|min:3',
            'sudut_merah'=> 'required|max:100|min:3',
            'kelas'=> 'required|max:100|min:3',
            'jenis_kelamin'=> 'required',
        ]);
        $pertandingan = Partai::findOrFail($id);
        $pertandingan->update($validatedData);

        return redirect('/management/pertandingan')->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        Partai::destroy($id);
        return redirect('management/pertandingan')->with('success', 'Users has been deleted');
    }
}
