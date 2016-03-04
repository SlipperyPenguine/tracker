<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Action;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\Risk;
use tracker\Models\Task;
use tracker\Models\User;
use tracker\Models\WorkStream;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('Users.index', compact('users'));

    }

    public function  mydashboard()
    {
        $userid = auth()->user()->id;

        return $this->dashboard($userid);
    }

    public function dashboard($userid)
    {


        $user = User::findOrFail($userid);

        //get programs, workstreams and projects that the user is a member of
        $programs = Program::whereHas('Members', function($q) use ($userid)
        {
            $q->where('user_id', $userid);

        })->get();

        $workstreams = WorkStream::whereHas('Members', function($q) use ($userid)
        {
            $q->where('user_id', $userid);

        })->get();

        $projects = Project::whereHas('Members', function($q) use ($userid)
        {
            $q->where('user_id', $userid);

        })->get();

        //get tasks for the user
        $tasks = Task::where('action_owner', $userid)->get();

        //Get the users actions
        $actions = Action::where('actionee', $userid)->get();

        //Get risks and issues assigned to the user
        $risks = Risk::where('owner', $userid)->orWhere('action_owner', $userid)->get();

        //return $risks;

        return view('Users.dashboard', compact('user','programs','workstreams','projects','tasks','risks','actions'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        // Grab the inputs and validate them
/*        $new_user = $request->only(
            'email', 'name', 'password', 'password_confirmation', 'superUser'
        );*/

        //$validation = new SeatUserRegisterValidator;

        // Should the form validation pass, continue to attempt to add this user
        //if ($validation->passes()) {

            // Because users are soft deleted, we need to check if if
            // it doesnt actually exist first.
/*            $user = User::withTrashed()
                ->where('email', $request->email)
                ->orWhere('username', $request->username)
                ->first();*/

            // If we found the user, restore it and set the
            // new values found in the post
/*            if($user)
                $user->restore();
            else*/
                $user = new User;

            // With the user object ready, work the update


            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            if(isset($request->superUser))
            {
                $user->superUser = true;
            }
            $user->save();


            flash()->success('Success', 'Added user '.$request->name.' to the system');

            return redirect()->action('UserController@index');

        //} else {
//
       //     return redirect()->back()
   //             ->withInput()
  //              ->withErrors($validation->errors);
 //       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('Users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('Users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->newavatarfile);
        //dd(Input::file('newavatarfile'));
        //return $request->all();

        $user = User::findorFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->superUser = $request->superUser;
        $user->notifyNewTasks = $request->notifyNewTasks;
        $user->notifyNewActions = $request->notifyNewActions;
        $user->notifyNewRisks = $request->notifyNewRisks;
        $user->notifyChangedTasks = $request->notifyChangedTasks;
        $user->notifyChangedActions = $request->notifyChangedActions;
        $user->notifyChangedRisks = $request->notifyChangedRisks;
        $user->notifyDueTasks = $request->notifyDueTasks;
        $user->notifyDueActions = $request->notifyDueActions;
        $user->notifyDueRisks = $request->notifyDueRisks;

        $message = "$user->name's user profile updated successfully";

        if( $request->has('password') && strlen($request->password)>0 )
        {
            $user->password = bcrypt($request->password);

            $message .= ".  Password has been changed";
        }

        /*        $file = null;

                if(isset($request->newavatarfile)) {
                    $file = $request->newavatarfile;
                }
                elseif(isset($request->newavatarurl) && (strlen($request->newavatarurl)>0))
                {
                    $file = file_get_contents($request->newavatarurl);
                }

                if($file!=null)
                {

                    $path = public_path()."/img/avatars";

                    //return $path;

                    $filename = $user->id.'.'.$file->getClientOriginalExtension();
                    $thumbfilename = $user->id.'_thumb.'.$file->getClientOriginalExtension();

                    $jpgfullpath = $path.'/'.$user->id.'.jpg';
                    $pngfullpath = $path.'/'.$user->id.'.png';
                    //return $fullpath;

                    if(File::exists($jpgfullpath))
                        $delete = File::delete($jpgfullpath);

                    if(File::exists($pngfullpath))
                        $delete = File::delete($pngfullpath);


                    $image = Image::make($file->getRealPath());

                    $width = $image->width();
                    $height = $image->height();

                    if($width>=$height)
                    {

                        $image->resize(null, 500,function ($constraint) {
                            $constraint->aspectRatio();
                        })
                            ->crop(500,500)
                            ->save($path.'/'.$filename)
                            ->resize(50,50)
                            ->save($path.'/'.$thumbfilename);

                    }
                    else
                    {
                        $image->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                            ->crop(500,500)
                            ->save($path.'/'.$filename)
                            ->resize(50,50)
                            ->save($path.'/'.$thumbfilename);
                    }

                    $message .= ".  The profile picture has changed.  You may need to refresh your browser page to see the new picture";
                }*/

        $image = null;

        if(isset($request->newavatarfile))
        {
            $image = Image::make($request->newavatarfile->getRealPath());
        }
        elseif(isset($request->newavatarurl) && (strlen($request->newavatarurl)>0))
        {
            $image = Image::make(file_get_contents($request->newavatarurl));
        }


        if($image!=null)
        {
            $path = public_path()."/img/avatars/";
            $image->fit(500)
                ->save($path.$user->id.'.png')
                ->fit(50)
                ->save($path.$user->id.'_thumb.png');

            $message .= ".  The profile picture has changed.  You may need to refresh your browser page to see the new picture";
        }

        $user->save();

        flash()->success('Success', $message);

        return redirect(action('UserController@show', [$user->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
