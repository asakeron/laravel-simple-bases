<?php

namespace LaravelSimpleBases\Utils;

use Illuminate\Database\Eloquent\Model;

class FileInterceptorUtil
{
    static function getSaveLocation(Model $model): string
    {
        $array = explode('\\', get_class($model));
        $lastIndex = array_key_last(explode('\\', get_class($model)));

        return 'files/' . strtolower($array[$lastIndex]);

    }

    static function makeUrl(string $modelName, string $file, string $extension): string
    {
        $array = explode('\\', $modelName);
        $lastIndex = array_key_last(explode('\\', $modelName));

        return config('filesystems.bucket_url', config('app.url'))
	    . '/files/'
            . strtolower($array[$lastIndex])
            . '/'
            . $file
            . $extension;
    }
}
