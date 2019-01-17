<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','description'];

    public function permissions(){
        return $this->belongsToMany('Infoalto\Admin\Permission');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function attach_permissions($permissions_string){
        $permissions_array = $this->stringToArray($permissions_string);
        foreach($permissions_array as $permission) {
            $permission = Permission::firstOrCreate(['name' => $permission]);
            $this->permissions()->attach($permission->id);
        }
    }
    private function stringToArray($string){
        return explode("/",$string);
    }
    public function getPermissionsAttribute(){
        $permissions = $this->permissions()->get()->map(function ($permission) {
            return $permission->name;
        })->toArray();
        $permissions_string = implode("/",$permissions);
        return $permissions_string;
    }
}
