<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Searchable;

    protected $fillable = [
        'name',
        'whatsapp',
        'has_verified',
        'username',
        'picture',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }

    public function registrantActivity()
    {
        return $this->hasOne(RegistrantActivity::class);
    }

    public function getNickname()
    {
        return Str::of($this->name)->explode(' ')->get(0);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
        ];
    }
}
