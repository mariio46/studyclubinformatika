<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    public static function getRegistrationStatus(): bool
    {
        $data = Registration::query()->where('id', 1)->select('status')->first()->status;

        return (bool) $data == 1 ? true : false;
    }
}
