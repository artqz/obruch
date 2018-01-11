<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index($organization_id)
    {
        $organization = Organization::where('id', $organization_id)->first();
        return view('admin.organizations.departments.index', compact('organization'));
    }

    public function create($organization_id)
    {
        $organization = Organization::where('id', $organization_id)->first();
        return view('admin.organizations.departments.create', compact('organization'));
    }

    public function store(Request $request, $organization_id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $department = Department::create([
            'name' => $request->input('name'),
            'organization_id' =>  $organization_id,
        ]);

        return redirect('admin/organizations/'. $organization_id .'#department-'. $department->id)
            ->with([
                'flash_message' => 'Вы успешно добавили отдел '.$request->input('name'),
                'flash_message_status' => 'success',
            ]);
    }
}
