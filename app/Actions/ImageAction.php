<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageAction
{
    public function __invoke($image, int $width = 400, int $height = 220): string
    {
        $filename = md5(time()) . '.' . $image->getClientOriginalExtension();
        $path = Storage::putFileAs("/public/image/origin", $image, $filename);
        $thumbnail = Image::make(Storage::path($path));
        $thumbnail->fit($width, $height);
        Storage::delete($path);
        $thumbnail->save(Storage::path("/public/image/thumbnail/" . $filename));
        return $filename;
    }
}
