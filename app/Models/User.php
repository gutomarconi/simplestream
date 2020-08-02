<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App
 *
 * @author Gustavo Marconi
 * @since 01/08/2020
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the JWT identifier to check authentication
     *
     * @return string
     */
    public function getJWTIdentifier(): string
    {
        return $this->getKey();
    }

    /**
     * JWT custom claims is needed to generate JWT token
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
