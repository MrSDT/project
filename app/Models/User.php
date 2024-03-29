<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'phoneNumber_verified',
        'password',
        'userGroup',
        'onlineStatus',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class);
    }

    public function kyc()
    {
        return $this->hasOne(KycData::class, 'email', 'email');
    }

    public function kycstatus()
    {
        return $this->hasOne(KycData::class);
    }

    public function advertise()
    {
        return $this->hasMany(AdvertiseData::class, 'email', 'email');
    }

    public function jobs()
    {
        return $this->hasMany(JobsData::class, 'email', 'email');
    }

}
