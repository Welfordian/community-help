<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'postcode', 'address', 'help_type', 'help_info'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPostcodeAttribute()
    {
        return preg_replace('/\s+/', '', $this->attributes['postcode']);
    }

    public function scopeInPostcode($scope, $postcode)
    {
        return $scope->selectRaw("*, REPLACE(postcode, ' ', '') as post_code")->whereRaw("REPLACE(postcode, ' ', '') = ?", $postcode);
    }
}
