<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('getTutorialAsset')) {
    function getTutorialAsset($string): string
    {
        $string = Storage::url("image/tutorial/{$string}");

        return $string;
    }
}

if (! function_exists('getFirstName')) {
    function getFirstName($string): string
    {
        $string = str()->of(strtolower($string))->explode(' ')->get(0);

        return $string;
    }
}

if (! function_exists('firstWord')) {
    function firstWord($string): string
    {
        $string = explode(' ', trim($string));

        return $string[0];
    }
}

if (! function_exists('acronym')) {
    function acronym($string): string
    {
        $words = explode(' ', $string);
        $acronym = '';

        foreach ($words as $word) {
            $acronym .= $word[0];
        }

        return $acronym;
    }
}
