<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['birhday','phone', 'cpf', 'rg', 'about', 'user_id'];

    protected $casts = [
        'birhday' => 'date:Y-m-d'
    ];

    public function user(){
        return $this->hasOne("App\User");
    }

    public function image(){
        return $this->morphOne('Infoalto\Admin', 'imageable');
    }
}
