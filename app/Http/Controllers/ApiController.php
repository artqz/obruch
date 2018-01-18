<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Tag;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function organizations_search(Request $request)
    {
        $organization_name = $request->term;
        $organization = Organization::where('name', 'like', '%' . $organization_name . '%')->orwhere('short_name', 'like', '%' . $organization_name . '%')->get();
        return json_encode($organization);
    }
    public function tags_search(Request $request)
    {
        $tag_name = $request->term;
        $tag = Tag::where('name', 'like', '%' . $tag_name . '%')->get();
        return json_encode($tag);
    }
}
