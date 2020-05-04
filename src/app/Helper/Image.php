<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;

trait Image
{
    function uploadImage($file)
    {

        $imgName = $file->getClientOriginalName();
        $imgName = time() . rand(0, 999999) . $imgName;
        $file->move('images/products', $imgName);
        return $imgName;
    }

    function deleteImage($image)
    {
        $image_path = "images/products/" . $image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }
}

