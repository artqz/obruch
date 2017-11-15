<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
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
            'ip_address' => $request->ip(),
        ]);

        return redirect('admin/users/'. $user->id)
            ->with([
                'flash_message' => 'Вы успешно создали аккаунт '.$request->input('login'),
                'flash_message_status' => 'success',
            ]);
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

        return redirect(url()->previous() . '#info')
            ->with([
                'flash_message' => 'Вы успешно обновили информацию профиля',
                'flash_message_status' => 'success',
            ]);
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

        return redirect(url()->previous() . '#password')
            ->with([
                'flash_message' => 'Вы успешно обновили пароль',
                'flash_message_status' => 'success',
            ]);
    }

    public function update_photo(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous() . '#password')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('id', $id)->first();
        $photo = $request->file('photo');
        $filename = $user->login .'.'. $photo->getClientOriginalExtension();

        Image::make($photo)
            ->fit(200)
            ->save(public_path('images/users/'. $filename));

        User::where('id', $id)
            ->update([
                'photo' => $filename,
            ]);

        return redirect(url()->previous() . '#photo')
            ->with([
                'flash_message' => 'Вы успешно обновили фотографию профиля',
                'flash_message_status' => 'success',
            ]);
    }

    public function delete(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        User::where('id', $id)
            ->update([
                'is_hide' => true,
            ]);

        return redirect('admin/users/')
            ->with([
                'flash_message' => 'Вы успешно удалили профиль '. $user->login,
                'flash_message_status' => 'success',
            ]);
    }

    public function restore(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        User::where('id', $id)
            ->update([
                'is_hide' => false,
            ]);

        return redirect(url()->previous())
            ->with([
                'flash_message' => 'Вы успешно восстановили профиль '. $user->login,
                'flash_message_status' => 'success',
            ]);
    }
}
