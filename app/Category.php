<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Category has many Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
    	return $this->hasMany(Course::class);
    }
}
