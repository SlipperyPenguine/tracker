<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\DependencyLookup;
use tracker\Models\User;

class ApiController extends Controller
{
    public function getUsers(Request $request)
    {
        $items = User::select('id as id', 'name as text')
            ->where('name', 'like', '%'.$request->input('q').'%')
            ->get();

        return response()->json($items);

    }

    public function getDependentLookup(Request $request)
    {
        $items = DependencyLookup::select('subject_id as id', 'subject_name as text', 'subject_type')
            ->where('subject_name', 'like', '%'.$request->input('q').'%')
            ->get();

        return response()->json($items);
    }

}
