<?php

namespace App\Observers;

class UserObserver
{
    public function morphToManyAttached($relation, $user, $ids)
    {
        if ($relation == 'tags') {
            logger("{$user->name} attached tags ".implode(',', $ids));
        }
    }

    public function morphToManyDetached($relation, $user, $ids)
    {
        if ($relation == 'tags') {
            logger("{$user->name} detached tags ".implode(',', $ids));
        }
    }

    public function morphToManySynced($relation, $user, $ids)
    {
        if ($relation == 'tags') {
            logger("{$user->name} synced tags ".implode(',', $ids));
        }
    }
}