<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name','directory', 'height', 'width', 'title', 'imageable_type', 'imageable_id'];

    public function imageable(){
        return $this->morphTo();
    }

    public function getImageAttribute(){
        return $this["attributes"]->directory.$this["attributes"]->name;
    }
}
