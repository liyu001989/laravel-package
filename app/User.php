<?php

namespace App;

use App\Enums\UserStatus;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use CastsEnums;

    protected $enumCasts = [
        'status' => UserStatus::class,
    ];

    // const STATUS_PENDING = 0;
    // const STATUS_SUCCESS = 1;
    // const STATUS_FAILED = 2;

    // public static $map = [
    //     self::STATUS_PENDING => '待验证',
    //     self::STATUS_SUCCESS => '验证成功',
    //     self::STATUS_FAILED => '验证失败',
    // ];

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
