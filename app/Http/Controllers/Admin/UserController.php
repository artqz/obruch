<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {      
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|string|max:255|regex:/^[\w-]*$/|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        return User::create([
            'login' => $request->input('login'),
            'rang' => $request->input('rang'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'password' => bcrypt($request->input('password')),
        ]);
        dd($request);
    }
}
