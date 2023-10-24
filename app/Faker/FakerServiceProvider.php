<?php

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FakerServiceProvider extends Base
{
    public function fakeImage(string $from, string $to): string
    {
        if (Storage::directoryMissing($to)) {
            Storage::makeDirectory($to);
        }

        $fromFiles = glob($from.'/*.jpg');
        $randomFile = $fromFiles[rand(0, count(glob($from.'/*.jpg')) - 1)];

        $name = Str::random(10).'.jpg';

        copy($randomFile, $to.$name);

        return $name;
    }
}
