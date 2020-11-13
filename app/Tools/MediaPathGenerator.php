<?php

namespace App\Tools;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

class MediaPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $className = (new \ReflectionClass($media->model))->getShortName();
        $path = app()->environment() . '/' . strtolower($className).'/';
        if ($media->collection_name) {
            $path = $path.Str::slug(strtolower($media->collection_name)).'/';
        }

        return $path.md5($media->id.config('app.key')).'/';
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media).'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'responsive-images/';
    }
}
