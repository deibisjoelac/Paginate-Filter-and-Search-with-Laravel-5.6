<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearching($query, $que)
    {
        if ($que) {
            return $query->where('id', 'like', "%$que%")
                        ->orWhere('name', 'like', "%$que%")
                        ->orWhere('email', 'like', "%$que%")
                        ->orWhere('bio', 'like', "%$que%");
        }
    }
}
