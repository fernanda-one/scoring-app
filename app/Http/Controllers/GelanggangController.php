<?php

namespace App\Http\Controllers;

use App\Models\Gelanggang;
use App\Models\Partai;
use App\Models\User;
use App\Models\UserGelanggang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GelanggangController extends Controller
{
    public function index()
    {
        $gelanggang = $this->listGelanggang();
        $dataUsers = $this->dataUsers();

        return view('management.gelanggang.gelanggang', [
            'title' => 'gelanggang',
            'gelanggangs' =>$gelanggang,
            'juri1U' => $dataUsers['juri1U'],
            'juri2U' => $dataUsers['juri2U'],
            'juri3U' => $dataUsers['juri3U'],
            'dewanU' => $dataUsers['dewanU'],
            'operatorU' => $dataUsers['operatorU'],
            'juri1C' => $dataUsers['juri1C'],
            'juri2C' => $dataUsers['juri2C'],
            'juri3C' => $dataUsers['juri3C'],
            'dewanC' => $dataUsers['dewanC'],
            'operatorC' => $dataUsers['operatorC'],
        ]);
    }

    public function dataUsers()
    {
        $dataUsers = [];
        $dataUsers['juri1U'] = $juri1U = User::whereHas('role', function ($query) {
            $query->where('name', 'Juri Pertama');
        })->get();
        $dataUsers['juri2U'] = $juri2U = User::whereHas('role', function ($query) {
            $query->where('name', 'Juri Kedua');
        })->get();
        $dataUsers['juri3U'] = $juri3U = User::whereHas('role', function ($query) {
            $query->where('name', 'Juri Ketiga');
        })->get();
        $dataUsers['dewanU'] = $dewanU = User::whereHas('role', function ($query) {
            $query->where('name', 'Dewan');
        })->get();
        $dataUsers['operatorU'] = $operatorU = User::whereHas('role', function ($query) {
            $query->where('name', 'Operator');
        })->get();

        $dataUsers['juri1C'] = $juri1C = User::whereHas('role', function ($query) {
            $query->where('name', 'Juri Pertama');
        })->whereNotIn('id', function ($query) {
            $query->select('user_id')->from('users_gelanggangs');
        })->get();
        $dataUsers['juri2C'] = $juri2C = User::whereHas('role', function ($query) {
            $query->where('name', 'Juri Kedua');
        })->whereNotIn('id', function ($query) {
            $query->select('user_id')->from('users_gelanggangs');
        })->get();
        $dataUsers['juri3C'] = $juri3C = User::whereHas('role', function ($query) {
            $query->where('name', 'Juri Ketiga');
        })->whereNotIn('id', function ($query) {
            $query->select('user_id')->from('users_gelanggangs');
        })->get();
        $dataUsers['dewanC'] = $dewanC = User::whereHas('role', function ($query) {
            $query->where('name', 'Dewan');
        })->whereNotIn('id', function ($query) {
            $query->select('user_id')->from('users_gelanggangs');
        })->get();
        $dataUsers['operatorC'] = $operatorC = User::whereHas('role', function ($query) {
            $query->where('name', 'Operator');
        })->whereNotIn('id', function ($query) {
            $query->select('user_id')->from('users_gelanggangs');
        })->get();

        return $dataUsers;
    }

    public function listGelanggang()
    {
        $gelanggang = DB::table('users_gelanggangs')
            ->select('gelanggangs.nama_gelanggang', 'roles.name as nama_role', 'users.name as nama_user')
            ->leftJoin('gelanggangs', 'gelanggangs.id', '=', 'users_gelanggangs.gelanggang_id')
            ->leftJoin('users', 'users.id', '=', 'users_gelanggangs.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->orderBy('gelanggangs.nama_gelanggang')
            ->get();

        $result = [];

        foreach ($gelanggang as $row) {
            $gelanggang_name = $row->nama_gelanggang;
            $nama_role = $row->nama_role;
            $nama_user = $row->nama_user;

            if (!isset($result[$gelanggang_name])) {
                $result[$gelanggang_name] = [];
            }

            $result[$gelanggang_name][] = [
                "nama_role" => $nama_role,
                "nama_user" => $nama_user,
            ];
        }

        $response = [];
        foreach ($result as $gelanggang_name => $peran_users) {
            $entry = [
                "nama_gelanggang" => $gelanggang_name,
                "peran_user" => $peran_users,
            ];
            $response[] = $entry;
        }

        return $response;
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

        $data = [
            ['gelanggang_id' => $gelanggangId, 'user_id' => $validatedData['juri1']],
            ['gelanggang_id' => $gelanggangId, 'user_id' => $validatedData['juri2']],
            ['gelanggang_id' => $gelanggangId, 'user_id' => $validatedData['juri3']],
            ['gelanggang_id' => $gelanggangId, 'user_id' => $validatedData['dewan']],
            ['gelanggang_id' => $gelanggangId, 'user_id' => $validatedData['operator']],
        ];

        foreach ($data as $val) {
            UserGelanggang::create($val);
        }

        return redirect('/management/gelanggang')->with('success', 'Gelanggang Berhasil ditambahkan!');
    }
}
