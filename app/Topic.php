<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use \Bkwld\Cloner\Cloneable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
