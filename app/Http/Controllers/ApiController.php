<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\DependencyLookup;
use tracker\Models\User;
use tracker\Project\MSProjectUpload;

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

    public function setBodyClass(Request $request)
    {
        //$inputs = serialize($request->all());
        //Log::info('Ajax request fired to setToggleMenu method: '.$inputs);

        if($request->has('styling'))
        {
            //Log::info('Found hidemenu with value of: '.$request->input('hidemenu'));
            session([ 'body-class' => $request->input('styling') ]);
            //Log::info('Session value is now: '.Session::get('hidden-menu'));
        }
        else
        {
            Log::warning('setBodyClass called with no styling input');
        }
    }

    public function getProjectExtendedAttributes(Request $request)
    {
        $path = public_path() . "/projectfiles";
        $projectid = $request->input('projectid');
        $filename = "$path/$projectid.xml";

        $projectupload = new MSProjectUpload();

        $extendedattributes = $projectupload->GetExtendedAttributes($filename);

        //Log::info('extended attributes:' . count($extendedattributes) );

        return response()->json($extendedattributes);

    }

}
