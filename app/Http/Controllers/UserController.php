<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'username' => 'johndoe',
                'role' => 'user',
                'status' => 'active',
                'created_at' => '2023-08-21'
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'username' => 'janesmith',
                'role' => 'admin',
                'status' => 'active',
                'created_at' => '2023-08-20'
            ],
            [
                'id' => 3,
                'name' => 'Alice Johnson',
                'username' => 'alicej',
                'role' => 'user',
                'status' => 'inactive',
                'created_at' => '2023-08-19'
            ],
            [
                'id' => 4,
                'name' => 'Bob Brown',
                'username' => 'bobbrown',
                'role' => 'user',
                'status' => 'active',
                'created_at' => '2023-08-18'
            ],
            [
                'id' => 5,
                'name' => 'Eve Davis',
                'username' => 'evedavis',
                'role' => 'admin',
                'status' => 'inactive',
                'created_at' => '2023-08-17'
            ]
        ];
        return view('management.users.users', [
            'title' => 'users',
            'data' => $users
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:100|min:5',
            'email' => 'required|max:255|email|unique:users',
            'password' => ['required','min:5']
        ]);
//        dd($validatedData);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

//        $request->session()->flash('success', 'Registration successfully! login');

        return redirect('/login')->with('success', 'Registration successfull');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',[
            'title' => 'update user',
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('admin')->with('success', 'Users has been deleted');
    }
}
