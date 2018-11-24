<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','description'];

    public function roles(){
        return $this->belongsToMany('Infoalto\Admin\Role');
    }
}
