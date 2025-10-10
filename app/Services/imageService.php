<?php

namespace App\Services;

use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class imageService{
    public static function upload($imageFile, $folderName){
//        dd($imageFile);

        if(is_array($imageFile)){
            $file = $imageFile['image'];
        } else {
            $file = $imageFile;
        }
        $manager = new ImageManager(new Driver());
        //Storage::putFile('shops/', $imageFile); リサイズなし
        $fileName = uniqid(rand().'_');
        $extension = $file->extension();
        $fileNameToStore = $fileName. '.' . $extension;
        $resizedImage = $manager->read($file)->resize(1920, 1080)->encode();

        Storage::put($folderName .'/'. $fileNameToStore, $resizedImage);

        return $fileNameToStore;
    }
}
