<?php

namespace Infoalto\Admin;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\File;

class Helpers {
    public static function getModels($modelNamespace = 'Infoalto\\Admin') {
        $appNamespace = "Infoalto\\Admin";

        $models = collect(File::files(app_path()))->map(function ($item) use ($appNamespace, $modelNamespace) {
            $rel = $item->getRelativePathName();
            $class = explode(".",$rel)[0];
            return $class;
        })->filter();

        return $models;
    }
}
