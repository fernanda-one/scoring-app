<?php

namespace App\Http\Controllers;

use App\Models\Partai;
use App\Models\Pertandingan;
use App\Models\User;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        return view('admin.index',[
            'title' => 'test'
        ]);
    }

    public function getUser()
    {

        return view('admin.users.users', [
           'title' => 'list user',
            'data' => User::paginate(10)
        ]);
    }

    public function getRooms()
    {
        return view('admin.rooms',[
            'title' => 'list rooms',
            'data' => collect(Pertandingan::paginate(5))->all()
        ]);
    }
}
