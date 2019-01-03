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
}
