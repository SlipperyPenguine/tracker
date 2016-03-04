<?php

namespace tracker\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\File;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'superUser'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getavatarAttribute($value)
    {
        $id = $this->id;
        $path = '/img/avatars/'.$id.'_thumb.png';
        $filename = public_path().$path;

        if(File::exists($filename))
            return $path;

        $path = '/img/avatars/'.$id.'_thumb.jpg';
        $filename = public_path().$path;

        if(File::exists($filename))
            return $path;

         return '/img/avatars/no_avatar.png';
    }

    public function getProfilePictureAttribute($value)
    {
        $id = $this->id;
        $path = "/img/avatars/$id.png";
        $filename = public_path().$path;

        if(File::exists($filename))
            return $path;

        $path = "/img/avatars/$id.jpg";
        $filename = public_path().$path;

        if(File::exists($filename))
            return $path;

        return '/img/avatars/no_avatar.png';
    }

    public function Programs()
    {
        $userid = $this->id;
        return Program::whereHas('Members', function($q) use ($userid)
        {
            $q->where('user_id', $userid);

        })->get();
    }

    public function WorkStreams()
    {
        $userid = $this->id;
        return WorkStream::whereHas('Members', function($q) use ($userid)
        {
            $q->where('user_id', $userid);

        })->get();
    }

    public function Projects()
    {
        $userid = $this->id;
        return Project::whereHas('Members', function($q) use ($userid)
        {
            $q->where('user_id', $userid);

        })->get();
    }

    public function Tasks()
    {
        return Task::where('action_owner', $this->id)->get();
    }

    public function TaskCount()
    {
        return Task::where('action_owner', $this->id)->where('status','Open')->count();
    }

    public function Actions()
    {
        return Action::where('actionee', $this->id)->get();
    }

    public function ActionCount()
    {
        return Action::where('actionee', $this->id)->where('status','Open')->count();
    }

    public function OverdueActionCount()
    {
        return Action::where('actionee', $this->id)->where('status','Open')->where('DueDate', '<', date("Y-m-d H:i:s") )->count();
    }

    public function RisksAndIssues()
    {

        return Risk::where('owner', $this->id)->get();
    }

    public function RiskCount()
    {
        return Risk::where('owner', $this->id)->where('is_an_issue', 0)->where('status','Open')->count();
        //$action_owner_count = Risk::where('action_owner', $this->id)->where('is_an_issue', 0)->where('status','Open')->count();


        //return $ownercount;
    }

    public function OverdueRiskCount()
    {
        return Risk::where('owner', $this->id)->where('is_an_issue', 0)->where('status','Open')->where('NextReviewDate', '<', date("Y-m-d H:i:s") )->count();
    /*    $action_owner_count = Risk::where('action_owner', $this->id)->where('is_an_issue', 0)->where('status','Open')->where('NextReviewDate', '<', date("Y-m-d H:i:s") )->count();

        return $ownercount + $action_owner_count;*/
    }

    public function IssueCount()
    {
        return Risk::where('owner', $this->id)->where('is_an_issue', 1)->where('status','Open')->count();
/*        $action_owner_count = Risk::where('action_owner', $this->id)->where('is_an_issue', 1)->where('status','Open')->count();


        return $ownercount + $action_owner_count;*/
    }

    public function OverdueIssueCount()
    {
        return Risk::where('owner', $this->id)->where('is_an_issue', 1)->where('status','Open')->where('NextReviewDate', '<', date("Y-m-d H:i:s") )->count();
/*        $action_owner_count = Risk::where('action_owner', $this->id)->where('is_an_issue', 1)->where('status','Open')->where('NextReviewDate', '<', date("Y-m-d H:i:s") )->count();

        return $ownercount + $action_owner_count;*/
    }

    public function isAdmin()
    {
        return $this->superUser;
    }
}
