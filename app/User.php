<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
     * Get the Access Token
     *
     * @return string
     */
    protected function sheetsAccessToken()
    {
        return $this->access_token;
    }
}
