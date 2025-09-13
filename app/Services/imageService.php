<?php

namespace App\Services;

use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class imageService{
    public static function upload($imageFile, $folderName){
        $manager = new ImageManager(new Driver());
        //Storage::putFile('shops/', $imageFile); リサイズなし
        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName. '.' . $extension;
        $resizedImage = $manager->read($imageFile)->resize(1920, 1080)->encode();

        Storage::put($folderName .'/'. $fileNameToStore, $resizedImage);

        return $fileNameToStore;
    }
}
