<?php

namespace App;
use App\Role;
use App\Photo;
use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'name', 'email', 'password', 'role_id', 'is_active','photo_id','',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    * @param Role relationship model
    */

    public function role(){
        return $this->belongsTo('App\Role');
    }

    /*
    * @param Photo relationship model
    */

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    /**
     *  encrypt $password
     */

    public function setPasswordAttribute($password)
    {
        if (!empty($password)){

            $this->attributes['password'] = bcrypt($password);
        }
    }
    /**
    *  check if user logged in isAdmin
    */

    public function isAdmin(){

        if($this->role->name =="Administrator" && $this->is_active == 1){

            return true;
        }
        return false;
    }

    /**
     *  Posts relationship model
     */

    public function posts(){
        return $this->hasMany('App\Post');
    }

}
