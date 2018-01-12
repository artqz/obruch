<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function organizations_search(Request $request)
    {
        $organization_name = $request->term;
        $organization = Organization::where('name', 'like', '%' . $organization_name . '%')->get();
        return json_encode($organization);
    }
}
