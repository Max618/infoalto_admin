<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['name','directory', 'height', 'width', 'title', 'imageable_type', 'imageable_id'];

    public function imageable(){
        return $this->morphTo();
    }

    public function getImageAttribute(){
        return $this->attributes["directory"].$this->attributes["name"];
    }

    public function uploadImage($image, $path = "images", $image_name = null){
        $pathReturn = Storage::putFilesAs($path, $image, $image_name);
        return $pathReturn;
    }
}
