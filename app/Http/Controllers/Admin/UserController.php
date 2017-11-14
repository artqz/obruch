<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.show', compact('user'));
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

        $user = User::create([
            'login' => $request->input('login'),
            'rang' => $request->input('rang'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect('admin/users/'. $user->id);
    }

    public function update_info(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|string|max:255|regex:/^[\w-]*$/|unique:users,login,'.$id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous() . '#info')
                ->withErrors($validator)
                ->withInput();
        }

        User::where('id', $id)
            ->update([
            'login' => $request->input('login'),
            'rang' => $request->input('rang'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
        ]);

        return redirect(url()->previous() . '#info');;
    }

    public function update_password(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous() . '#password')
                ->withErrors($validator)
                ->withInput();
        }

        User::where('id', $id)
            ->update([
                'password' => bcrypt($request->input('password')),
            ]);

        return redirect(url()->previous() . '#password');
    }
}
