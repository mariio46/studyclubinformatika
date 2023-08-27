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

    public static function getRegistrationCode()
    {
        /**
         * To get registration code :
         * (Total User - User has role)
         */
        $totalUser = User::whereRaw('id = (select max(`id`) from users)')->select('id')->first()->id;
        $totalUserHasRole = User::whereHas('roles')->count();
        $result = $totalUser - $totalUserHasRole;
        $registrationCode = sprintf('12%03s', $result + 1);

        return $registrationCode;
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
