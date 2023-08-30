<?php

namespace App\Http\Controllers;

use App\Models\Gelanggang;
use App\Models\Partai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GelanggangController extends Controller
{
    public function index()
    {
        $gelanggang = DB::table('gelanggangs')
            ->select(
                'gelanggangs.id', 'gelanggangs.nama_gelanggang',
                DB::raw('MAX(CASE WHEN roles.name = \'Juri Pertama\' THEN users.name END) as juri_pertama'),
                DB::raw('MAX(CASE WHEN roles.name = \'Juri Kedua\' THEN users.name END) as juri_kedua'),
                DB::raw('MAX(CASE WHEN roles.name = \'Juri Ketiga\' THEN users.name END) as juri_ketiga'),
                DB::raw('MAX(CASE WHEN roles.name = \'Dewan\' THEN users.name END) as dewan'),
                DB::raw('MAX(CASE WHEN roles.name = \'Operator\' THEN users.name END) as operator')
            )
            ->leftJoin('users', 'gelanggangs.id', '=', 'users.gelanggang_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->groupBy('gelanggangs.id', 'gelanggangs.nama_gelanggang')
            ->get();




//        dd($gelanggang);

        $juri1U = User::whereHas('role', function ($query) {
                $query->where('name', 'Juri Pertama');
            })->get();
        $juri2U = User::whereHas('role', function ($query) {
                $query->where('name', 'Juri Kedua');
            })->get();
        $juri3U = User::whereHas('role', function ($query) {
                $query->where('name', 'Juri Ketiga');
            })->get();
        $dewanU = User::whereHas('role', function ($query) {
                $query->where('name', 'Dewan');
            })->get();
        $operatorU = User::whereHas('role', function ($query) {
                $query->where('name', 'Operator');
            })->get();

        $juri1C = User::whereHas('role', function ($query) {
                $query->where('name', 'Juri Pertama');
            })->whereNull('gelanggang_id')->get();
        $juri2C = User::whereHas('role', function ($query) {
                $query->where('name', 'Juri Kedua');
            })->whereNull('gelanggang_id')->get();
        $juri3C = User::whereHas('role', function ($query) {
                $query->where('name', 'Juri Ketiga');
            })->whereNull('gelanggang_id')->get();
        $dewanC = User::whereHas('role', function ($query) {
                $query->where('name', 'Dewan');
            })->whereNull('gelanggang_id')->get();
        $operatorC = User::whereHas('role', function ($query) {
                $query->where('name', 'Operator');
            })->whereNull('gelanggang_id')->get();

        return view('management.gelanggang.gelanggang', [
            'title' => 'gelanggang',
            'gelanggangs' =>$gelanggang,
            'juri1U' => $juri1U,
            'juri2U' => $juri2U,
            'juri3U' => $juri3U,
            'dewanU' => $dewanU,
            'operatorU' => $operatorU,
            'juri1C' => $juri1C,
            'juri2C' => $juri2C,
            'juri3C' => $juri3C,
            'dewanC' => $dewanC,
            'operatorC' => $operatorC,
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama_gelanggang' => 'required',
            'juri1' => 'required',
            'juri2' => 'required',
            'juri3' => 'required',
            'dewan' => 'required',
            'operator' => 'required',
        ]);
        $gelanggang = Gelanggang::create([
            'nama_gelanggang' => $validatedData['nama_gelanggang'],
        ]);

        $gelanggangId = $gelanggang->id;

        User::where('id', $validatedData['juri1'])->update(['gelanggang_id' => $gelanggangId]);
        User::where('id', $validatedData['juri2'])->update(['gelanggang_id' => $gelanggangId]);
        User::where('id', $validatedData['juri3'])->update(['gelanggang_id' => $gelanggangId]);
        User::where('id', $validatedData['dewan'])->update(['gelanggang_id' => $gelanggangId]);
        User::where('id', $validatedData['operator'])->update(['gelanggang_id' => $gelanggangId]);

        return redirect('/management/gelanggang')->with('success', 'Gelanggang Berhasil ditambahkan!');
    }
}
