<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Room;
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
            'data' => collect(Room::paginate(5))->all()
        ]);
    }
}
