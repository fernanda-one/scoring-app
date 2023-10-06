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
    public function index(Request $request)
    {
        $gelanggang = $this->listGelanggang();
        $dataUsers = $this->dataUsers();
//        dd($gelanggang);
        return view('management.gelanggang.gelanggang', [
            'title' => 'gelanggang',
            'gelanggangs' => $gelanggang,
            'juri1U' => $dataUsers['Juri PertamaU'],
            'juri2U' => $dataUsers['Juri KeduaU'],
            'juri3U' => $dataUsers['Juri KetigaU'],
            'dewanU' => $dataUsers['DewanU'],
            'operatorU' => $dataUsers['OperatorU'],
            'juri1C' => $dataUsers['Juri PertamaC'],
            'juri2C' => $dataUsers['Juri KeduaC'],
            'juri3C' => $dataUsers['Juri KetigaC'],
            'dewanC' => $dataUsers['DewanC'],
            'operatorC' => $dataUsers['OperatorC'],
        ]);
    }

    public function dataUsers()
    {
        $roles = ['Juri Pertama', 'Juri Kedua', 'Juri Ketiga', 'Dewan', 'Operator'];

        $dataUsers = [];

        foreach ($roles as $role) {
            $dataUsers[$role . 'U'] = User::whereHas('role', function ($query) use ($role) {
                $query->where('name', $role);
            })->get();
            $dataUsers[$role . 'C'] = User::whereHas('role', function ($query) use ($role) {
                $query->where('name', $role);
            })->whereNotIn('id', function ($query) {
                $query->select('user_id')->from('users_gelanggangs');
            })->get();
        }

        return $dataUsers;
    }


    public function listGelanggang()
    {
        $search = \request('search') ?? '';
        $gelanggang = DB::table('gelanggangs')
            ->select(
                'gelanggangs.id as id',
                'gelanggangs.nama_gelanggang',
                DB::raw('STRING_AGG(roles.name, \', \') as nama_role'),
                DB::raw('STRING_AGG(users.name, \', \') as nama_user')
            )
            ->leftJoin('users_gelanggangs', 'users_gelanggangs.gelanggang_id', '=', 'gelanggangs.id')
            ->leftJoin('users', 'users.id', '=', 'users_gelanggangs.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->groupBy('gelanggangs.id', 'gelanggangs.nama_gelanggang');

        if ($search != ''){
            $gelanggang->where('gelanggangs.nama_gelanggang','like', '%'.$search.'%');
        }
        $gelanggang = $gelanggang->get();
        $result = [];

        foreach ($gelanggang as $row) {
            $gelanggang_id = $row->id;
            $gelanggang_name = $row->nama_gelanggang;
            $nama_roles = explode(', ', $row->nama_role);
            $nama_users = explode(', ', $row->nama_user);

            if (!isset($result[$gelanggang_id])) {
                $result[$gelanggang_id] = [
                    "id" => $gelanggang_id,
                    "nama_gelanggang" => $gelanggang_name,
                    "peran_user" => [],
                ];
            }
            foreach ($nama_roles as $index => $nama_role) {
                $result[$gelanggang_id]['peran_user'][] = [
                    "nama_role" => $nama_role,
                    "nama_user" => $nama_users[$index] ?? "",
                ];
            }
        }

        $response = array_values($result);

        return $response;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama_gelanggang' => 'required',
        ]);
        Gelanggang::create([
            'nama_gelanggang' => $validatedData['nama_gelanggang'],
        ]);

        return redirect('/management/gelanggang')->with('success', 'Gelanggang Berhasil ditambahkan!');
    }

    public function edit(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nama_gelanggang' => 'required',
            'juri1' => 'required',
            'juri2' => 'required',
            'juri3' => 'required',
            'dewan' => 'required',
            'operator' => 'required',
        ]);

        $gelanggang = Gelanggang::findOrFail($id);
        $gelanggang->update(['nama_gelanggang' => $validatedData['nama_gelanggang']]);

// Daftar peran yang perlu diperbarui
        $roles = [
            'Juri Pertama' => 'juri1',
            'Juri Kedua' => 'juri2',
            'Juri Ketiga' => 'juri3',
            'Dewan' => 'dewan',
            'Operator' => 'operator',
        ];

        foreach ($roles as $roleName => $fieldName) {
            $userId = $validatedData[$fieldName];

            $userRole = UserGelanggang::where('gelanggang_id', $id)
                ->whereHas('user', function ($query) use ($roleName) {
                    $query->whereHas('role', function ($subquery) use ($roleName) {
                        $subquery->where('name', $roleName);
                    });
                })->first(); // Gunakan first() untuk mencari entri pertama yang sesuai

            if ($userRole) {
                // Jika entri ditemukan, lakukan pembaruan
                $userRole->update(['user_id' => $userId]);
            } else {
                // Jika entri tidak ditemukan, tambahkan entri baru
                UserGelanggang::create([
                    'gelanggang_id' => $id,
                    'user_id' => $userId,
                ]);
            }
        }

        return redirect('/management/gelanggang')->with('success', 'Gelanggang Berhasil Update!');

    }

    public function destroy($id)
    {
        Gelanggang::destroy($id);
        UserGelanggang::where('gelanggang_id', $id)->delete();
        return redirect('/management/gelanggang')->with('success', 'Gelanggang Berhasil Delete!');
    }
}
