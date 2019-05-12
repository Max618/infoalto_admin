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
    public function attach_permissions($options, $model){
        $permissions_string = $this->filter_permissions($options,$model);
        $permissions_array = $this->stringToArray(strtolower($permissions_string));
        foreach($permissions_array as $permission) {
            $permission = Permission::firstOrCreate(['name' => $permission]);
            $this->permissions()->attach($permission->id);
        }
    }
    private function filter_permissions($options,$model) {
        $filteredOptions = $options->filter(function ($option) use ($model) {
            $opt = explode("_",$option)[0];
            return $model->contains($opt);
        });
        return $filteredOptions->implode("/");
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
