<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
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
        $users = User::latest();
        $search = \request('search') ?? '';
        if ($search != ''){
            $users->where('name','like', '%'.$search.'%')
                ->orWhere('username','like', '%'.$search.'%');
        }
        $role = [
            (object) [
                'name'=> 'Admin',
                'value'=>'admin'
            ],
            (object) [
                'name'=> 'Juri',
                'value'=>'juri'
            ],
            (object) [
                'name'=> 'Dewan',
                'value'=>'dewan'
            ],
            (object) [
                'name'=> 'Operator',
                'value'=>'operator'
            ],
            (object) [
                'name'=> 'Ketua Pertandingan',
                'value'=>'ketua'
            ],
        ];
        return view('management.users.users', [
            'title' => 'users',
            'data' => $users->paginate(10),
            'roles' => $role
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
            'name' => 'required|max:100|min:5',
            'username' => 'required|max:100|min:5|unique:users',
            'role'=> 'required',
            'password' => ['required','min:5']
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
//        dd($validatedData);
        User::create($validatedData);

//        $request->session()->flash('success', 'Registration successfully! login');

        return redirect('/management')->with('success', 'Registration successfully!');
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
    public function edit(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|min:5',
            'username' => 'required|max:100|min:5',
            'role'=> 'required',
            'password' => 'nullable|string|min:5|confirmed',
        ]);
        $user = User::findOrFail($id);
        if ($validatedData['password'] !== null)
        {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }else{
            Arr::forget($validatedData, 'password');
        }
        $user->update($validatedData);

        return redirect('/management')->with('success', 'User updated successfully.');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('management')->with('success', 'Users has been deleted');
    }
}
