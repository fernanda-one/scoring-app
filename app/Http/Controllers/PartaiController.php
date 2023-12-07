<?php

namespace App\Http\Controllers;

use App\Imports\PartaiImport;
use App\Models\Gelanggang;
use App\Models\Partai;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class PartaiController extends Controller
{
    public function index()
    {
        if (env("MANAGEMENT_ROLE")){
            $this->authorize("adtor");
        }
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
            ],(object)[
                'name'=>'G',
                'value'=>'G'
            ],(object)[
                'name'=>'H',
                'value'=>'H'
            ],(object)[
                'name'=>'I',
                'value'=>'I'
            ],
        ];
        $partai = Partai::orderBy('id', 'asc');
        $gelanggang = Gelanggang::orderBy('id', 'asc');
        $search = \request('search') ?? '';
        if ($search != ''){
            $partai->where('id','like', '%'.$search.'%')
                ->orWhereRaw("LOWER(babak) LIKE ?", ['%' . strtolower($search) . '%'])
                ->orWhereRaw("LOWER(jenis_kelamin) LIKE ?", ['%' . strtolower($search) . '%'])
                ->orWhereRaw("LOWER(sudut_biru) LIKE ?", ['%' . strtolower($search) . '%'])
                ->orWhereRaw("LOWER(sudut_merah) LIKE ?", ['%' . strtolower($search) . '%'])
                ->orWhereRaw("LOWER(contingen_sudut_biru) LIKE ?", ['%' . strtolower($search) . '%'])
                ->orWhereRaw("LOWER(contingen_sudut_merah) LIKE ?", ['%' . strtolower($search) . '%']);

        }
        return view('management.pertandingan.pertandingan', [
            'title' => 'pertandingan',
            'kelas'=>$kelas,
            'partais'=>$partai->paginate(10),
            'gelanggangs'=>$gelanggang
        ]);
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:partais',
            'babak' => 'required',
            'sudut_biru'=> 'required|max:100|min:3',
            'sudut_merah'=> 'required|max:100|min:3',
            'contingen_sudut_biru'=> 'required|max:100|min:3',
            'contingen_sudut_merah'=> 'required|max:100|min:3',
            'kelas'=> 'required|max:2',
            'jenis_kelamin'=> 'required|max:12|min:3',
        ]);
        Partai::create($validatedData);


        return redirect('/management/pertandingan')->with('success', 'Pertandingan Berhasil ditambahkan!');
    }

    public function edit(Request $request,$id)
    {
        $validatedData = $request->validate([
            'babak' => 'required',
            'sudut_biru'=> 'required|max:100|min:3',
            'sudut_merah'=> 'required|max:100|min:3',
            'contingen_sudut_biru'=> 'required|max:100|min:3',
            'contingen_sudut_merah'=> 'required|max:100|min:3',
            'kelas'=> 'required|max:2|min:1',
            'jenis_kelamin'=> 'required',
        ]);
        $pertandingan = Partai::findOrFail($id);
        $pertandingan->update($validatedData);

        return redirect('/management/pertandingan')->with('success', 'Berhasil merubah pertandingan.');
    }
    public function destroy($id)
    {
        Partai::destroy($id);
        return redirect('management/pertandingan')->with('success', 'Pertandingan telah dihapus');
    }

    public function import(Request $request)
    {
        $file = $request->file('excel_file');
        $import = new PartaiImport();
        Excel::import($import, $file);

        $message = $import->getMessage();
        if (!empty($message)) {
            return redirect('management/pertandingan')->with('error', $message);
        } else {
        return redirect('management/pertandingan')->with('success', 'Data imported successfully!');
        }
    }
}
