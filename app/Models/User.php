<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable, Searchable;

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

    public static function getRegistrationCode()
    {
        /**
         * To get registration code :
         * (Total User - User has role)
         */
        $totalUser = User::whereRaw('id = (select max(`id`) from users)')->select('id')->first()->id;
        $totalUserHasRole = User::whereHas('roles')->count();
        $result = $totalUser - $totalUserHasRole;
        $registrationCode = sprintf('11%03s', $result + 1);

        return $registrationCode;
    }

    public static function getVerifiedRegistrants()
    {
        return User::query()
            ->where('has_verified', 1)
            ->select('id', 'name', 'username', 'picture', 'email', 'created_at', 'has_verified')
            ->doesntHave('roles')
            ->with('biodata:id,user_id,fullname,sex,disease,whatsapp,fatherWhatsapp,motherWhatsapp,goals')
            ->get();
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function biodata(): HasOne
    {
        return $this->hasOne(Biodata::class);
    }

    public function timeline(): HasOne
    {
        return $this->hasOne(Timeline::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
        ];
    }

    public function hasPicture(): bool
    {
        return (bool) $this->picture != null;
    }

    public function getNickname()
    {
        return Str::of($this->name)->explode(' ')->get(0);
    }

    public function scopeWithRegistrantDetails($query, $identifier)
    {
        return $query->where('username', $identifier)
            ->whereDoesntHave('roles')
            ->select('id', 'name', 'username', 'email', 'picture')
            ->whereNotNull(['id', 'name', 'username', 'email', 'picture'])
            ->with(['biodata' => fn ($query) => $query->whereNotNull([
                'fullname', 'whatsapp', 'sex', 'religion', 'city', 'birthday', 'address', 'university', 'faculty',
                'major', 'semester', 'father', 'fatherWhatsapp', 'mother', 'motherWhatsapp', 'vehicle', 'organizationsExp', 'goals',
            ])->firstOr(callback: fn () => abort(504))]);
    }
}
