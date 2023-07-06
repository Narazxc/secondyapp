<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\MustVerifyMobile;
use App\Interfaces\MustVerifyMobile as IMustVerifyMobile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;



class User extends Authenticatable implements IMustVerifyMobile
{
    use HasApiTokens, HasFactory, Notifiable;
    use MustVerifyMobile;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'mobile_verify_code',
        'mobile_attempts_left',
        'mobile_last_attempt_date',
        'mobile_verify_code_sent_at',
        'wizard_completed'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'mobile_verify_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'number_verified_at' => 'datetime',
        'mobile_verify_code_sent_at' => 'datetime',
        'mobile_last_attempt_date' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean'
    ];

    public function routeNotificationForVonage($notification)
    {
        return $this->mobile_number;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function preference(): HasOne
    {
        return $this->hasOne(Preference::class);
    }

    public function userContact(): HasOne
    {
        return $this->hasOne(UserContact::class);
    }

}
