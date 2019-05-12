<?php

namespace Infoalto\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use ImageIntervention;
use Illuminate\Http\File;

class Image extends Model
{
    private $sizes= [
        "sm" => [200, 200],
        "md" => [660, 660],
        "lg" => [1920, 1079],
        "xl" => [3000, 3000]
    ];
    protected $fillable = ['name','directory','title', 'imageable_type', 'imageable_id'];

    public function imageable(){
        return $this->morphTo();
    }

    public function getImageAttribute(){
        return $this->attributes["directory"]."md-".$this->attributes["name"];
    }

    public function getSmallImageAttribute(){
        return $this->attributes["directory"]."sm-".$this->attributes["name"];
    }

    public function getLargeImageAttribute(){
        return $this->attributes["directory"]."lg-".$this->attributes["name"];
    }

    public function getExtraLargeImageAttribute(){
        return $this->attributes["directory"]."xl-".$this->attributes["name"];
    }

    public function uploadImage(\Symfony\Component\HttpFoundation\File\UploadedFile $file, $image_name, $image_path = 'images/', $extension = 'png'){

        foreach($this->sizes as $key => $size) {
            $imagePath = $file->storeAs($image_path,$key."-".$image_name);
            $name = collect(explode('/', $imagePath))->last();
            $image = ImageIntervention::make(Storage::get($imagePath))->resize($size[0], $size[1], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode($extension, 100);
            Storage::put($imagePath, $image);
        }

    }
}
