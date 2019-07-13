<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
   

    /**
     * Level has many Curses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function curses()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = level_id, localKey = id)
        return $this->hasMany(Curse::class);
    }
}
