<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'university',
        'description',
        'studies',
        'image',
        'cv',
        'contact',
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


    public function validacion(){
        return $this->hasOne(ValidacionEmpresa::class);
    }

    public function perfilCompletado(): bool
    {
        if(($this->university === null || $this->description === null || $this->studies === null || $this->image === null || ($this->cv === null && $this->contact === null)) && $this->rol === 1)
        {
            return false;
        }
        else if(($this->description === null || $this->image === null) && $this->rol === 2)
        {
            return false;
        }

        return true;
    }

}
