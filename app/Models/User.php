<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_number', 'birthday', 'phone_number', 'is_admin', 'is_active', 'city_id'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'age'
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function sended_mails() {
        return $this->hasMany(Mail::class, 'sender_id');
    }

    public function received_mails() {
        return $this->hasMany(Mail::class, 'recipient_id');
    }

    public function getAgeAttribute() {
        return Carbon::parse($this->birthday)->age;
    }
}
