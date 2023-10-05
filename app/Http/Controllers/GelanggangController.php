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

        return view('management.gelanggang.gelanggang', [
            'title' => 'gelanggang',
            'gelanggangs' =>$gelanggang,
            'juri1U' => $dataUsers['juri1C'],
            'juri2U' => $dataUsers['juri2C'],
            'juri3U' => $dataUsers['juri3C'],
            'dewanU' => $dataUsers['dewanC'],
            'operatorU' => $dataUsers['operatorC'],
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
            'juri1'=> 'required',
            'juri2'=> 'required',
            'juri3'=> 'required',
            'dewan'=> 'required',
            'operator'=> 'required',
        ]);

        $gelanggang = Gelanggang::findOrFail($id);
        $gelanggang->update(['nama_gelanggang' => $validatedData['nama_gelanggang']]);

        // Update user_id for Juri Pertama
        $UG_JuriPertama = UserGelanggang::where('gelanggang_id', $id)->whereHas('user', function ($query) {
            $query->whereHas('role', function ($subquery) {
                $subquery->where('name', 'Juri Pertama');
            });
        });
        $UG_JuriPertama->update(['user_id' => $validatedData['juri1']]);

        // Update user_id for Juri Kedua
        $UG_JuriKedua = UserGelanggang::where('gelanggang_id', $id)->whereHas('user', function ($query) {
            $query->whereHas('role', function ($subquery) {
                $subquery->where('name', 'Juri Kedua');
            });
        });
        $UG_JuriKedua->update(['user_id' => $validatedData['juri2']]);

        // Update user_id for Juri Ketiga
        $UG_JuriKetiga = UserGelanggang::where('gelanggang_id', $id)->whereHas('user', function ($query) {
            $query->whereHas('role', function ($subquery) {
                $subquery->where('name', 'Juri Ketiga');
            });
        });
        $UG_JuriKetiga->update(['user_id' => $validatedData['juri3']]);

        // Update user_id for Dewan
        $UG_Dewan = UserGelanggang::where('gelanggang_id', $id)->whereHas('user', function ($query) {
            $query->whereHas('role', function ($subquery) {
                $subquery->where('name', 'Dewan');
            });
        });
        $UG_Dewan->update(['user_id' => $validatedData['dewan']]);

        // Update user_id for Operator
        $UG_Operator = UserGelanggang::where('gelanggang_id', $id)->whereHas('user', function ($query) {
            $query->whereHas('role', function ($subquery) {
                $subquery->where('name', 'Operator');
            });
        });
        $UG_Operator->update(['user_id' => $validatedData['operator']]);



        return redirect('/management/gelanggang')->with('success', 'Gelanggang Berhasil Update!');
    }

    public function destroy($id)
    {
        Gelanggang::destroy($id);
        UserGelanggang::where('gelanggang_id', $id)->delete();
        return redirect('/management/gelanggang')->with('success', 'Gelanggang Berhasil Delete!');
    }
}
