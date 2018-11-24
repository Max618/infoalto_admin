<?php

namespace Infoalto\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Infoalto\Admin\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('Infoalto\Admin\Role');
    }

    public function hasPermission(Permission $permissions){
        return $this->hasAnyRoles($permissions->roles);
    }

    public function hasAnyRoles($roles){
        if(is_array($roles) || is_object($roles)){
            $allRoles = $this->roles()->get();
            foreach($roles as $role){
                if($allRoles->contains("id",$role->id))
                    return true;
            }
            return false;
        }

        return $this->roles()->get()->contains("id",$roles->id);
    }
}
