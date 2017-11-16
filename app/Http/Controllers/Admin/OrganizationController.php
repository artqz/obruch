<?php

namespace App\Http\Controllers\admin;

use App\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::paginate(30);
        return view('admin.organizations.index', compact('organizations'));
    }

    public function show($id)
    {
        $organization = Organization::where('id', $id)->first();
        return view('admin.organizations.show', compact('organization'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'address' => 'string|max:255',
            'coordinates' => 'string|max:255',
        ]);

        $organization = Organization::create([
            'name' => $request->input('name'),
            'short_name' => $request->input('short_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'coordinates' => $request->input('coordinates'),
        ]);

        return redirect('admin/organizations/'. $organization->id)
            ->with([
                'flash_message' => 'Вы успешно добавили организацию '.$request->input('short_name'),
                'flash_message_status' => 'success',
            ]);
    }

    public function update_info(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'address' => 'string|max:255',
            'coordinates' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous() . '#info')
                ->withErrors($validator)
                ->withInput();
        }

        Organization::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'short_name' => $request->input('short_name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'coordinates' => $request->input('coordinates'),
            ]);

        return redirect(url()->previous() . '#info')
            ->with([
                'flash_message' => 'Вы успешно обновили информацию',
                'flash_message_status' => 'success',
            ]);
    }
}
