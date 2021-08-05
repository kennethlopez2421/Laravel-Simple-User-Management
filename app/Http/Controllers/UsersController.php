<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreValidation;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;


class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreValidation $request ,User $user)
    {
            User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);

        session()->flash('success', 'Users Successfully Added.');

        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        return view ('users.create')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([

            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request['password'])

        ]);

        $user->save();

        session()->flash('success', 'User updated Successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'User deleted Successfully');

        return redirect(route('users.index'));
    }
}
