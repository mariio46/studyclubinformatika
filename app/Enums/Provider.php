<?php

namespace App\Enums;

enum Provider: string
{
    case Github = 'github';
    case Twitter = 'twitter';
    case Google = 'google';
}
