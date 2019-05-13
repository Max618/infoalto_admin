<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    protected $fillable = ['birthday','phone', 'cpf', 'rg', 'about', 'user_id'];

    protected $casts = [
        'birthday' => 'date:Y-m-d'
    ];

    public function getBirthdayAttribute(){
        return (new Carbon($this->attributes["birthday"]))->format("d/m/Y");
    }

    public function getPhoneAttribute(){
        $novo = substr_replace($this->attributes["phone"], '(', 0, 0);
        $novo = substr_replace($novo, ') ', 3, 0);
        $novo = substr_replace($novo, " ", 6, 0);
        $novo = substr_replace($novo, "-", 11,0);
        return $novo;
    }

    public function getPhoneNormalAttribute(){
        return $this->attributes["phone"];
    }

    public function getBirthdayNormalAttribute(){
        return $this->attributes["birthday"];
    }

    public function user(){
        return $this->hasOne("App\User");
    }

    public function image(){
        return $this->morphOne('Infoalto\Admin\Image', 'imageable');
    }
}
