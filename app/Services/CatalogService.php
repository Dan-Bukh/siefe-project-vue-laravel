<?php

namespace App\Services;

class CatalogService
{
    public function ImagesExplode($value) {
        $images = explode("&", $value[0]['image']);
        foreach($images as $key => $image) {
            $images[$key] = asset($image);
        }
        $value[0]['image'] = $images;
        return $value;
    }

    public function ImagesExplodeWithFor($value) {
        for($i = 0; $i < count($value); $i++) {
            $images = explode("&", $value[$i]['image']);
            foreach($images as $key => $image) {
                $images[$key] = asset($image);
            }
            $value[$i]['image'] = $images;
        }
        return $value;
    }
}
