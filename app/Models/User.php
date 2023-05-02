<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Leave;
use App\Models\Appointment;
use Illuminate\Support\Arr;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'firstName',
        'lastName',
        'email',
        'password',
        'phone_number',
        'position',
        'last_login',
        'manager_id',
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
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function leaves(){
        return $this->hasMany(Leave::class);
    }

    public function manager(){
        return $this->belongsTo(self::class, 'manager_id');
    }

    public function getFullNameAttribute()
{
    return Arr::get(config('employees.titles'), $this->title) . ' ' . $this->firstName . ' ' . $this->lastName;
}
}
