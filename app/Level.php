<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * Level has one Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
    	// hasOne(RelatedModel, foreignKeyOnRelatedModel = level_id, localKey = id)
    	return $this->hasOne(Course::class);
    }
}
