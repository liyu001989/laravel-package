<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use \Bkwld\Cloner\Cloneable;

    protected $clone_exempt_attributes = ['email_verified_at'];

    protected $cloneable_relations = ['topics'];

    protected $cloneable_file_attributes = ['avatar'];

    public function onCloning($src, $child = null) {
        $this->email = str_random(3).$this->email;
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
