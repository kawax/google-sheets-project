<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Revolution\Google\Sheets\Traits\GoogleSheets;

class User extends Authenticatable
{
    use Notifiable;
    use GoogleSheets;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'access_token',
        'refresh_token',
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
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the Access Token.
     *
     * @return string|array
     */
    protected function sheetsAccessToken()
    {
        return [
            'access_token'  => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'expires_in'    => 3600,
            'created'       => $this->updated_at->getTimestamp(),
        ];
    }
}
