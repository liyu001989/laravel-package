<?php

namespace App;

use Spatie\Tags\HasTags;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Chelout\RelationshipEvents\Concerns\HasMorphToManyEvents;
use Chelout\RelationshipEvents\Traits\HasRelationshipObservables;

class User extends Authenticatable
{
    use Notifiable, HasTags;
    use HasMorphToManyEvents, HasRelationshipObservables;

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

    public static function getTagClassName(): string
    {
        return Tag::class;
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::morphToManyAttached(function ($relation, $user, $ids) {
    //         if ($relation == 'tags') {
    //             logger("{$user->name} attached tags ".implode(',', $ids));
    //         }
    //     });

    //     static::morphToManyDetached(function ($relation, $user, $ids) {
    //         if ($relation == 'tags') {
    //             logger("{$user->name} detached tags ".implode(',', $ids));
    //         }
    //     });

    //     static::morphToManySynced(function ($relation, $user, $ids) {
    //         if ($relation == 'tags') {
    //             logger("{$user->name} synced tags ".implode(',', $ids));
    //         }
    //     });
    // }
}
