<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Upload files to storage
     *
     * @param $files
     * @return path files
     */
    public function uploadFile($files, $newFolder=null)
    {
        if (!$files) {
            return '';
        }
        $imagePath = $files;
        $imageName = $imagePath->getClientOriginalName();
        $filename = explode('.', $imageName)[0];
        $extension = $imagePath->getClientOriginalExtension();
        $picName =  Str::slug(time()."_".$filename, "_").".". $extension;
        $folder = $newFolder ? 'uploads/'.$newFolder : 'uploads';
        $path = $files->storeAs($folder, $picName, 'public');
        return asset("storage") . '/' . $path;
    }
}
