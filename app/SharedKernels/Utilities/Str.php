<?php

namespace App\SharedKernels\Utilities;


class Str extends \Illuminate\Support\Str
{
    public static function toJson(array $data): string
    {
        return json_encode($data);
    }
}
