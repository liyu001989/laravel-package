<?php

namespace App;

use App\CreateWatermarkImage;
use QCod\ImageUp\HasImageUploads;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasImageUploads;

    protected static $imageFields = [
        'avatar' => [
            'width' => 200,
            'height' => 200,
            'crop' => true,
            'path' => 'avatars',
            'before_save' => CreateWatermarkImage::class,
        ]
    ];

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

    public function getAvatarAttribute()
    {
        return \Storage::disk('public')->url($this->attributes['avatar']);
    }
}
