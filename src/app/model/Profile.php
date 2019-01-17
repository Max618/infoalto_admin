<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['birthday','phone', 'cpf', 'rg', 'about', 'user_id'];

    protected $casts = [
        'birthday' => 'date:Y-m-d'
    ];

    public function user(){
        return $this->hasOne("App\User");
    }

    public function image(){
        return $this->morphOne('Infoalto\Admin', 'imageable');
    }
}
